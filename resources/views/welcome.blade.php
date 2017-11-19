@extends('layout.site')

@section('titulo', 'Página Inicial')

@section('conteudo')
<div class="container">

	 @if(Auth::guest())
	            <h3 class="center-align">Bem-vindo!</h3>
	            <p class="center-align">Para efetuar um agendamento, faça login</p> 
	          @else
				<h3 class="center-align">Bem-vindo, {{ Auth::user()->name }}!</h3>
	          @endif
</div>
@endsection
