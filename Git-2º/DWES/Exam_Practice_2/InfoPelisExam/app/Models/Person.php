<?php
// Práctica 6

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'person';

    public function movieCast() {
        return $this->hasMany(MovieCast::class);
    }

    public function movieCrew() {
        return $this->hasMany(MovieCrew::class);
    }

    // Práctica 6 Actors and Directors
    public function actedMovies() {
        return $this->hasMany(MovieCast::class, 'person_id');
    }

    public function directedMovies() {
        return $this->hasMany(MovieCrew::class, 'person_id')
        ->where('job','director');
    }
}
