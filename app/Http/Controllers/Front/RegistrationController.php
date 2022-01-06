<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class RegistrationController extends Controller
{
    public  function  index(){

        return view("front.page.registration");
    }

    public function  post(Request $request){
        $request->validate([
            "kvkk"=>"required",
            "name"=>"required",
            "mail"=>"required",
            "tel"=>"required",
            "captcha"=>"required|captcha",
        ],[
            'captcha.captcha' => 'Görseldeki metnini yanlış girdiniz',
        ]);
        $all=$request->except("_token");
        $all["extra"]=json_encode([
            "genelingilizce"=>$request->has("genelingilizce"),
            "konusmaisingilizcesi"=>$request->has("konusmaisingilizcesi"),
            "homeschooling"=>$request->has("homeschooling"),
            "online"=>$request->has("online"),
            "sinav"=>$request->has("sinav"),
            "meslek"=>$request->has("meslek"),
            "is"=>$request->has("is"),
            "turizim"=>$request->has("turizim"),
            "ogrenmek"=>$request->has("ogrenmek"),
            "zaman"=>$request->get("zaman"),
            "egitimtur"=>$request->get("egitimtur"),
            "gender"=>$request->get("gender"),


        ]);
        $w= Registration::create($all);
        if($w){
            $mail=env("GET_MAIL_ADRESS");
            $all["msg"]="Ön Kayıt Başvurusunda Bulundu. Lütfen Yönetim Panelinde kontrol ediniz.";
            Mail::send("front.page.mail",$all,function($message) use($mail){
                $message->subject("Ön Kayıt Başvurusu");
                $message->to($mail);

            });
            return redirect("/onkayit")->with(['status' => 'Başarılı', 'msg' => 'Kaydınız Alınmıştır', 'type' => 'bg-success']);
        }

    }
}
