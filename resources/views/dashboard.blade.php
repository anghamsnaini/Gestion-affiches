@extends('layout')

@section('contenu')
<style>
  body{
    background: #C1BEBC;
              }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-white">Tableau de bord</div>

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif

                  <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Titre</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cours as $cour)
                                <tr>
                                    <th scope="row">{{$cour->id}}</th>
                                    <td>{{$cour->titre}}</td>
                                    <td> <a href="{{ route('showcour', $cour)}}" class="btn btn-success">voir détails</a></td>
                            @endforeach
                        </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
