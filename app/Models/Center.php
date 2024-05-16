<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    use HasFactory;

     protected $table = 'centers';

     protected $fillable = [
        'name',
        'description',
        'address',
        'location'
     ];

     public function resources()
     {
         return $this->hasMany(Resource::class);
     }
}
