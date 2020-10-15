<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $guarded = [];

    public function blog(){
        return $this->hasMany(Blog::class, 'author_id','id');
    }
}
