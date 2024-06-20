<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;


    protected $table = 'articles';


    protected $fillable = [
        'name',
        'description',
        'type_article',
        'category_id',
        'state',
        'center_id',
    ];

    public function images() {
        return $this->hasMany(Image::class);
    }
}
