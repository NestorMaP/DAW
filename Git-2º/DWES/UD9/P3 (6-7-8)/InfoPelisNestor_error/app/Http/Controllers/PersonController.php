<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $actors = Person::has('movieCast')->paginate(5);
        return view('actors.index',compact('actors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $person = Person::with('movieCast.movie')->findOrFail($id);

        $actingMovies = $person->movieCast->map(fn($cast) => $cast->movie);
        // No me aparecen datos relativos a las películas cómo director
        $directedMovies = $person->movieCrew->where('job','director')->map(fn($crew) => $crew->movie);
        /*$directedMovies = $person->movieCrew->where('job','director');
        foreach ($directedMovies as $direccion)
            echo var_dump(direccion);
        endforeach
        echo var_dump($directedMovies);exit();*/

        return view('actors.show', compact('person','actingMovies','directedMovies'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // Add the method actors
    public function actors() {
        $actors = Person::has('movieCast')->get();
        return view('actors.index', ['actors' => $actors]);
    }
}
