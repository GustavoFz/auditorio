<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\Controller;


class LoginController extends Controller
{

    public function entrar(Request $req)
    {
      $dados = $req->all();
      if(Auth::attempt(['email'=>$dados['email'],'password'=>$dados['password']])){
        return redirect()->back();
      }

      // SE DER ERRO, MANDAR MENSAGEM DE ERRO PRO MODAL \/
      return redirect()->back();
    }
    public function sair()
    {
      Auth::logout();
      return redirect()->route('site.home');
    }
  
}
