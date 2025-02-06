<?php

use App\Http\Controllers\MovieCastController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request; // Added in Práctica 7 to create the slug
use Illuminate\Support\Facades\Redirect;  // Added in Práctica 7 to create the slug

/* Commented to add new route with name 'index' in Práctica 2.3
Route::get('/', function () {
return view('welcome');
});
*/
// Práctica 2
    /* Comentadas para añadir movie.list y movie.details según Práctica 2.3
    Route::get('/postmovies', function () {
        return ('Listado de películas de InfoPelis');
    })->name('index');

    Route::get('movies/{id}', function ($id) {
        return('Esta es la movie: '. $id);
    })->whereNumber('id')
    ->name('movie');
    */


    /*Comentado para hacer Práctica 3
    * Descomentado para Práctica 6.1 - Modificar de json a método characters en controlador Movies.
    //JSON
    Route::get('movies/{id}/characters', function($id) {
        $jsonPath = resource_path('json/characters.json');
        $characters = json_decode(file_get_contents($jsonPath),true);
        return view('characters', compact('id','characters'));
    })->name('characters');
    */

    Route::get('/', function () {
        return view('index');
    })->name('index');

    /*Comentado para hacer Práctica 3
    Route::get('/movies', function () {
        return view('movies.list');
    })->name('movie.list');

    Route::get('/movies/{id}', function ($id) {
        return view('movies.movie', compact('id'));
    })->whereNumber('id')
      ->name('movie.details');
    */
// Fin Práctica 2



// Práctica 3
    use App\Http\Controllers\MovieController;

    // Práctica 6
        // Ruta de Práctica 3 Modificar de json a método characters en controlador Movies.
        Route::get('movies/{id}/characters',[MovieController::class, 'characters']) // cambio slug ????
        ->name('movies.characters');
    // Fin práctica 6

    use App\Http\Controllers\PersonController;
    use App\Http\Controllers\MovieDirectorController;

    Route::resource('movies',MovieController::class) // Deleted 'destroy' en Práctica 5.4 and 'store' and 'update' en Práctica 6
      ->parameters(['movie'=>'slug'])
      ->missing(function(Request $request) {
        return Redirect::route('movies.index');
      });

    Route::get('actors',[PersonController::class, 'actors'])
      ->name('actors.index');

    // Práctica 6
      Route::get('actors/{id}', [PersonController::class, 'show'])
      ->name('actors.show');
    // Fin Práctica 6

    Route::resource('persons', PersonController::class)
      ->only(['show']);

    Route::resource('directors', MovieDirectorController::class)
      ->only(['index','show']);
// Fin Práctica 3


