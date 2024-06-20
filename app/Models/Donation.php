<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;
    
    protected $table ='donations';

    protected $fillable = [
        'donation_date',
        'donor_id',
        'type_donation',
        'economic_contribution',
        'publication_id',
        'sucursal_id',

    ];
}
