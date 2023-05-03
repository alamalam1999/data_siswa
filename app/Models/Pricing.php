<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    protected $table = 'pricing';

    protected $primaryKey = 'id';

    protected $fillable = [
        'price_group',
        'price_code',
        'discount_code',
        'school_code',
        'school_stage',
        'school_class',
        'price_value',
        'percentage_value',
        'description'
    ];
}


