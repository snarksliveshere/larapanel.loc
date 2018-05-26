<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{

    use Sluggable;

    public function category()
    {
        return $this->hasOne(Category::class);
//        теперь я смогу делать такую штуку
//        $post = Post::find(1);
//        $post->category()->title - связь с категорией по hasOne

    }

    public function author()
    {
        return $this->hasOne(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(
            Tag::class,
            'post_tags', // таблица
            'post_id', // id этой (пост) модели
            'tag_id' // id таблицы, с которой связываюсь - тэги $post->tags - все тэги
        );
    }

    // translit! автоматический
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
