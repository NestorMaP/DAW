<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MovieCast;

class MovieCastController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         return view('movie_cast.index');
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
    public function show(string $movie_id)
    {
        $movieCast = MovieCast::findOrFail($movie_id);
        return view('movie_cast.show', compact('movieCast'));
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
}
