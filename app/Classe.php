<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    protected $fillable =['libellé'];


    public function cour()

    {
    	return $this->hasMany('App\Cour');
    }

    public function users()

    {
        return $this->hasMany('App\User');
    }

}
