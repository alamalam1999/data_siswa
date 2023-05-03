<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FileUpload extends Model
{
    protected $table = 'file_uploads';
    protected $primaryKey = 'id';

    protected $fillable = [
        'file_name',
        'file_path',
        'file_uri',
    ];
}
