<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use Sluggable;
    protected $guarded = [];
    protected $table = 'quiz';

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function setReferenceAttribute()
    {
        return $this->attributes['reference'] = '#'.str_random(10);
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class);
    }
}
