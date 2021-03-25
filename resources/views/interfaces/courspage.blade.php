@extends('layout')


           @section('contenu')
           <style>
              body{
                background: #C1BEBC;
              }
            </style>
			      <h2> La liste de tous les Cours
                  @can('Prof')
               <a href="{{ route('courform') }}" class="btn btn-secondary btn-sm float-right mr-5"><span class="glyphicon glyphicon-plus"></span> Ajouter un cour</a></h2>
               @endcan
               <hr>
				 <div class="row">
            <div class="col-md-15 ml-5">
              

              <div class="col-md-3 float-right ml-7">
                    <div class="card mb-3" style="max-width: 18rem;">
                      <div class="card-header bg-info text-white"><strong> Stats.</strong></div>
                       <div class="card-body">
                           <p class="card-text"><strong>Tous les Cours:</strong><h4> {{$count}}</h4></p>
                       </div>
                    </div>
              </div>

               <div class="row">
                  <div class="row">

                              @foreach($cour as $cour)
                                <div class="col-md-20 mt-3 ml-3">
                                  <div class="card mb-3" style="max-width: 18rem;">
                                      <div class="card-header bg-dark text-white">
                                        <h5 class="text-2xl mb-1">
                                           <a href="{{ route('showcour', $cour)}}" class="no-underline text-indigo-dark">
                                              Voir détails
                                           </a>                     
                                        </h5>                                                 
                                      </div>
                                     <div class="card-body">
                                        <div class="card-title mb-1">
                                          <p class="text-lg">
                                             {{ $cour->titre }}
                                          </p>
                                        </div>
                                        <div>
                                        Ajouter par:<br><strong>{{ $cour->user->name }}</strong><br>
                                        <strong>{{ $cour->classe->libellé }}</strong>
                                        </div>
                                        <hr>
                                           <div class="card-text mb-1">
                                              {{ $cour->created_at->diffForHumans() }}
                                           </div>
                                     </div>
                                 </div>        
                               </div>
                              @endforeach
                      </div>
                  </div>
            </div>
          </div>
 @endsection
