<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Answer extends Model {

    use SoftDeletes;
    protected $table = 'answers';
    protected $fillable = [];

    public function questions()
    {
        return $this->belongsTo(Question::class);
    }
}