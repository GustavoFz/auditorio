@extends('layout.site')

@section('titulo', 'Página Inicial')

@section('conteudo')
<div class="container">
  <h3 class="center-align">Página inicial</h3>


<h5 class="center-align">Em breve...</h5>

	 @if(Auth::guest())
	       <h1>Voce não esta logado</h1>
	          @else
				<h1>Logado</h1> 
				{{ Auth::user()->name }}
				@if(Auth::user()->acesso == 'admin')
					<h4>Você é um admin</h4>
				@else
					<h4>Você não é um admin</h4>
				@endif
	@endif

</div>
@endsection
