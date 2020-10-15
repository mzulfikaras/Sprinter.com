<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $guarded = [];

    public function blog(){
        $this->hasMany(Blog::class,'status_id', 'status');
    }

    public function about(){
        $this->hasMany(About::class,'status_id','id');
    }

    public function contact(){
        $this->hasMany(Contact::class,'status_id','id');
    }
}
