<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Formation;
use DB;
use Illuminate\Support\Facades\Storage;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formation = Formation::latest()->get();

         return view('interfaces.formationpage')->withFormation($formation);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('interfaces.ajoutformation');
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
        'daterealisation' => 'required',
      ]);


        if($request->hasfile('fichier')){
        $file = $request->file('fichier');
        $ext = $file->getClientOriginalExtension();
        $filename = 'formations_file'.'_'.time().'.'.$ext;
        $file->storeAs('public/formationfile', $filename);
        }
      Formation::create([

        'titre' => request('titre'),
        'contenue' => request('contenue'),
        'fichier' => $filename,
        'daterealisation' => request('daterealisation'),
      ]);

      return redirect('/formationpage');
    
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

     $formation = Formation::find($id);

     return view('interfaces.editformation', [

      'formation'=> $formation
      
     ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Formation $formation, Request $request)
    {   
     request()->validate([

         'titre' => 'required|max:50',
        'contenue' => 'required',
        'fichier'=> 'file|mimes:jpeg,jpg,png,pdf,gif,bmp|max:1999',
        'daterealisation' => 'required',
      ]);

        if($request->hasfile('fichier')){
        $file = $request->file('fichier');
        $ext = $file->getClientOriginalExtension();
        $filename = 'formations_file'.'_'.time().'.'.$ext;
        $file->storeAs('public/formationfile', $filename);
        }

        $formation->fichier=$filename;
        $formation->titre=$request['titre'];
        $formation->contenue=$request['contenue'];
        $formation->daterealisation=$request['daterealisation'];
        
        $formation->update();
        


      return redirect()
      ->route('afficherformation', $formation)
      ->with([
        'message' => "La formation {$formation->titre} a bien été mise à jour!"
      ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

      $formation = Formation::find($id);
      $formation->delete();

      return redirect('/formationpage')
      ->with(['message' => "La formation {$formation->titre} a bien été supprimer!"
      ]);
    }
}
