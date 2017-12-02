<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Auditorio;
use App\Agendamento;
use App\AgendamentoTurno;

class AgendamentoController extends Controller
{
    public function agendamentos(){
      $agendamentos = Agendamento::all();

      return view('agendamento.listaAgendamentos', compact('agendamentos'));
    }

    public function agendar($id){
    	$registro = Auditorio::find($id);
      $agendamentos = Agendamento::where('auditorio_id','=', $id)->get();


    	return view('agendamento.agendamento', compact('registro', 'agendamentos'));
    }

    public function salvar(Request $req){
   	  $dados = $req->all();
      //dd($dados);

      if(isset($dados['manha']) == false && isset($dados['tarde']) == false && isset($dados['noite']) == false){
        
        $validatedData = $req->validate([
        'manha' => 'required',
       ]);
        return redirect()->back();
      }
      $id = Agendamento::create($dados);
      if (isset($dados['manha']) && $dados['manha'] == "sim"){
        $turno = ['turno'=>'manha', 'status'=>'PENDENTE', 'agendamento_id'=>$id->id];
        AgendamentoTurno::create($turno);
      }
      if (isset($dados['tarde']) && $dados['tarde'] == "sim"){
        $turno = ['turno'=>'tarde', 'status'=>'PENDENTE', 'agendamento_id'=>$id->id];
        AgendamentoTurno::create($turno);
      }
      if (isset($dados['noite']) && $dados['noite'] == "sim"){
        $turno = ['turno'=>'noite', 'status'=>'PENDENTE', 'agendamento_id'=>$id->id];
        AgendamentoTurno::create($turno);
      }


      //return redirect()->route('agendamento.agendar', ['id' => $dados['auditorio_id']]);
      return redirect()->back();
    }

    public function editar($id){
      $registro = Auditorio::find($id);

      return view('admin.editar', compact('registro'));
    }

    public function atualizar(Request $req, $id){
      $dados = $req->all();

      Auditorio::find($id)->update($dados);

      return redirect()->route('site.home');
    }

    public function deletar($id){
      Auditorio::find($id)->delete();
      return redirect()->route('site.home');
    }
}