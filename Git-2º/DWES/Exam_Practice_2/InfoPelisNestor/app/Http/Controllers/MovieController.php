<?php
// Práctica 3

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Práctica 5
use App\Models\Movie;
use App\Models\MovieCrew; // Added in Práctica 7 to create variable $directors
use Illuminate\Support\Str; // Added in Práctica 7 to use slug
use App\Models\Person; // Added in Práctica 7
use App\Http\Requests\MovieRequest; // Added in Práctica 7 to validate form
use Illuminate\Support\Facades\Storage; // Added in Práctica 7 to store images


class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Added in Práctica 7 para slug
        // Obtener todas las películas sin slug
        $movies = Movie::whereNull('slug')->get();

        foreach ($movies as $m) {
            // Generar el slug base a partir del título
            $slugBase = Str::slug($m->title, '-');

            // Si el título tiene caracteres no reconocidos
            if (empty($slugBase)) {
                $slugBase = 'no-title-' . $m->id;
            }

            // Comprobar si el slug ya existe en la base de datos
            $uniqueSlug = $slugBase;
            $counter = 1;
            while (Movie::where('slug', $uniqueSlug)->where('id', '!=', $m->id)->exists()) {
                $uniqueSlug = $slugBase . '-' . $counter;
                $counter++;
            }

            // Asignar el slug único a la película
            $m->slug = $uniqueSlug;
            $m->save();
        }

        // Modificado en Práctica 5
        // Paginación
        $movies = Movie::paginate(5); // Paginación Práctica 5.2
        return view('movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $directors = MovieCrew::where('job','Director')
          ->with('person')
          ->get()
          ->pluck('person.person_name');
        return view('movies.create',compact('directors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MovieRequest $request) // Changed from Request to MovieRequest in Práctica 7
    {
        $movie = new Movie();

        $movie->title = $request->input('title');
        $movie->slug = Str::slug($movie->title,'-');
        $movie->budget = $request->input('budget');
        $movie->homepage = $request->input('homepage');
        $movie->overview = $request->input('overview');
        $movie->popularity = $request->input('popularity');
        $movie->release_date = $request->input('release_date');
        $movie->revenue = $request->input('revenue');
        $movie->runtime = $request->input('runtime');
        $movie->movie_status = $request->input('movie_status');
        $movie->tagline = $request->input('tagline');
        $movie->vote_average = $request->input('vote_average');
        $movie->vote_count = $request->input('vote_count');

        // Image
        $data = $request->only(['title']);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = Str::slug($data['title'], '-') . '.' . $image->getClientOriginalExtension();
            // $path = $request->file('image')->storeAs('movies_img', $imageName);
            $request->file('image')->store('public');
            $movie->image = $imageName;
            //echo var_dump($path);
            exit();
        }

        $movie->save();

        // Add director to movie_crew
        if($request->input('director')){
            $person = Person::where('person_name', $request->director)->first();
            $movie_crew = new MovieCrew();
            $movie_crew->person_id = $person->id;
            $movie_crew->movie_id = $movie->id;
            $movie_crew->department_id = 2;
            $movie_crew->job = 'Director';
            $movie_crew->save();
        }


        return redirect()->route('movies.show', $movie->slug);
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        $movie = Movie::findOrFail($movie->id); // better than Find() as it throws an Exception. Modified on Práctica 5
        $director = $movie->movieCrew->where('job','director')->first();
        return view('movies.show',compact('movie')); // Modified on Práctica 5 from compact('id') to compact('movie')
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        $movie = Movie::findOrFail($movie->id); // Added in Práctica 7
        return view('movies.edit', compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MovieRequest $request, Movie $movie)// Changed from Request to MovieRequest in Práctica 7
    {
        // Práctica 7
        $movie->title = $request->input('title');
        $movie->slug = Str::slug($movie->title,'-');
        $movie->budget = $request->input('budget');
        $movie->homepage = $request->input('homepage');
        $movie->overview = $request->input('overview');
        $movie->popularity = $request->input('popularity');
        $movie->release_date = $request->input('release_date');
        $movie->revenue = $request->input('revenue');
        $movie->runtime = $request->input('runtime');
        $movie->movie_status = $request->input('movie_status');
        $movie->tagline = $request->input('tagline');
        $movie->vote_average = $request->input('vote_average');
        $movie->vote_count = $request->input('vote_count');

        // Image
            $data = $request->only(['title']);
            if ($request->hasFile('image')) {

                // Eliminar la imagen previa
                if ($movie->image) {
                    Storage::delete('public/movies_img/' . $movie->image);
                }

                $image = $request->file('image');
                $imageName = Str::slug($data['title'], '-') . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/movies_img', $imageName);
                $movie->image = $imageName;
            }

        $movie->save();

        return redirect()->route('movies.show', $movie->slug);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Práctica 5.4
        $movie = Movie::findOrFail($id);

        $movie->movieCrew()->delete();

        $movie->delete();
        return redirect()->route('movies.index')->with('success','Película eliminada correctamente');
    }

    // Práctica 6.1
    public function characters(string $id) { //Cambio slug
        $movie = Movie::findOrFail($id); // Cambio slug
        return view('movies.characters', compact('id','movie'));
    }
}
