<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = 'images';


    protected $fillable = [
        'url',
        'article_id',
        'state'
    ];

    public function article() {
        return $this->belongsTo(Article::class);
    }
}
