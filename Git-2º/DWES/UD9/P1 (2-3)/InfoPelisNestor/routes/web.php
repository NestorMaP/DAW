<?php

use Illuminate\Support\Facades\Route;

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

// Routes for Movie CRUD
Route::resource('movies', MovieController::class)
  ->except(['store', 'update', 'destroy']);

// Routes for Person CRUD (Adding first an specific route)
Route::get('actors', [PersonController::class, 'actors'])
  ->name('actors.index');

Route::resource('persons', PersonController::class)
  ->only(['show']);

// Route for MovieDirector CRUD
Route::resource('directors', MovieDirectorController::class)
  ->only(['show','index']);

