<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Refrans;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public  function  index(){
        if (About::where("id",1)->count()){
            $about=About::where("id",1)->get();
        }else{
            $about[0]=["sosial"=>"","name"=>"","about"=>"","image"=>""];
        }
        $referans=Refrans::all();
        return view("front.page.about",["about"=>$about,"referans"=>$referans]);
    }

}
