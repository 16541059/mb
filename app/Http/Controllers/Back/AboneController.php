<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Abone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AboneController extends Controller
{
    public  function  index(){
        $data= Abone::count();
        return view("back.sendmail",["count"=>$data]);
    }

    public  function  post(Request $request){
        $data=Abone::all();
        $all= $request->except("_token");
        $subject = $all["subject"];
        $email =[];
        foreach ($data as $row){
        //    array_push($email,$row["email"]);
            Mail::send("back.mail",$all+["email"=>$row["email"]],function($message) use ($email,$subject,$row){
                $message->subject($subject);
                $message->to($row["email"]);

            });
        }
  /*      Mail::send("back.mail",$all+["email"=>$email[0]],function($message) use ($email,$subject){
            $message->subject($subject);
            $message->to($email);

        });*/
        return redirect()->back()->with(['status'=>'Başarılı', 'msg'=> 'E-posta Gönderildi','type'=>'bg-success']);
    }
}
