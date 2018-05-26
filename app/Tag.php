<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function posts()
    {
        $this->belongsToMany(
            Post::class,
            'post_tags',
            'tag_id',
            'post_id'
        );
    }
}

