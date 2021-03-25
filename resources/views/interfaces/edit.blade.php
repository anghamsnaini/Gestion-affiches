@extends('layout')

            @section('contenu')             
              <form action="{{ route('updatecour', $cour) }}" method='POST' enctype="multipart/form-data">

                  @csrf
                  @method('PATCH')

                      <h2>Ici Vous Pouvez Modifier Un Cour</h2>
                      <hr>
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
                      <textarea  class="form-control" name='titre' id="titre" rows="1">{{ $cour->titre }}</textarea>
                      {!! $errors->first('titre','<p class="text-danger">:message</p>') !!}
                   </div>

                   <div class="form-group">
                    <label for="exampleFormControlTextarea1">Déscripition de Cour</label>
                    <textarea class="form-control" name='contenue' id="exampleFormControlTextarea1" rows="2">{{ $cour->contenue }}</textarea>
                   </div>

                   <div class="form-group">
                      <label for="exampleFormControlFile1">Entrer le cour</label>
                      <input type="file" name='fichier' class="form-control-file btn btn-info" id="fichier">
                      {!! $errors->first('fichier','<p class="text-danger">:message</p>') !!}
                 </div> 
          
                   <div>
                    <button type="submit" class="btn btn-info">Editer</button>
                   </div>
                  
                </form>

             @endsection