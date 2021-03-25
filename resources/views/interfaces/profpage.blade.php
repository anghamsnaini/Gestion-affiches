@extends('layout')

            @section('contenu')
            <h2>Ici Vous Pouvez Publier Un Cour
            <a href="{{ route('affichercour') }}" class="btn btn-defalt float-right mr-5"  style="background-color: #870404;color: white;">Retour</a></h2>
                <hr>

              <div class="container">
                  <div class="row">
                     <div class="col-md-9">
                        <div class="card float-right ml-10" style="width: 40rem;">
                            <h5 class="card-header bg-dark text-white">Cour</h5>

                <form action="/courspage" method='POST' enctype="multipart/form-data">
                   @csrf
                  <div>
                  <label for="classe_id">Choisir la classe:</label>
                      <select name="classe_id" class="form-control form-control-sm">

                    @foreach ($classes as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                       </select>
                  </div>

                   <div class="form-group">
                      <label for="exampleFormControlTextarea1">Entrer le titre du cour</label>
                      <textarea class="form-control" name='titre' id="titre" rows="1"></textarea>
                      {!! $errors->first('titre','<p class="text-danger">:message</p>') !!}
                   </div>

                   <div class="form-group">
                    <label for="exampleFormControlTextarea1">Déscripition du Cour</label>
                    <textarea class="form-control" name='contenue' id="exampleFormControlTextarea1" rows="2"></textarea>
                   </div>

                   <div class="form-group">
                      <label for="exampleFormControlFile1">Entrer le cour</label>
                      <input type="file" class="form-control-file btn btn-defalt" style="background-color: #870404;color: white;" name='fichier' id="fichier">
                      {!! $errors->first('fichier','<p class="text-danger">:message</p>') !!}
                 </div> 
          
                   <div>
                    <button type="submit" class="btn btn-defalt" style="background-color: #870404;color: white;">Envoyer</button>
                   </div>
                  
                </form>

                </div>
              </div>
            </div>
         </div>

             @endsection
