<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$movies = Movie::all();
        $movies = Movie::paginate(5);
        return view('movies.index',compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('movies.create');
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
    public function show($id)
    {
        // $movie = Movie::find($id);
        $movie = Movie::findOrFail($id); // better as it throws an Exception
        $movie_with_director = Movie::with('director.person')->findOrFail($id);
        return view('movies.show', compact('movie','movie_with_director'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('movies.edit',compact('id'));
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
