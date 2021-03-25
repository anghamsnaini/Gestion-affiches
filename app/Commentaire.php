<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    protected $fillable =['user_id' , 'cour_id' , 'contenue'];

     public function user()

    {
    	return $this->belongsTo(User::class);
    }

     public function cour()

    {
    	return $this->belongsTo(Cour::class);
    }
}
