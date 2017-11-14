<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Auditorio;
class AuditorioController extends Controller
{
      public function salvar(Request $req){
      $dados = $req->all();
      Auditorio::create($dados);

      return redirect()->back();
    }

    public function index(){
    $registros = Auditorio::all();
    return view('auditorios', compact('registros'));
    }

    public function adicionar(){
      return view('admin.adicionar');
    }

    public function editar($id){
      $registro = Auditorio::find($id);

      return view('admin.editar', compact('registro'));
    }

    public function atualizar(Request $req, $id){
      $dados = $req->all();

      Auditorio::find($id)->update($dados);

      return redirect()->back();
    }

    public function deletar($id){
      Auditorio::find($id)->delete();
      return redirect()->back();
    }
}
