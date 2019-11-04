<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    protected $fillable = [
        'id',
        'name',
        'description',
        'site_link'
    ];

    public $timestamps = false;
}
