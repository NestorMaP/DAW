<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    //use HasFactory;
    //protected $fillable = ['title','slug'];
    protected $table = 'movie';
    //public $timestamps = false;


    public function getRouteKeyName() {
        return 'slug';
    }
    public function movieCast() {
        return $this->hasMany(MovieCast::class);
    }

    public function crew() {
        return $this->hasMany(MovieCrew::class);
    }

    public function director() {
        return $this->hasOne(MovieCrew::class)->where('job','Director');
    }

    public function actors() {
        return $this->belongsToMany(Person::class, 'movie_cast');
    }
}
