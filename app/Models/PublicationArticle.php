<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicationArticle extends Model
{
    use HasFactory;

    protected $table = 'publication_articles';

    protected $fillable = [
        'meta',
        'publication_id',
        'article_id',
    ];

    public function article() {
        return $this->belongsTo(Article::class);
    }

    public function images() {
        return $this->hasMany(Image::class, 'article_id', 'article_id');
    }
}
