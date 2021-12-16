<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Placement;
use App\Models\ResultPlacement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PlacementController extends Controller
{
    public  function  index(){
       $data=   Placement::inRandomOrder()->get();
        return view("front.page.placement",["data"=>$data]);
    }

    public function post(Request $request){
        $all=$request->except("_token");
        $all["result"]= json_encode($request->get("result"));
       $w=  ResultPlacement::create($all);
       if($w){
           $mail=env("GET_MAIL_ADRESS");
           $all["msg"]="Seviye Belirleme Sınavına Katıldı. Lütfen Yönetim Panelinde kontrol ediniz.";
           Mail::send("front.page.mail",$all,function($message) use ($mail){
               $message->subject("Seviye Tespit Sınavı");
               $message->to($mail);

           });
       }
    }

}
