<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    protected $fillable = [
        'id',
        'name',
        'age',
        'unique_id'
    ];

    protected $hidden = [
        'password',
        'salt',
        'remember_token'
    ];

    public $timestamps = false;

}
