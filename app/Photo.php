<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['url','name','description','place','date'];


    public function user(){


    return $this->belongsTo(User::class);
}
public static  function archive(){

    $archive = Photo::selectraw('year(date) year ,monthname(date) month,count(*) publiched_photos')
        ->orderByRaw('min(date)')
        ->groupBy('year','month')
        ->get()->toArray();


    return $archive ;
    }
    //
}
