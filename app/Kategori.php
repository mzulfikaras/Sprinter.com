<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $guarded = [];

    public function blog(){
        $this->hasMany(Blog::class,'kategori_id', 'id');
    }

    public function subKategori(){
        $this->hasMany(SubKategori::class, 'kategori_id', 'id');
    }
}
