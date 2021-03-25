<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Annonce;
use DB;
use Illuminate\Support\Facades\Storage;

class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Annonce $annonce){

        $annonce = Annonce::latest()->get();
    
      return view('interfaces.newspage')->withAnnonce($annonce);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('interfaces.ajoutnews');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([

        'titre' => 'required|max:50',
        'contenue' => 'required',
        'fichier'=> 'file|mimes:jpeg,jpg,png,pdf,gif,bmp|max:1999',
      ]);


      if($request->hasfile('fichier')){
        $file = $request->file('fichier');
        $ext = $file->getClientOriginalExtension();
        $filename = 'formations_file'.'_'.time().'.'.$ext;
        $file->storeAs('public/newsfile', $filename);
        }

      Annonce::create([

        'titre' => request('titre'),
        'contenue' => request('contenue'),
        'fichier' => $filename,
      ]);
        return redirect('/newspage');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $annonce = Annonce::find($id);

     return view('interfaces.editnews', [

      'annonce'=> $annonce
      
     ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Annonce $annonce, Request $request)
    {   
     request()->validate([

         'titre' => 'required|max:50',
        'contenue' => 'required',
        'fichier'=> 'file|mimes:jpeg,jpg,png,pdf,gif,bmp|max:1999',
        
      ]);


        if($request->hasfile('fichier')){
        $file = $request->file('fichier');
        $ext = $file->getClientOriginalExtension();
        $filename = 'formations_file'.'_'.time().'.'.$ext;
        $file->storeAs('public/newsfile', $filename);
        }


        $annonce->titre=$request['titre'];
        $annonce->contenue=$request['contenue'];
        $annonce->fichier=$filename;
    
        $annonce->update();

      return redirect()
      ->route('affichernews', $annonce)
      ->with([
        'message' => "{$annonce->titre} a bien été mise à jour!"
      ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $annonce= Annonce::find($id);
      $annonce->delete();

      return redirect('/newspage')
      ->with(['message' => " {$annonce->titre} a bien été supprimer!"
      ]);
    }   
    
}
