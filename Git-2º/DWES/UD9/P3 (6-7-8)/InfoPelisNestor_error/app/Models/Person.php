<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    //use HasFactory
    protected $table = 'person'; // Table name in singular

    public function movieCast() {
        return $this->hasMany(MovieCast::class);
    }

    public function movieCrew(){
        return $this->hasMany(MovieCrew::class, 'person_id');
    }
}
