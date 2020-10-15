<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $guarded = [];

    public function kategori(){
       return $this->belongsTo( Kategori::class, 'kategori_id', 'id');
    }

    public function status(){
       return $this->belongsTo( Status::class, 'status_id', 'id');
    }

    public function author(){
       return $this->belongsTo(Author::class, 'author_id', 'id');
    }

    public function subkategori(){
      return $this->belongsTo( SubKategori::class, 'subkategori_id', 'id');
   }

    
    public function tags(){
        return $this->belongsToMany(Tags::class,'tags_blogs','tags_id','blog_id');
   }
}
