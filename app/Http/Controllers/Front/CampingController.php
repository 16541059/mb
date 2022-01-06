<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Campaign;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CampingController extends Controller
{
    public function index(){


        $language=Campaign::paginate(24);
        return view("front.page.campaing",["data"=>$language,"datetime"=>$datetime]);

    }

    public function detail($slug){
        $datetime = Carbon::now('Europe/Istanbul');
        $data=Campaign::where("slug",$slug)->get();
        $w=Campaign::where("slug","!=",$slug)->orderBy("updated_at","Desc")->get()->take(10);
        if (About::where("id",1)->count()){
            $about=About::where("id",1)->get();
        }else{
            $about[0]=["sosial"=>"","name"=>"","about"=>"","image"=>""];
        }
        return view("front.page.campaingdetail",["data"=>$data,"list"=>$w,"about"=>$about,"datetime"=>$datetime]);

    }
}
