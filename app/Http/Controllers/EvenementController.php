<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evenement;
use DB;
use Illuminate\Support\Facades\Storage;

class EvenementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Evenement $evenement){

        $evenement = Evenement::latest()->get();

       return view('interfaces.eventspage')->withEvenement($evenement);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('interfaces.ajoutevents');
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
        $file->storeAs('public/eventsfile', $filename);
        }
          Evenement::create([

        'titre' => request('titre'),
        'contenue' => request('contenue'),
        'fichier' => $filename,
        'daterealisation' => request('daterealisation'),

      ]);
          return redirect('/eventspage');
      
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
         $evenement = Evenement::find($id);

     return view('interfaces.editevents', [

      'evenement'=> $evenement
      
     ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Evenement $evenement, Request $request)
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
        $file->storeAs('public/eventsfile', $filename);
        }

        $evenement->fichier=$filename;
        $evenement->titre=$request['titre'];
        $evenement->contenue=$request['contenue'];
        $evenement->daterealisation=$request['daterealisation'];

        $evenement->update();

      return redirect()
      ->route('afficherevents', $evenement)
      ->with([
        'message' => " {$evenement->titre} a bien été mise à jour!"
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
      $evenement = Evenement::find($id);
      $evenement->delete();

      return redirect('/eventspage')
      ->with(['message' => " {$evenement->titre} a bien été supprimer!"
      ]);
    }
    
}
