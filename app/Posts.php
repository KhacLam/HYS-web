<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $fillable = [
        'title',
        'content',
        'category_id',
        'user_id',
        'image',
        'slug'
    ];

        public function comments()
        {
            return $this->hasMany('App\Comment', 'foreign_key', 'local_key');
        }
}
