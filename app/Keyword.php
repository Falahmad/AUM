<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    protected $fillable = [
        'id',
        'word'
    ];

    public $timestamps = false;
}
