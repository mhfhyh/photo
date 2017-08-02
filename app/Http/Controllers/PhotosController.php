<?php

namespace App\Http\Controllers;

use App\Photo;
use Carbon\Carbon;
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
            $photo=Photo::all()->where('user_id','==',auth()->id());
            $archive = Photo::archive(auth()->id());

           if (\request('month')){
               $photo = Photo::latest()->filter( request(['month','year']))->get();}
            $photo = $photo->where('user_id','==',auth()->id());
            return View("admin.home",compact('photo','archive'));
        }
        else{
            $photo=Photo::all();
            return View("admin.home",compact('photo'));
        }


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
