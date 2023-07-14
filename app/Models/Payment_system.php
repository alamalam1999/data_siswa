<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment_system extends Model
{
    protected $table = 'payment_system';

    protected $primaryKey = 'id';

    protected $fillable = [
        'ppdb_id',
    ];

    

    public function ppdb()
    {
        return $this->hasMany(PPDB::class, 'id', 'ppdb_id');
    }
}
