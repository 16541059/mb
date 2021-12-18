<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Abone;
use App\Models\About;
use App\Models\Campaign;
use App\Models\Category;
use App\Models\Foto;
use App\Models\Popup;
use App\Models\Refrans;
use App\Models\Slider;
use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){

        $datetime = Carbon::now('Europe/Istanbul');
        $slider=Slider::where("active",1)->get();
        if (About::where("id",1)->count()){
            $about=About::where("id",1)->get();
        }else{
            $about[0]=["sosial"=>"","name"=>"","about"=>"","image"=>""];
        }
        if (Popup::where("id",1)->count()){
            $popup=Popup::where("id",1)->get();
        }else{
            $popup[0]=["active"=>"","oneshow"=>"","image"=>"","link"=>""];
        }
        $egitim=Category::where("parent_id",0)->get()->take(9);
        $referans=Refrans::all();
        $kampanya=Campaign::orderBy("updated_at","Desc")->get()->take(3);
        $sinavingilizcesi=Category::where("slug","LIKE",'%sinav-ingilizcesi%')->with("subcategory")->count();

        if(!empty($sinavingilizcesi)){
            $sinavingilizcesi=Category::where("slug","LIKE",'%sinav-ingilizcesi%')->with("subcategory")->get();
            $sinav=Category::where("parent_id",$sinavingilizcesi[0]["id"])->get();
        }else{
            $sinav=[];
        }

        $w =Visitor::where("ip",$request->getClientIp())->where("date", $datetime->format('Y-m-d'))->count();
        if(!$w){
            Visitor::create(["ip"=>$request->getClientIp(),"date"=>$datetime->format('Y-m-d') ]);
        }
        $foto=Foto::orderBy("updated_at","Desc")->get()->take(9);

        return view('welcome',["slider"=>$slider,"about"=>$about,"egitim"=>$egitim,"referans"=>$referans,
            "kampanya"=>$kampanya,"datetime"=>$datetime,"sinavingilizcesi"=>$sinavingilizcesi,"sinav"=>$sinav,"popup"=>$popup,"foto"=>$foto,"color"=>"#29235c","redcolor"=>"#e30613" ]);
    }

    public  function  save(Request $request){
        $request->validate([
            "value"=>"required"
        ]);
        if(Abone::where("email","=", $request->value)->count()){
            return response()->json(['message'=>'Kaydınızı daha önce eklediniz']);
        }else{
            $all["email"]=$request->value;
            $check=   Abone::create($all);
            if($check){
                return response()->json(['message'=>'Abonemiz oldunuz']);
            }
        }
    }
    public function  delete($slug){
        if(Abone::where("email","=", $slug)->count()){
            $check=  Abone::where("email","=", $slug)->delete();
            if($check){
                return "Abonelikten  Çıktınız";
            }
        }else{

            return "Geçersiz email";
        }
    }

}
