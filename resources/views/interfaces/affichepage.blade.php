@extends('layout')

            @section('contenu')
            <style>
              body{
                background: #C1BEBC;
              }
            </style>
            
              <h2> La liste de tous les Affiches</h2>
               
               <hr>

<div class="container">
      <div class="row">
            <div class="col-md-12">

                  <div class="card" style="background-color: #F4DDCF;">
                    <h5 class="card-header bg-dark text-white">Affichages
                     @can('Admin')
               <a href="{{ route('afficheform') }}" class="btn btn-secondary btn-sm float-right"><span class="glyphicon glyphicon-plus"></span> Ajouter</a>@endcan
               <a href="/adminpage" class="btn btn-secondary btn-sm float-right mr-2">Retour</a>
                    </h5>



          
           <div class="card-body">
               
               @foreach($affichage as $affichage)
                <ul class="list-group">
                           <li class="lidt-group-item">
                              <div class="pull-right">
                                @can('Admin')
                                 <a href="{{ route('editaffichage', $affichage) }}" class="btn btn-warning btn-sm float-right">Editer</a>
                                 <form action="{{ route('destroyaffichage', $affichage) }}" method="POST">
                                      @csrf
                                      @method('DELETE')
                
                                      <input type="submit" class="btn btn-danger btn-sm float-right mr-2" value="Supprimer"/>
                                 </form>
                                @endcan
                                   </div>
                                       <div class="max-w-3xl mx-auto">
                                          <div class="my-10">
                                             <div class="p-3">
                                                <h3 class="text-2xl mb-3">
                                                 {{ $affichage->titre }}
                                              </h3>
                                                
                                                   <img src="{{asset('storage/affichefile/' .$affichage->fichier)}}" alt="" height="200" width="500">
                                                   <p>
                                                 {{ $affichage->contenue}}
                                              </p>
                                              <p>
                                                 {{ $affichage->fichier}}
                                              </p>
                                            </div>
                                            <hr>
                                              @endforeach
                                           </div>
                                           </div>
                                          </li>
                                        </ul>
                                       </div>
                                      </div>

                                           </div>
                                         </div>
                                      </div>
             @endsection
             
           

             