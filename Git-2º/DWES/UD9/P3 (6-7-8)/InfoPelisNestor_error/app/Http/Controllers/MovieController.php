<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Movie;
use App\Models\MovieCrew;
use App\Models\Person;
use App\Http\Requests\MovieRequest;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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

        // Obtener todas las películas paginadas
        $movies = Movie::paginate(5);
        return view('movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $directors = MovieCrew::where('job', 'Director')
            ->with('person')
            ->get()
            ->pluck('person.person_name');

        return view('movies.create', compact('directors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MovieRequest $request)
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

        // Imagen
        $data = $request->only(['title']);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = Str::slug($data['title'], '-') . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/movies_img', $imageName);
            $data['image'] = $imageName;
        }

        $movie->save();

        // Add director to movie_crew
        $person = Person::where('person_name', $request->director)->first();
        $movie_crew = new MovieCrew();
        $movie_crew->person_id = $person->id;
        $movie_crew->movie_id = $movie->id;
        $movie_crew->department_id = 2;
        $movie_crew->job = 'Director';
        $movie_crew->save();


        return redirect()->route('movies.show', $movie->slug);
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        // $movie = Movie::find($id);
        $movie = Movie::findOrFail($movie->id); // better as it throws an Exception
        $director = $movie->crew->where('job','director')->first();
        return view('movies.show', compact('movie','director'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        $movie = Movie::findOrFail($movie->id);
        return view('movies.edit',compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MovieRequest $request, Movie $movie)
    {
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

        // Imagen
        $data = $request->only(['title']);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = Str::slug($data['title'], '-') . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/movies_img', $imageName);
            $data['image'] = $imageName;

            // Eliminar la imagen previa
            if ($movie->image) {
                Storage::delete('public/movies_img/' . $movie->image);
            }
        }

        $movie->save();

        return redirect()->route('movies.show', $movie->slug);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Movie::findOrFail($id)->delete();
        return redirect()->route('movies.index');
    }

    public function cast(string $id){
        $movie = Movie::findOrFail($id);
        return view('movies.cast',compact('movie'));
    }

    public function characters($id) {
        $movie = Movie::findOrFail($id);
        return view('movies.characters', compact(['movie']));
    }
}
