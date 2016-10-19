<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quiz extends Model {

    use SoftDeletes;
    use Sluggable;
    protected $table = 'quizzes';
    protected $guarded = [];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }


}