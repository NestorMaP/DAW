<?php
// Práctica 5

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $table = 'movie';
    // public $timestamps = 'false'; // Added in Práctica 7 to add slug to movies but it's useless so a migration was used (add_timestamps)

    // Method added in Práctica 7 - slug
        public function getRouteKeyName() {
            return 'slug';
        }
    // Fin Práctica 7
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
