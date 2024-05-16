<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;

    protected $table = 'resources';

    protected $fillable = [
        'url',
        'type_resource',
        'center_id'
    ];

    public function center()
    {
        return $this->belongsTo(Center::class);
    }
}
