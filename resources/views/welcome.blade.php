@extends('layout.site')

@section('titulo', 'Página Inicial')

@section('conteudo')
<div class="container">

	@if(Auth::guest())
	<h3 class="center-align">Bem-vindo!</h3>
	<p class="center-align">Para efetuar um agendamento, faça login</p> 
	@else
	<h3 class="center-align">Bem-vindo, {{ Auth::user()->name }}!</h3>
	<a href="{{ route('logout') }}"
	onclick="event.preventDefault();
	document.getElementById('logout-form').submit();">
	Logout
	</a>

	<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
		{{ csrf_field() }}
	</form>
@endif



</div>
@endsection
