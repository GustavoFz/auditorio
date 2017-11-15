@extends('layout.site')

@section('titulo', 'Auditórios')

@section('conteudo')
    <div class="container">
        <h3 class="center">Lista de auditórios</h3>
        <div class="row">
            <table class="centered striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Sala/Prédio</th>
                    <th>Descrição</th>
                    <th>Capacidade</th>
                    <th>Acessibilidade</th>
                    <th>Ação</th>
                </tr>
                </thead>

                <tbody>
                @foreach($registros as $registro)
                    <tr>
                        <td>{{$registro->id}}</td>
                        <td>{{$registro->numero}}/{{$registro->predio}}</td>
                        <td>{{ str_limit($registro->descricao, 5) }}</td>
                        <td>{{$registro->capacidade}}</td>
                        <td width="30px">
                            @if($registro->acessibilidade == "sim")
                                <i class="material-icons">check</i>
                            @else
                                <i class="material-icons">clear</i>
                            @endif
                        </td>
                        <td>
                            <a style="color: #ff9800;" class="modal-trigger" href="#modal-editar-{{$registro->id}}">
                                <i class="small material-icons">create</i>
                            </a>
                            <a style="color: #F44336;" class="modal-trigger delete"
                               href="#modal-excluir-{{$registro->id}}">
                                <i class="small material-icons">delete</i>
                            </a>
                            <a style="color: #43A047;" href="{{route('agendamento.agendar', $registro->id)}}">
                                <i class="small material-icons">date_range</i>
                            </a>
                        </td>
                    </tr>

                    <!-- Modal Editar -->
                    <div id="modal-editar-{{$registro->id}}" class="modal">
                        <div class="modal-content">
                            <h4 class="center-align">Editar Auditório</h4>
                            <form class="" action="{{route('admin.auditorio.atualizar', $registro->id)}}" method="post"
                                  enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="put">
                                @include('admin._form')

                                <button class="btn deep-orange">Atualizar</button>
                            </form>
                        </div>
                    </div>

                    <!-- Modal Excluir -->
                    <div id="modal-excluir-{{$registro->id}}" class="modal">
                        <div class="modal-content">
                            <h5 class="center-align">Tem certeza que deseja excluir o auditório {{$registro->numero.$registro->predio}}?</h5>
                            <br>
                            <div class="center">
                                <a href="{{route('admin.auditorio.deletar', $registro->id)}}"
                                   class="modal-action modal-close waves-effect waves-green btn red">Sim</a>
                                <a href="#!" class="modal-action modal-close waves-effect waves-green btn">Não</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            <a class="waves-effect waves-light btn modal-trigger" href="#modal-adicionar">Adicionar</a>

            <!-- Modal Adicionar -->
            <div id="modal-adicionar" class="modal">
                <div class="modal-content">
                    <h4 class="center-align">Adicionar Auditório</h4>
                    <form class="" action="{{route('admin.auditorio.salvar')}}" method="post">
                        {{ csrf_field() }}
                        @include('admin._form-adicionar')
                        <button class="btn deep-orange">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
