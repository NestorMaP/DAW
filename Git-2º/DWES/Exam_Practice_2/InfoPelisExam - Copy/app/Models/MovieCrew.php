<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MovieCrew extends Model
{
    protected $table = 'movie_crew';

    public $timestamps = false; // To add a new entry in create_table Práctica 7
    public function movie() {
        return $this->belongsTo(Movie::class);
    }

    public function person() {
        return $this->belongsTo(Person::class);
    }

}
