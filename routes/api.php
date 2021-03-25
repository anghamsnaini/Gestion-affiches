<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('annonces',function(){
	return App\Annonce::all();
});
Route::get('annonces/{id}',function($id){
	return App\Annonce::where('id',$id)->get();
});


Route::get('affichages',function(){
	return App\Affichage::all();
});
Route::get('affichages/{id}',function($id){
	return App\Affichage::where('id',$id)->get();
});


Route::get('formations',function(){
	return App\Formation::all();
});
Route::get('formations/{id}',function($id){
	return App\Formation::where('id',$id)->get();
});


Route::get('evenements',function(){
	return App\Evenement::all();
});
Route::get('evenements/{id}',function($id){
	return App\Evenement::where('id',$id)->get();
});


Route::get('cours',function(){
	return App\Cour::all();
});
Route::get('cours/{id}',function($id){
	return App\Cour::where('id',$id)->get();
});



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
