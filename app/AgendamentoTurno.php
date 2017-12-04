<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Agendamento;

class AgendamentoTurno extends Model
{
    protected $fillable = [
    	'agendamento_id','turno', 'status'
    ];

    public function agendamento(){
      return $this->belongsTo(Agendamento::class, 'agendamento_id', 'id');
    }
}
