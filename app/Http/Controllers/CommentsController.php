<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(\App\Cour $cour){

    	request()->validate([

        'contenue' => 'required',
    ]);
    	\App\Commentaire::create([
    		'user_id' => \Auth::id(),
    		'cour_id' => $cour->id,
    		'contenue' => request('contenue')
    	]);

    	return back();
    }
}
