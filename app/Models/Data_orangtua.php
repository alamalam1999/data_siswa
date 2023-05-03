<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Data_orangtua extends Model
{
	
    protected $table = 'data_orangtua';
    
    protected $primaryKey = 'id';

    protected $fillable = [
        'ppdb_id',
        'data_1',
        'data_2',
        'data_3',
        'data_4',
        'data_5',
        'data_6',
        'data_7',
        'data_8',
        'data_9',
        'data_10',
        'data_11',
        'data_12'
    ];
}
