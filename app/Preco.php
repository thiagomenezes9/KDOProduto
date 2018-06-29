<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preco extends Model
{
    protected $fillable = ['valor','ativo','supermercado_id','produto_id'];


    public function supermercado(){
        return $this->belongsTo('App\Supermercado');
    }

    public function produto(){
        return $this->belongsTo('App\Produto');
    }
}
