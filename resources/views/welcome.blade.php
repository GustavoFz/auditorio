@extends('layout.site')

@section('titulo', 'Página Inicial')

@section('conteudo')
    <div class="container">

<<<<<<< HEAD
	@if(Auth::guest())
		<h3 class="center-align">Bem-vindo!</h3>
		<p class="center-align">Para efetuar um agendamento, faça login</p> 
		@else
		<h3 class="center-align">Bem-vindo, {{ Auth::user()->name }}!</h3>
	@endif

	@if(Auth::user()->agendamentos()->get())
		<h3 class="center-align">Esses são seus agendamentos</h3>
		<table class="striped centered">
			<thead>
				<tr>
					<th>ID</th>
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
					<td>{{$agendamento->id}}</td>
					<td>{{$agendamento->sala->numero}}/{{$agendamento->sala->predio}}</td>
					<td>{{$agendamento->user->email}}</td>
					<td>{{isset($agendamento->dataAgendamento) ? $agendamento->dataAgendamento->format('d/m/Y') : 'NULL'}}</td>
					<td>
						<a class="{{$agendamento->manha == 'sim' ? 'btn red' : 'btn green'}}">Manhã</a>
						<a class="{{$agendamento->tarde == 'sim' ? 'btn red' : 'btn green'}}">Tarde</a>
						<a class="{{$agendamento->noite == 'sim' ? 'btn red' : 'btn green'}}">Noite</a>
					</td>
					<td>stats</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	@else
		Você ainda não tem agendamentos!
	@endforelse

</div>
=======
        @if(Auth::guest())
            <h3 class="center-align">Bem-vindo!</h3>
            <p class="center-align">Para efetuar um agendamento, faça login</p>
        @else
            <h3 class="center-align">Bem-vindo, {{ Auth::user()->name }}!</h3>

            @foreach(Auth::user()->habilidades() as $habilidade)
                {{$habilidade->name}}<br>
            @endforeach
        @endif

    </div>
>>>>>>> 73efabc946f8ef618c602f0d0f7ca7c77217f13a
@endsection
