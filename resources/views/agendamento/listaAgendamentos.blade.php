@extends('layout.site')

@section('titulo', 'Agendamentos')

@section('conteudo')
<div class="container">
  <div class="row">
    <h3>Agendamentos</h3>
    @if($agendamentos->isEmpty() == false)

    <div class="row" align="center">
      <div  class="col m3">
        <a class="btn green "></a> Turno disponível
      </div>
      <div class="col m3">
        <a class="btn disabled" href="#"></a> Turno agendado
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
            <th>Ação</th>
          </tr>
        </thead>


        <tbody>
        @foreach($agendamentos as $agendamento)
          <tr>
          <td>{{$agendamento->id}}</td>
          <td>{{$agendamento->sala->numero}}/{{$agendamento->sala->predio}}</td>
          <td>{{$agendamento->email}}</td>
          <td>{{isset($agendamento->dataAgendamento) ? $agendamento->dataAgendamento->format('d/m/Y') : 'NULL'}}</td>
          <td>
            <a class="{{$agendamento->manha == 'sim' ? 'btn disabled' : 'btn green'}}" href="#">Manhã</a>
            <a class="{{$agendamento->tarde == 'sim' ? 'btn disabled' : 'btn green'}}" href="#">Tarde</a>
            <a class="{{$agendamento->noite == 'sim' ? 'btn disabled' : 'btn green'}}" href="#">Noite</a>
          </td>
          <td>
            <a style="color: #ff9800;" href=""><i class="material-icons">create</i></a>
            <a style="color: #F44336;" href=""><i class="material-icons">delete</i></a>
          </td>
          </tr>
         @endforeach
        </tbody>
      </table>
    @else
      <p>Não há agendamentos nessa data, cadastre seu agendamento!</p>

            <table class="striped centered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Sala/Prédio</th>
            <th>E-mail</th>
            <th>Data</th>
            <th>Turno</th>
            <th>Ação</th>
          </tr>
        </thead>


        <tbody>
        @foreach($agendamentos as $agendamento)
          <tr>
          <td>{{$agendamento->id}}</td>
          <td>{{$agendamento->sala->numero}}/{{$agendamento->sala->predio}}</td>
          <td>{{$agendamento->email}}</td>
          <td>{{isset($agendamento->dataAgendamento) ? $agendamento->dataAgendamento->format('d/m/Y') : 'NULL'}}</td>
          <td>
            <a class="{{$agendamento->manha == 'sim' ? 'btn disabled' : 'btn green'}}" href="#">Manhã</a>
            <a class="{{$agendamento->tarde == 'sim' ? 'btn disabled' : 'btn green'}}" href="#">Tarde</a>
            <a class="{{$agendamento->noite == 'sim' ? 'btn disabled' : 'btn green'}}" href="#">Noite</a>
          </td>
          <td>
            <a style="color: #ff9800;" href=""><i class="material-icons">create</i></a>
            <a style="color: #F44336;" href=""><i class="material-icons">delete</i></a>
          </td>
          </tr>
         @endforeach
        </tbody>
      </table>
    @endif
  </div>

	</form>

</div>

@foreach($agendamentos as $agendamento)
  Id agendamento: {{$agendamento->id}}<br>
  $testes = $agendamento->turnos()->get();
  @foreach($testes as $turno)
    {{$turno}}
    <br>
  @endforeach
  <br>
@endforeach

@endsection
