<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Donation;
use App\Models\Article;

class DonationArticle extends Model
{
    use HasFactory;

    protected $table = 'donation_articles';

    protected $fillable = [
        'state',
        'donation_id',
        'article_id',
        'amount'
    ];


    public function donation()
    {
        return $this->belongsTo(Donation::class);
    }

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
