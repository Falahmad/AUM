<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SourceKeywords extends Model
{
    protected $table = 'source_keywords';

    protected $fillable = [
        'id',
        'source_id',
        'keyword_id'
    ];

    public $timestamps = false;

    public function Sources() {
        return $this->belongsTo('App\Source', 'source_id');
    }

}
