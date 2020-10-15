<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Target extends Model
{
    public $table = 'targets';
    
    public $fillable = [
        'target',
        'origin',
        'body_type',
        'body',
        'show_by_origin',
        'one_to_one',
        'status',
        'key',
    ];
    public function responses()
    {
        return $this->hasMany('App\Models\Response');
    }
}
