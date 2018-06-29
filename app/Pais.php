<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $fillable = ['nome'];


    public function estados()
    {
        return $this->hasMany('App\Estado','pais_id');
    }
}
