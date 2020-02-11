<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{
    protected $table = 'priorities';
    protected $fillable = [
        'name', 'active',
    ];
    public $timestamps = false;
}
