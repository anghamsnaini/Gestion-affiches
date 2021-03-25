
@extends('layout')

            @section('contenu')
            <style>
              body{
                background: #C1BEBC;
              }
            </style>
            <div class="container">
            <div class="row">
            <div class="col-md-8">

                  <div class="card ml-10" style="width: 67rem;background-color: #F4DDCF;">
                    <h5 class="card-header bg-dark text-white">{{ $cour->titre }}
                    <a href="{{ route('affichercour') }}" class="btn btn-secondary  btn-sm float-right mr-2">Retour</a>
                    </h5>
                          <div class="float-left ml-5">
                               {{ $cour->contenue }}         
                          </div>
                  <div class="pull-right">
                    @auth
                      @if(auth()->user()->id == $cour->user_id)
                             <form class="mt-0" action="{{ route('destroycour', $cour) }}" method="POST">

                                @csrf
                                @method('DELETE')
          
                                <input type="submit" class="btn btn-danger btn-sm float-right mr-2" value="Supprimer"/>
                            
                             <a href="{{ route('editcour', $cour) }}" class="btn btn-warning btn-sm float-right mr-2">Editer</a>
                        @endif
                      @endauth

                              <a href="{{asset('storage/coursfile/'.$cour->fichier)}}" >
                                <button type="button" class="btn btn-secondary btn-sm float-right mr-2">Télécharger
                                </button>
                              </a>

                             
                             </form>
                  </div>
                
               <hr class="mt-2">
                 
   <form class="mt-2" action="/{{$cour->id}}/commentaires" method='POST'>
    @csrf

       <div class="form-group">
        <textarea name="contenue" placeholder="Votre Commentaire..." cols="50" rows="2" class="float-left ml-3">{{ old('contenue') }}</textarea>
      {!! $errors->first('titre','<p class="text-danger">:message</p>') !!}
       </div>
       @auth
       <button class="btn btn-dark btn-sm float-left ml-2 ">Commenter</button>
     </form>
     <div class="card">
       @foreach($cour->commentaires()->latest()->get() as $commentaire)
       <div class="float-left ml-2">
         <strong>{{ $commentaire->user->name }}</strong> -
         {{ $commentaire->created_at->diffForHumans() }}
       </div>
       <div class="card-body">
         {{ $commentaire->contenue }}
       </div>
       @endforeach
     </div>
    @endauth
      </div>
    </div>
  </div>
</div>
 @endsection