@extends('layout.site')

@section('titulo', 'Página Inicial')

@section('conteudo')
<div class="container">
	<div class="container yellow z-depth-4" style="border-radius: 8px">
	@if(Auth::guest())
	<h3 class="center-align">Bem-vindo!</h3>
	<p class="center-align">Para efetuar um agendamento, faça login</p> 
	@else
	<h3 class="center-align">Bem-vindo, {{ Auth::user()->name }}!</h3>
	</div>

	@if(Auth::user()->agendamentos()->count() != 0)
	<h3 class="center-align">Esses são seus agendamentos</h3>
	<table class="striped centered">
		<thead>
			<tr>
				<!--<th>ID</th>-->
				<th>Sala/Prédio</th>
				<th>E-mail</th>
				<th>Data</th>
				<th>Turno</th>
				<th>Status</th>
			</tr>
		</thead>


		<tbody>
			@foreach(Auth::user()->agendamentos as $agendamento)
			<tr>
				<!--<td>{{$agendamento->id}}</td>-->
				<td>{{$agendamento->sala->numero}}/{{$agendamento->sala->predio}}</td>
				<td>{{$agendamento->user->email}}</td>
				<td>{{isset($agendamento->dataAgendamento) ? $agendamento->dataAgendamento->format('d/m/Y') : 'NULL'}}</td>
				<td>
					<a class="{{$agendamento->manha == 'sim' ? 'btn red' : 'btn green'}}">Manhã</a>
					<a class="{{$agendamento->tarde == 'sim' ? 'btn red' : 'btn green'}}">Tarde</a>
					<a class="{{$agendamento->noite == 'sim' ? 'btn red' : 'btn green'}}">Noite</a>
				</td>
				<td>{{$agendamento->status}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	@else
	<h3 class="center-align">Você ainda não tem agendamentos!</h3>
	@endforelse
	@endif



</div>
@endsection
