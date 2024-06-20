<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;

    protected $table = 'publications';

    protected $fillable = [
        'title',
        'detail',
        'initDate',
        'finDate',
        'economic_contribution',
        'state',
        'center_id',
        'imagen'
    ];

    public function articles() {
        return $this->hasMany(PublicationArticle::class);
    }


}
