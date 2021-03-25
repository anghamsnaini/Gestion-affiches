<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Cour;
use App\User;

use App\Classe;

use DB;
use Illuminate\Support\Facades\Storage;

class CourController extends Controller
{
    // page d'acceuil

    public function welcome(){

    	return view('interfaces.welcome');
    }


    // la page des profs

    public function index(){

    
        $classes = DB::table('classes')->pluck("libellé","id");
        return view('interfaces.profpage',compact('classes'));
    }

    public function create(){

       $cour = Cour::latest()->get();
      return view('interfaces.courspage',['count'=> Cour::count()])->withCour($cour);
    }

    public function store(Cour $classe_id , Request $request){

      request()->validate([

        'classe_id' => 'required',
        'titre' => 'required|max:30', 
        'contenue' =>'required',
        'fichier'=> 'required|file|mimes:pdf,rar|max:1999',  
                               
      ]);  


      if($request->hasfile('fichier')){
        $file = $request->file('fichier');
        $ext = $file->getClientOriginalExtension();
        $filename = 'cours'.'_'.time().'.'.$ext;
        $file->storeAs('public/coursfile', $filename);
        }


     $cour = Cour::create([

        'titre' => request('titre'),
        'fichier' => $filename,
        'contenue' => request('contenue'),
        'classe_id' => request('classe_id'),
        'user_id' => auth()->user()->id,
      ]);


      return redirect()
      ->route('showcour', $cour)
      ->with([
        'message' => "Le cour {$cour->titre} a bien été créé!"
      ]);
    }


    public function show($id){

     $cour = Cour::find($id);

     return view('interfaces.show', [

      'cour'=> $cour
      
     ]);
    }


    public function download($id){

        $downloads =BD::table('cours')->get();
      
    return view('interfaces.show', compact('downloads'));
   }


    public function edit(Cour $cour, Classe $classes){

      $classes = DB::table('classes')->pluck("libellé","id");
      return view('interfaces.edit', compact('classes'), [
        'cour' => $cour 

      ]);
    }

    public function update(Cour $cour, Request $request){
    
      request()->validate([

        'classe_id' => 'required',
        'titre' => 'required|max:50',
        'contenue' =>'required',
        'fichier'=> 'required|file|mimes:jpeg,jpg,png,gif,pdf,bmp|max:1999',             
      ]);

      if($request->hasfile('fichier')){
        $file = $request->file('fichier');
        $ext = $file->getClientOriginalExtension();
        $filename = 'cours'.'_'.time().'.'.$ext;
        $file->storeAs('public/coursfile', $filename);
        }


        $cour->titre=$request['titre'];
        $cour->fichier=$filename;
        $cour->contenue=$request['contenue'];
        $cour->classe_id=$request['classe_id'];
        
        $cour->update();

      return redirect()
      ->route('affichercour', $cour)
      ->with([
        'message' => "Le cour {$cour->titre} a bien été mise à jour!"
      ]);
    }


    public function destroy($id){
      $cour = Cour::find($id);
      $cour->delete();

      return redirect('/courspage')
      ->with(['message' => "Le cour {$cour->titre} a bien été supprimer!"
      ]);
    }



    // la page de l'administrateur

    
    public function afficheclasse(){

        $classes = DB::table('classes')->pluck("libellé","id");
        return view('interfaces.adminpage',compact('classes'));
    }


    public function adminpage(){

    	 return view('interfaces.adminpage');
    }


    public function affichuser(){

       $users = User::with('Classe')->get();
       
        return view('interfaces.adminpage',compact('users'));
    }
     

      public function menu(){

       return view('interfaces.menu');
     }


     public function testcnx(){

       return view('interfaces.test');
     }
}
