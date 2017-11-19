<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgendamentoTurno extends Model
{
    protected $fillable = [
    	'agendamento_id','turno', 'status'
    ];

    public function agendamento(){
        return $this->belongsTo(Agendamento::class);
    }
}
