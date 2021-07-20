<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $fillabre = [
    	'id',
    	'populacao_residente',
    	'populacao_empregada',
    	'estudantes',
    	'idosos',
    	'fluxo_pessoas'
    ];

    protected $table = 'pessoas';
}
