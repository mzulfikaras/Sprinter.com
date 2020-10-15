<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubKategori extends Model
{
    protected $guarded = [];

    public function kategori(){
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }

    public function blog(){
        return $this->hasMany(Blog::class, 'subkategori_id', 'id');
    }
}
