<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;
use Illuminate\View\View;

class photosController extends Controller{

    public function __construct()
    {
        $this->middleware('auth')->except(['Show_single_photo' , 'home']);
    }

    public function store(){

/*        $item = new Photo();
        $item->url=request('url');
        $item->name=request('name');;
        $item->user_id=auth()->id();
        $item->description=request('description');
        $item->place= request('place');
        $item->date= request('date');
        $item->save();*/

auth()->user()->add_photo(
    new Photo(request(
    ['url','name','description','place','date'])
));


        return redirect()->home();
    }




    public function Show_single_photo($id){
       $photo= Photo::find($id);
        return View("admin.photo",compact('photo'));
    }



    public function add_photo(){

        return View('admin.add_photo');
    }


    public function home(){
        if (auth()->check()){
            $photos=Photo::all()->where('user_id','==',auth()->id());
            $arr = Array('photo'=>$photos);
        }
        else{
            $photos=Photo::all();
        $arr = Array('photo'=>$photos);
        }

        return View("admin.home",$arr);
    }


    public function index_post(Request $post,$id){
        $item = Photo::find($id);
        $item->name=$post->input('name');
        $item->description= $post->input('description');
        $item->place= $post->input('place');
        $item->date= $post->input('date');
        $item->save();


        $photos=Photo::all();
        $arr = Array('photo'=>$photos);
        return redirect("/");
    }
}
