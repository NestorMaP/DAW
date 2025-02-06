<?php
// Práctica 3

namespace App\Http\Controllers;

use App\Models\Person; // Práctica 6.1

use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $person =Person::findOrFail($id);

        // Películas como actor
        $actedMovies = $person->actedMovies()->with('movie')->get();

        // Películas como director
        $directedMovies = $person->directedMovies()->with('movie')->get();

        return view('persons.show', compact('person','actedMovies','directedMovies'));
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

    //Práctica 6
    public function actors() {
        $actors = Person::has('movieCast')->paginate(10); // Paginate práctica 6
        return view('actors.index', compact('actors'));
    }

    public function directors() {
        $directors = Person::has('movieCrew')->get(); // Directors Práctica 6
        return view('actors.index', compact('actors'));
    }
}
