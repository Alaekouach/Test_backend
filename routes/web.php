<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('tache',[
    'uses'=>'TacheController@alltache',
    'as'=> 'alltache.page'
]);

Route::post('tache',[
    'uses'=>'TacheController@addtache',
    'as'=> 'addtache.page'
]);



Route::post('ajout-completed-tache',[
    'uses'=>'TacheController@ajout_completed_tache',
    'as'=> 'ajout-completed-tache'
]);


Route::post('supprimer-tache',[
    'uses'=>'TacheController@supprimer_tache',
    'as'=> 'supprimer-tache'
]);

Route::post('supprimer-all',[
    'uses'=>'TacheController@supprimer_all',
    'as'=> 'supprimer-all'
]);