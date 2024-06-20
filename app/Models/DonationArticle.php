<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
