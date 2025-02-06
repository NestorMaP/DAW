<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MovieCrew extends Model
{
    protected $table = 'movie_crew';
    public $timestamps = false;

    public function movie() {
        return $this->belongsTo(Movie::class,'movie_id');
    }

    public function person() {
        return $this->belongsTo(Person::class);
    }
}
