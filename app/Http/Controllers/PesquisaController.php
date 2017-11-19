<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Auditorio;
use App\Agendamento;
use App\AgendamentoTurno;

class PesquisaController extends Controller
{
    function index(){
        return view('pesquisa');
    }
    function pesquisar(Request $req){
        $data = $req['data'];

        $registros = Agendamento::where('dataAgendamento', '=', $data)->get();
        if($registros->isEmpty()){
            $registros = null;
            return view('pesquisa', compact('registros'));
        }
        else {
            if(isset($registros['0'])){
                $id = $registros['0']['auditorio_id'];
                $auditorios = Auditorio::where('id',$id )->get()->first();
            }


           return view('pesquisa', compact('registros', 'auditorios'));
        }


        //return view('pesquisa', compact('registros'));
    }
}
