<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    protected $fillable =['titre' , 'contenue' , 'fichier' , 'daterealisation'];
}
