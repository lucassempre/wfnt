<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    public $table = 'responses';

    public $fillable = [
        'raw',
        'ip',
        'target_id',
    ];
}
