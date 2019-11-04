<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserKeywords extends Model
{
    protected $table = 'user_keywords';

    protected $fillable = [
        'id',
        'user_id',
        'keyword_id',
        'created_id',
        'updated_at'
    ];

}
