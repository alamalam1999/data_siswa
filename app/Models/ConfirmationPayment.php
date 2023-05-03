<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConfirmationPayment extends Model
{
    protected $table = 'confirmation_payment';

    protected $primaryKey = 'id';

    public function ppdb()
    {
        return $this->belongsTo(PPDB::class, 'ppdb_id', 'id');
    }
}
