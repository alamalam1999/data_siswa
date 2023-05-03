<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EnumData extends Model
{
    protected $table = 'enum_data';
    public $incrementing = false;
    protected $fillable = [
        'enum_site',
        'enum_group',
        'enum_code',
        'enum_order',
        'enum_value',
        'enum_label',
    ];
}
