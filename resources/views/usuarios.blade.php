@extends('layout.site')

@section('titulo', 'Agendamentos')

@section('conteudo')
<div class="container">
    <div class="row">
        <h3 class="center">Usuarios</h3>

        @if($usuarios->isEmpty() == false)
        <table class="striped centered">
            <thead>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Tipo de acesso</th>
                <th>Conceder acesso</th>
            </thead>
            <tbody>
             @foreach($usuarios as $usuario)
             <tr>
                 <td>{{$usuario->id}}</td>               
                 <td>{{$usuario->name}}</td>               
                 <td>{{$usuario->email}}</td>               
                 <td>
                    @foreach($usuario->roles as $role)
                        @if ($loop->last)
                          {{$role->name}}
                        @else
                          {{$role->name}},
                        @endif
                    @endforeach
                 </td>
                 <td>
                <div class="input-field center-align col s10 offset-s1">
                    <select id="mudar-permissao">
                      <option value="" disabled selected>Escolha o acesso</option>
                      @foreach($roles as $role)
                      <option>{{$role->name}}</option>
                      @endforeach
                    </select>
                </div>
                 </td>               
             </tr>
             @endforeach  
         </tbody> 
     </table>            
     @else
     <p class="center-align">Não há agendamentos cadastrados.</p>
     @endif
 </div>
</div>

@endsection
