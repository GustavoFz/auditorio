@extends('layout.site')

@section('titulo', 'Adicionar auditório')

@section('conteudo')
<div class="container">
  <h3 class="center">Adicionar auditório</h3>

  <div class="row">
    <form class="" action="{{route('admin.auditorio.salvar')}}" method="post">
      {{ csrf_field() }}
      @include('admin._form')

      <button class="btn deep-orange">Salvar</button>

    </form>
  </div>
</div>

@endsection
