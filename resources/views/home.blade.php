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
          <th>Sala</th>
          <th>Prédio</th>
          <th>Descrição</th>
          <th>Capacidade</th>
          <th>Ação</th>
        </tr>
      </thead>

      <tbody>
        @foreach($registros as $registro)
          <tr>
            <td>{{$registro->id}}</td>
            <td>{{$registro->numero}}</td>
            <td>{{$registro->predio}}</td>
            <td>{{$registro->descricao}}</td>
            <td>{{$registro->capacidade}}</td>
            <td>
              <a style="color: #ff9800;" href="{{route('admin.auditorio.editar', $registro->id)}}"><i class="small material-icons">create</i></a>
              <a style="color: #F44336;" href="{{route('admin.auditorio.deletar', $registro->id)}}"><i class="small material-icons">delete</i></a>
              <a style="color: #43A047;" href="{{route('agendamento.agendar', $registro->id)}}"><i class="small material-icons">date_range</i></a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="row">
    <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Adicionar</a>

    <!-- Modal Structure -->
    <div id="modal1" class="modal">
      <div class="modal-content">
        <h4>Modal Header</h4>
        <form class="" action="{{route('admin.auditorio.salvar')}}" method="post">
          {{ csrf_field() }}
          @include('admin._form')

          <button class="btn deep-orange">Salvar</button>

        </form>
      </div>
      <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
      </div>
    </div>

  </div>

</div>

@endsection
