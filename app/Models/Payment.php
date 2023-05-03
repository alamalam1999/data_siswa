<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payment';

    protected $primaryKey = 'id';

    protected $fillable = [
        'ppdb_id',
    ];

    

    public function ppdb()
    {
        return $this->hasMany(PPDB::class, 'id', 'ppdb_id');
    }
}
