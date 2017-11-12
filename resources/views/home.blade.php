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
    <a class="btn blue" href="{{route('admin.auditorio.adicionar')}}">Adicionar</a>

  </div>

</div>

@endsection
