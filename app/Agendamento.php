<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Auditorio;

class Agendamento extends Model
{
     protected $fillable = [
    	'auditorio_id', 'email', 'dataAgendamento', 'turno', 'status', 'user_id',
    ];

    protected $dates = ['dataAgendamento'];

    public function sala(){
 		//Cada agendamento tem um auditório, e eu faço um select na tabela auditorio buscando o id(auditorio) dele, pelo auditorio_id(agendamento)
    	return $this->hasOne(Auditorio::class, 'id', 'auditorio_id');
    }

    public function user(){

    	return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function turnos(){
    	return $this->hasMany(AgendamentoTurno::class, 'agendamento_id', 'id');
    }
}
