<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    protected $guarded = [];
    
    public function blog(){
        return $this->belongsToMany(Blog::class,'tags_blogs','blog_id','tags_id');
    }
}
