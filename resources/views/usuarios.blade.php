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
                          {{$role->name}} <a style="color: #F44336;" class="modal-trigger" href="{{route('usuarios.deleteRole', ['user_id' => $usuario->id, 'role_id' => $role->id])}}">
                                            <i class="tiny material-icons">clear</i>
                                          </a>
                        @else
                          {{$role->name}} <a style="color: #F44336;" class="modal-trigger" href="{{route('usuarios.deleteRole', ['user_id' => $usuario->id, 'role_id' => $role->id])}}">
                                            <i class="tiny material-icons">clear</i>
                                          </a>,
                        @endif
                    @endforeach
                 </td>
                 <td>
                <div class="input-field center-align col s10 offset-s1">
                    @foreach($roles as $role)
                      <a class="btn btn-small" href="{{route('usuarios.assignRole', ['user_id' => $usuario->id, 'role_id' => $role->id])}}">{{$role->name}}</a>
                    @endforeach
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
