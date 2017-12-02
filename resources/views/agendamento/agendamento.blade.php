@extends('layout.site')

@section('titulo', 'Agendar auditório')

@section('conteudo')
<div class="container">
  <div class="row">
    <h4 class="center">Agendamentos do auditório {{$registro->numero.$registro->predio}}</h4>
    @if($agendamentos->isEmpty() == false)

    <div class="row" align="center">
      <div  class="col m6">
        <a class="btn green ">Turno Disponível</a>
      </div>
      <div class="col m6">
        <a class="btn red">Turno Indisponível</a>
      </div>
    </div>

      <table class="striped centered">
        <thead>
          <tr>
            <th>ID</th>
            <th>E-mail</th>
            <th>Data</th>
            <th>Turno</th>
          </tr>
        </thead>

       @foreach($agendamentos as $agendamento)
        <tbody>
          <tr>
          <td>{{$agendamento->id}}</td>
          <td>{{$agendamento->user->email}}</td>
          <td>{{isset($agendamento->dataAgendamento) ? $agendamento->dataAgendamento->format('d/m/Y') : 'NULL'}}</td>
          <td width="50%">
            <a class="{{$agendamento->manha == 'sim' ? 'btn red' : 'btn green'}}">Manhã</a>
            <a class="{{$agendamento->tarde == 'sim' ? 'btn red' : 'btn green'}}">Tarde</a>
            <a class="{{$agendamento->noite == 'sim' ? 'btn red' : 'btn green'}}">Noite</a>
          </td>
          </tr>
         @endforeach
        </tbody>
      </table>
    @else
      <p>Não há agendamentos</p>
    @endif
  </div>

  <h3 class="center">Agendar auditório</h3>


<table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Sala</th>
          <th>Prédio</th>
          <th>Descrição</th>
          <th>Capacidade</th>
          <th>Data</th>
          <th>Turno</th>
        </tr>
      </thead>

      <tbody>
          <tr>
            <td>{{$registro->id}}</td>
            <td>{{$registro->numero}}</td>
            <td>{{$registro->predio}}</td>
            <td>{{$registro->descricao}}</td>
            <td width="150px">{{$registro->capacidade}}</td>
            <td width="200px">
            	<form class="" action="{{route('agendamento.salvar')}}" method="post">
                <input type="text" name="dataAgendamento" placeholder="Selecione uma data" required="true" class="datepicker">
            </td>
            <td>
            	
					{{ csrf_field() }}
          <input type="hidden" name="auditorio_id" value="{{$registro->id}}">
					<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
					<div class="">
					  <p>
					  <input type="checkbox" id="manha" name="manha" value="sim"/>
					    <label for="manha">Manhã</label>
					  </p>
					</div>

					<div class="">
					  <p>
					  <input type="checkbox" id="tarde" name="tarde" value="sim" />
					    <label for="tarde">Tarde</label>
					  </p>
					</div>

					<div class="">
					  <p>
					  <input type="checkbox" id="noite" name="noite" value="sim"/>
					    <label for="noite">Noite</label>
					  </p>
            
					</div>
            </td>
          </tr>
      </tbody>
    </table>

    	<button class="btn deep-orange">Agendar</button>
        
	</form>

  @if ($errors->any())

  @endif

</div>

@endsection
