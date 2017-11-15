@extends('layout.site')

@section('titulo', 'Página Inicial')

@section('conteudo')
<div id="div_conteudo">
  <h3 class="center-align">Página inicial</h3>


<h5 class="center-align">Em breve...</h5>

	 @if(Auth::guest())
	            <h1>Voce nao esta logado</h1> 
	          @else
				<h1>Logado</h1> 
				{{ Auth::user()->name }}
				
	          @endif
</div>
@endsection
