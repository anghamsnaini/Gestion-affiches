@extends('layout')

            @section('contenu')
					
				<hr>

		  			<form action="/affichepage" method='POST' enctype="multipart/form-data">

            	     @csrf
            	

                <div class="form-group">
			    <label for="exampleFormControlTextarea1">Titre</label>
			    <textarea class="form-control" name='titre' id="exampleFormControlTextarea1" rows="1"></textarea>
			    </div>


			    <div class="form-group">
			    <label for="exampleFormControlTextarea1">Déscripition</label>
			    <textarea class="form-control" name='contenue' id="exampleFormControlTextarea1" rows="2"></textarea>
			    </div>

			     <div class="form-group">
                      <label for="exampleFormControlFile1">Entrer le fichier</label>
                      <input type="file" class="form-control-file btn btn-info" name='fichier' id="exampleFormControlFile1">
                 </div>

					<div>
              			<button type="submit" class="btn btn-info">Envoyer</button>
					</div>
			</form>


             @endsection