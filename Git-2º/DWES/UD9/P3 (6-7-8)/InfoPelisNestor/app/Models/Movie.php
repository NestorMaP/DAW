<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    //use HasFactory;
    protected $table = 'movie';

    public function movieCast() {
        return $this->hasMany(MovieCast::class);
    }

    public function movieCrew() {
        return $this->hasMany(MovieCrew::class);
    }

    public function director() {
        return $this->hasOne(MovieCrew::class)->where('job','director');
    }
}
