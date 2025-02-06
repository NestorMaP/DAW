<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', function () {
    return view('index');
})->name('index');
/*
Route::get('/postmovies', function () {
    return view('movies.show');
})->name('list');

Route::get('/movies/{id}', function ($id) {
    return view('movies.movie');
})->whereNumber('id')
  ->name('movie');

Route::get('/movies/{id}/characters',function ($id) {
    $jsonPath = resource_path('json/characters.json');
    $characters = json_decode(file_get_contents($jsonPath),true);
    return view('characters', compact('characters','id'));
})->name('characters');
*/
use App\Http\Controllers\MovieController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\MovieDirectorController;
use App\Http\Controllers\MovieCastController;

// Routes for Movie CRUD
Route::resource('movie', MovieController::class)
        ->parameters(['movie' => 'slug'])
        ->missing(function(Illuminate\Http\Request $request) {
            return Redirect::route('movies.index');
        });

// Routes for Person CRUD (Adding first an specific route)
Route::get('actors', [PersonController::class, 'actors'])
  ->name('actors.index');

Route::resource('persons', PersonController::class)
  ->only(['show']);

// Route for MovieDirector CRUD
Route::resource('directors', MovieDirectorController::class)
  ->only(['show','index']);

// Route for MovieCast CRUD
Route::resource('movie_cast', MovieCastController::class)
  ->only(['show','index']);


Route::get('movies/{id}/cast',[MovieController::class, 'cast'])
  ->name('movies.cast');

Route::get('movies/{id}/characters',[MovieController::class, 'characters'])
  ->name('movies.characters');

Route::get('actors/{id}', [PersonController::class, 'show'])
  ->name('actors.show');



