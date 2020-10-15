<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $guarded = [];

    public function status(){
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }
}
