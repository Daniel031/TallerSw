<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdministrorCenter extends Model
{
    use HasFactory;


    protected $table = 'administrator_centers';

    protected $fillable = [
        'administrator_id',
        'center_id',
    ];
}
