@extends('layout')

            @section('contenu')
            <hr>
                
                  <form action="{{ route('updateevents', $evenement) }}" method='POST' enctype="multipart/form-data">

            	     @csrf
            		 @method('PATCH')

                <div class="form-group">
			    <label for="exampleFormControlTextarea1">Titre</label>
			    <textarea class="form-control" name='titre' id="exampleFormControlTextarea1" rows="1">{{ $evenement->contenue }}</textarea>{!! $errors->first('titre','<p class="text-danger">:message</p>') !!}
			    </div>


			    <div class="form-group">
			    <label for="exampleFormControlTextarea1">Déscripition</label>
			    <textarea class="form-control" name='contenue' id="exampleFormControlTextarea1" rows="2">{{ $evenement->contenue }}</textarea>{!! $errors->first('contenue','<p class="text-danger">:message</p>') !!}
			    </div>

			     <div class="form-group">
                      <label for="exampleFormControlFile1">Entrer le fichier</label>
                      <input type="file" class="form-control-file btn btn-info" name='fichier' id="exampleFormControlFile1">
                 </div>

						<div class="form-group">
							<label for="exampleFormControlDate1">Entrer la date de réalisation</label>
							<input type="date" class="form-control" name="daterealisation" id="exampleFormControlDate1">{!! $errors->first('daterealisation','<p class="text-danger">:message</p>') !!}  
						</div>

					<div>
              			<button type="submit" class="btn btn-info">Modifier</button>
					</div>
			</form>



             @endsection