<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    protected $fillable = ['valor','ativo','supermercado_id','produto_id','dt_ini','dt_fim'];


    public function supermercado(){
        return $this->belongsTo('App\Supermercado');
    }

    public function produto(){
        return $this->belongsTo('App\Produto');
    }
}
