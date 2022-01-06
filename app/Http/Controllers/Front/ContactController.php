<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public  function  index(){
        if (About::where("id",1)->count()){
            $about=About::where("id",1)->get();
        }else{
            $about[0]=["sosial"=>"","name"=>"","about"=>"","image"=>""];
        }
        return view("front.page.contact",["about"=>$about]);
    }

    public function  post(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'tel' => 'required',
            'subject' => 'required',
            'message' => 'required',
            'captcha' => 'required|captcha'

        ], [

            'name.required' => 'Ad alanı gerekli',
            'email.required' => 'E-posta alanı gerekli',
            'tel.required' => 'Telefon alanı gerekli',
            'subject.required' => 'Konu alanı gerekli',
            'message.required' => 'Mesaj alanı gerekli',
            'captcha.required' => 'Lütfen görseldeki metni girniz',
            'captcha.captcha' => 'Görseldeki metnini yanlış girdiniz',
        ]);
        $all=$request->except(["_token","captcha"]);
       $w= Contact::create($all);
       if($w){
           return response(['status'=>'Başarılı', 'msg'=> 'Mesajınız İletilmiştir','type'=>'bg-success']);
       }

    }
}
