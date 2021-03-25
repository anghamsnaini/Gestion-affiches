<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cour extends Model
{
    protected $fillable =['titre' , 'fichier' , 'classe_id', 'user_id', 'contenue']; 


    
   public function commentaires(){

    	return $this->hasMany(Commentaire::class);
    }  

     public function user()

    {
    	return $this->belongsTo('App\User');
    }

       public function classe()

    {
    	return $this->belongsTo('App\Classe');
    }

}