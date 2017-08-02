<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;
class Photo extends Model
{
    protected $fillable = ['url','name','description','place','date'];


    public function user(){


    return $this->belongsTo(User::class);
}
public static  function archive($id){

    $archive = Photo::selectraw('year(date) year ,monthname(date) month,count(*) publiched_photos')
        ->whereRaw('user_id= '.$id)
        ->orderByRaw('min(date)')
        ->groupBy('year','month')
        ->get()->toArray();


    return $archive ;
    }
    public static  function archiveAll(){

        $archive = Photo::selectraw('year(date) year ,monthname(date) month,count(*) publiched_photos')
            ->orderByRaw('min(date)')
            ->groupBy('year','month')
            ->get()->toArray();


        return $archive ;
    }

    public function scopeFilter($query,$filters){

        if($month=$filters['month']){

            $query->whereMonth('date',Carbon::parse($month)->month);
        }
        if ($year=$filters['year']){
            $query->whereYear('date',$year);
        }

    }

}
