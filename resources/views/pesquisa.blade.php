@extends('layout.site')

@section('titulo', 'Auditórios')

@section('conteudo')
    <div class="container">
        <h3 class="center">Pesquisa de data</h3>
        <div class="row">
            <form action="{{route('pesquisar')}}" method="post">
                {{csrf_field()}}
                <input type="date" name="data">

                <input type="submit">
            </form>


            @if((isset($registros) && $registros != null) && isset($auditorios) && $auditorios != null)
                <h5>Os seguintes auditórios estão agendados neste dia: </h5>
                @foreach($registros as $registro)
                    <p>{{$registro->dataAgendamento}}</p>
                    <p>{{$auditorios->numero}}</p>
                @endforeach
            @else
                <h5>Nao tem nada</h5>
            @endif

        </div>
    </div>
@endsection
