@if($errors->any())

          <div> 
            @foreach($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                      {!! $error !!}
            </div>
                @endforeach
          </div>
              
          @endif

		@if(session('message'))
          <div class="container">
            <hr>
          <div class="alert alert-danger" role="alert"> 
            {!! session('message') !!}
           </div>
              
    @endif