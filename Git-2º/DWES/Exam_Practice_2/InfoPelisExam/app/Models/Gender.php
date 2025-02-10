<?php
// Práctica 6.1

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    protected $table = 'gender';

    public function movieCast() {
        return $this->hasMany(MovieCast::class);
    }
}
