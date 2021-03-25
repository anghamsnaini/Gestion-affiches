<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'CourController@welcome');

Route::get('/adminpage','CourController@adminpage');
Route::get('/adminpage','CourController@affichuser');
Route::get('/adminpage/{classe_id?}', 'CourController@afficheclasse');


Route::get('/newspage', 'AnnonceController@index')->name('affichernews');
Route::post('/newspage', 'AnnonceController@store')->name('publinews');
Route::get('/ajoutnews', 'AnnonceController@create')->name('newsform');
Route::get('/newspage/{annonce}/edit', 'AnnonceController@edit')->name('editnews');
Route::patch('/newspage/{annonce}', 'AnnonceController@update')->name('updatenews');
Route::delete('/newspage/{annonce}', 'AnnonceController@destroy')->name('destroynews');



Route::get('/eventspage', 'EvenementController@index')->name('afficherevents');
Route::post('/eventspage', 'EvenementController@store')->name('publievents');
Route::get('/ajoutevents', 'EvenementController@create')->name('eventsform');

Route::get('/eventspage/{evenement}/edit', 'EvenementController@edit')->name('editevents');
Route::patch('/eventspage/{evenement}', 'EvenementController@update')->name('updateevents');
Route::delete('/eventspage/{evenement}', 'EvenementController@destroy')->name('destroyevents');


Route::get('/formationpage','FormationController@index')->name('afficherformation');
Route::post('/formationpage', 'FormationController@store')->name('publiformation');
Route::get('/ajoutformation', 'FormationController@create')->name('formationform');
Route::get('/formationpage/{formation}/edit', 'FormationController@edit')->name('editformation');
Route::patch('/formationpage/{formation}', 'FormationController@update')->name('updateformation');
Route::delete('/formationpage/{formation}', 'FormationController@destroy')->name('destroyformation');



Route::get('/affichepage', 'AffichageController@index')->name('afficheaffiche');
Route::post('/affichepage', 'AffichageController@store')->name('publiaffiche');
Route::get('/ajoutaffiche', 'AffichageController@create')->name('afficheform');
Route::get('/affichepage/{affichage}/edit', 'AffichageController@edit')->name('editaffichage');
Route::patch('/affichepage/{affichage}', 'AffichageController@update')->name('updateaffichage');
Route::delete('/affichepage/{affichage}', 'AffichageController@destroy')->name('destroyaffichage');


Route::get('/profpage/{classe_id?}', 'CourController@index')->name('courform');
Route::get('/courspage', 'CourController@create')->name('affichercour');
Route::post('/courspage', 'CourController@store')->name('publicours');
Route::get('/courspage/{cour}/edit', 'CourController@edit')->name('editcour');
Route::patch('/courspage/{cour}', 'CourController@update')->name('updatecour');
//Route::get('/courspage/{cour}/download', 'CourController@download')->name('downloadfile');

Route::get('viewAllowdownloadfile','CourController@download');

Route::get('/courspage/{cour}', 'CourController@show')->name('showcour');
Route::delete('/courspage/{cour}', 'CourController@destroy')->name('destroycour');
	
	//comments
Route::post('{cour}/commentaires', 'CommentsController@store');

Route::get('/menu', 'CourController@menu')->name('menupage');

Route::get('/test', 'CourController@testcnx');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');



