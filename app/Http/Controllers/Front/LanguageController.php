<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Category;
use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function index(){
       $language=Language::all();
       return view("front.page.language",["data"=>$language]);

    }
    public function detail($slug){
        $data=Language::where("slug",$slug)->get();
        $w=Language::all();
        if (About::where("id",1)->count()){
            $about=About::where("id",1)->get();
        }else{
            $about[0]=["sosial"=>"","name"=>"","about"=>"","image"=>""];
        }
        return view("front.page.languagedetail",["data"=>$data,"list"=>$w,"about"=>$about]);

    }
}
