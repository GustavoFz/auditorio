@extends('layout.site')

@section('titulo', 'Agendamentos')

@section('conteudo')
    <div class="container">
        <div class="row">
            <h3 class="center">Agendamentos</h3>
            @if($agendamentos->isEmpty() == false)

                <div class="row" align="center">
                    <div class="col s6">
                        <a class="btn green ">Turno Disponível</a>
                    </div>
                    <div class="col s6">
                        <a class="btn red">Turno Indisponível</a>
                    </div>
                </div>

                <table class="striped centered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Sala/Prédio</th>
                        <th>E-mail</th>
                        <th>Data</th>
                        <th>Turno</th>
                        <th>Status</th>
                        <th>Ação</th>
                    </tr>
                    </thead>


                    <tbody>
                    @foreach($agendamentos as $agendamento)
                        <tr>
                            <td>{{$agendamento->id}}</td>
                            <td>{{$agendamento->sala->numero}}/{{$agendamento->sala->predio}}</td>
                            <td>{{$agendamento->user->email}}</td>
                            <td>{{isset($agendamento->dataAgendamento) ? $agendamento->dataAgendamento->format('d/m/Y') : 'NULL'}}</td>
                            <td>
                                <a class="{{$agendamento->manha == 'sim' ? 'btn red' : 'btn green'}}">Manhã</a>
                                <a class="{{$agendamento->tarde == 'sim' ? 'btn red' : 'btn green'}}">Tarde</a>
                                <a class="{{$agendamento->noite == 'sim' ? 'btn red' : 'btn green'}}">Noite</a>
                            </td>
                            <td>{{$agendamento->status}}</td>
                            <td>
                            @can('confirmar', \App\Agendamento::class)
                            <a style="color: #4CAF50;" href="{{route('agendamento.confirmar', $agendamento->id)}}">
                                <i class="small material-icons">check</i>
                            </a>
                            @endcan
                            
                            @can('negar', \App\Agendamento::class)
                            <a style="color: #F44336;" href="{{route('agendamento.negar', $agendamento->id)}}">
                            <i class="small material-icons">clear</i>
                            </a>
                            @endcan
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <p class="center-align">Não há agendamentos cadastrados.</p>
            @endif
        </div>

        </form>
    </div>

@endsection
