<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MovieCast extends Model
{
    // use HasFactory;
    protected $table = 'movie_cast'; // Table name in singular

    public function movie() {
        return $this->belongsTo(Movie::class);
    }

    public function person() {
        return $this->belongsTo(Person::class);
    }

    public function gender() {
        return $this->belongsTo(Gender::class);
    }
}
