<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegistroController extends Controller
{
    public function index(){
    	
    	return view('registro');
    }

    public function registrar(Request $req){
        $dados = $req->all();
        $dados['password'] = bcrypt($dados['password']);
        $dados['acesso'] = 'usuario';

        User::create($dados);
    }

}
