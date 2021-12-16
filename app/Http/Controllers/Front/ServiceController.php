<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Category;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index($slug){
        if($slug=="egitimlerimiz"){
            $egitim=Category::where("parent_id",0)->get();
            $info =["service"=>"EĞİTİMLERİMİZ"];
            return view("front.page.service",["data"=>$egitim,"info"=>$info]);
        }else{
            $c=Category::where("slug",$slug)->count();
            if($c){
                $egitim=Category::where("slug",$slug)->get();
                $w=Category::where("parent_id",$egitim[0]["id"])->get();
                $info =["service"=>$egitim[0]["name"]];
                return view("front.page.service",["data"=>$w,"info"=>$info]);
            }else{
                return  redirect("/");
            }

        }

    }
    public function detail($slug){
        $data=Category::where("slug",$slug)->get();
        $w=Category::where("parent_id",$data[0]["parent_id"])->get();
        if (About::where("id",1)->count()){
            $about=About::where("id",1)->get();
        }else{
            $about[0]=["sosial"=>"","name"=>"","about"=>"","image"=>""];
        }
        return view("front.page.serivcedetail",["data"=>$data,"list"=>$w,"about"=>$about]);

    }
}
