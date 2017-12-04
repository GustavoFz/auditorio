<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Auditorio;
class AuditorioController extends Controller
{
  public function salvar(Request $req){

      $validatedData = $req->validate([
        'numero' => 'required',
        'predio' => 'required',
        'capacidade' => 'required',
        'descricao' => 'required',
       ], [
          'numero.required' => 'Informe o numero da sala!',
          'predio.required' => 'Informe o predio da sala!',
          'capacidade.required' => 'Informe a capacidade da sala!',
          'descricao.required' => 'Informe a descricao da sala!'
       ]);

    $dados = $req->all();

    if(isset($dados['acessibilidade']) == "on"){
      $dados['acessibilidade'] = "sim";
    }
    else {
      $dados['acessibilidade'] = "nao";
    }

    Auditorio::create($dados);

    return redirect()->back();
  }

  public function index(){
    $registros = Auditorio::paginate(5);
    return view('auditorios', compact('registros'));
  }

  public function adicionar(){
    return view('admin.adicionar');
  }

  public function editar($id){

    $this->authorize('edit', Auditorio::class);
    $registro = Auditorio::find($id);

    return view('admin.editar', compact('registro'));
  }

  public function atualizar(Request $req, $id){
    //dd($req);
    $this->authorize('edit', Auditorio::class);
              $validatedData = $req->validate([
        'numero' => 'required',
        'capacidade' => 'required',
        'descricao' => 'required',
       ], [
          'numero.required' => 'Informe o numero da sala!',
          'capacidade.required' => 'Informe a capacidade da sala!',
          'descricao.required' => 'Informe a descricao da sala!'
       ]);
    $dados = $req->all();

    if(isset($dados['acessibilidade']) == "on"){
      $dados['acessibilidade'] = "sim";
    }
    else {
      $dados['acessibilidade'] = "nao";
    }

    Auditorio::find($id)->update($dados);

    return redirect()->back();
  }

  public function deletar($id){
    $this->authorize('delete', Auditorio::class);
    Auditorio::find($id)->delete();
    return redirect()->back();
  }
}
