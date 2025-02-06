<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    //use HasFactory;
    protected $table = 'gender'; // Table name in singular

    public function movieCast() {
        return $this->hasMany(MovieCast::class);
    }
}
