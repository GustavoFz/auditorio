<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Auditorio;
use App\Agendamento;
use App\AgendamentoTurno;
use Carbon\Carbon;

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
      //dd($req->all());
      $data = Carbon::parse($req->dataAgendamento);
      $dados = $req->all();

      $validatedData = $req->validate([
        'dataAgendamento' => 'required',
       ], [
          'dataAgendamento.required' => 'Selecione uma data!',
       ]);

      if($data->lt(Carbon::today())){
        return redirect()->back()->withErrors(['dataAgendamento' => 'A data do agendamento não pode ser no passado!']);
      }

      //SE NAO DER CERTO RANCA ISSO FORA
      if( (Agendamento::where('auditorio_id', $req->auditorio_id)->where('dataAgendamento', $data)->count() > 0) ){
        $agendamentos = Agendamento::where('auditorio_id', $req->auditorio_id)->where('dataAgendamento', $data)->get();
        foreach($agendamentos as $agendamento){
            foreach($agendamento->turnos as $turno){
            if($turno->turno == 'manha' && isset($dados['manha']) && $dados['manha'] == "sim"){
            return redirect()->back()->withErrors(['dataAgendamento' => 'Já existe um agendamento com essa data e turno']);
            }
            if($turno->turno == 'tarde' && isset($dados['tarde']) && $dados['tarde'] == "sim"){
            return redirect()->back()->withErrors(['dataAgendamento' => 'Já existe um agendamento com essa data e turno']);
            }
            if($turno->turno == 'noite' && isset($dados['noite']) && $dados['noite'] == "sim"){
            return redirect()->back()->withErrors(['dataAgendamento' => 'Já existe um agendamento com essa data e turno']);
            }
          }
        }
      }


      $dados['status'] = 'PENDENTE';
      if(isset($dados['manha']) == false && isset($dados['tarde']) == false && isset($dados['noite']) == false){
        $validatedData = $req->validate(
          ['manha' => 'required'], ['manha.required' => 'Selecione pelo menos um turno!']
          );
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
      $registro = Agendamento::find($id);

      return view('admin.editar', compact('registro'));
    }

    public function atualizar(Request $req, $id){
      $dados = $req->all();

      Agendamento::find($id)->update($dados);

      return redirect()->route('site.home');
    }


    public function confirmar($id){
      $this->authorize('confirmar', Agendamento::class);
      $auditorio = Agendamento::find($id);
      $auditorio['status'] = 'CONFIRMADO';
      $auditorio->save();
      return redirect()->back();
    }

    public function negar($id){
      $this->authorize('negar', Agendamento::class);
      $auditorio = Agendamento::find($id);
      $auditorio->status = 'NEGADO';
      $auditorio->save();
      return redirect()->back();
    }

    public function deletar($id){
      Agendamento::find($id)->delete();
      return redirect()->route('site.home');
    }
}