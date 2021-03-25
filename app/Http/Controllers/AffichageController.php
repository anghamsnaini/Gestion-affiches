<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Affichage;
use DB;
use Illuminate\Support\Facades\Storage;

class AffichageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Affichage $affichage){

      $affichage = Affichage::latest()->get();

         return view('interfaces.affichepage')->withAffichage($affichage);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('interfaces.ajoutaffiche');
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
        $file->storeAs('public/affichefile', $filename);
        }

      Affichage::create([

        'titre' => request('titre'),
        'contenue' => request('contenue'),
        'fichier' => $filename,
      ]);


      return redirect('/affichepage');
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
        $affichage = Affichage::find($id);

     return view('interfaces.editaffichage', [

      'affichage'=> $affichage
      
     ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Affichage $affichage, Request $request)
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
        $file->storeAs('public/affichefile', $filename);
        }

        
        $affichage->titre=$request['titre'];
        $affichage->contenue=$request['contenue'];
        $affichage->fichier=$filename;
    
        
        $affichage->update();

      return redirect()
      ->route('afficheaffiche', $affichage)
      ->with([
        'message' => "L'affichage {$affichage->titre} a bien été mise à jour!"
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
      $affichage= Affichage::find($id);
      $affichage->delete();

      return redirect('/affichepage')
      ->with(['message' => "L'affichage {$affichage->titre} a bien été supprimer!"
      ]);
    }   
     
}
