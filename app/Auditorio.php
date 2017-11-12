<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auditorio extends Model
{
    protected $fillable = [
    	'numero', 'predio', 'descricao', 'capacidade'
    ];

     public function agendamentos(){
      return $this->hasMany(Agendamento::class);
    }
}
