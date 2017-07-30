<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['url','name','description','place','date'];


    public function user(){


    return $this->belongsTo(User::class);
}
    //
}