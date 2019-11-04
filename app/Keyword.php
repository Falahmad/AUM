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

    public function SourcesRelation() {
        return $this->belongsToMany('App\Source', 'source_keywords');
    }
}
