<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Auditorio;
use App\AgendamentoTurno;

class Agendamento extends Model
{
     protected $fillable = [
    	'auditorio_id', 'user_id', 'email', 'dataAgendamento', 'manha', 'tarde', 'noite', 'status'
    ];

    protected $dates = ['dataAgendamento'];

    public function sala(){
 		//Cada agendamento tem um auditório, e eu faço um select na tabela auditorio buscando o id(auditorio) dele, pelo auditorio_id(agendamento)
    	return $this->hasOne(Auditorio::class, 'id', 'auditorio_id');
    }

    public function user(){
 		//Cada agendamento tem um auditório, e eu faço um select na tabela auditorio buscando o id(auditorio) dele, pelo auditorio_id(agendamento)
    	return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function turnos(){
        return $this->hasMany(AgendamentoTurno::class, 'agendamento_id', 'id');
    }

}
