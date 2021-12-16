<?php

namespace App\Http\Controllers\Back;

use App\Helper\mHelper;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function  index(){
        return view("back.admin",["data"=>User::where("authority",1)->get()]);
    }
    public  function  add(){

        return view("back.adminadd");
    }

    public  function  post(Request $request){

        $request->validate([
            "name"=>"required",
            'email' => 'required|unique:users,email',


        ]);


        $all=$request->except("_token");
        $all["slug"]= mHelper::slug($all["name"]);
        $all["sifre"]=$all["password"];
        $all["authority"]=1;
        $all["password"]=Hash::make($all["password"]);
        User::create($all);
        $subject = "Giriş Bilgileriniz";

        //    array_push($email,$row["email"]);
        Mail::send("back.userinfomail",$all,function($message) use ($subject,$all){
            $message->subject($subject);
            $message->to($all["email"]);

        });

        return redirect()->back()->with(['status'=>'Başarılı', 'msg'=> 'Kullanıcı Eklendi','type'=>'bg-success']);
    }
    public  function edit($id){
        $w=User::where("id",$id)->count();
        if($w){
            $w=User::where("id",$id)->get();
            return view("back.adminedit",["data"=>$w]);
        }else{
            return redirect()->back();
        }
    }
    public  function  put(Request $request){
        $id = $request->route('id');
        $request->validate([
            "name"=>"required",
            'email' => 'required',
        ]);
        $all=$request->except("_token");
        $all["slug"]= mHelper::slug($all["name"]);
        $all["authority"]=1;
        User::where("id",$id)->update($all);
        return redirect()->back()->with(['status'=>'Başarılı', 'msg'=> 'Kullanıcı Düzenlendi','type'=>'bg-success']);
    }

    public function delete($id)
    {
        $d=User::where("authority",1)->count();
        if($d==1){
            return  redirect()->back()->with(['status' => 'Başarısız', 'msg' => 'Son kullanıcıyı Silemessiniz', 'type' => 'bg-danger']);
        }

        $w = User::where("id", "=", $id)->count();
        if(Auth::user()["id"]==$id){
            return  redirect()->back()->with(['status' => 'Başarısız', 'msg' => 'Kendiniz Silemessiniz', 'type' => 'bg-danger']);
        }
        if ($w) {

            $w = User::where("id", "=", $id)->delete();
            if ($w) {
                return redirect()->route("admin.admin.index")->with(['status' => 'Başarılı', 'msg' => 'Öğe silindi', 'type' => 'bg-success']);
            } else {
                return redirect()->route("admin.admin.index")->with(['status' => 'Başarısız', 'msg' => 'Öğe silinimedi', 'type' => 'bg-danger']);
            }

        } else {
            return redirect()->route("admin.users.index")->with(['status' => 'Başarısız', 'msg' => 'Öğe mevcut değil', 'type' => 'bg-danger']);
        }
    }
    public  function  deleteall(Request $request){
        $d=User::where("authority",1)->count();
        if($d==1){
            return response(['status'=>'Başarılı', 'msg'=> 'Son Kullancıyı silemessniz','type'=>'bg-success']);
        }
        $ids = $request->ids;
        User::whereIn('id',$ids)->delete();
        return response(['status'=>'Başarılı', 'msg'=> 'Kullanıclar Silindi','type'=>'bg-success']);
    }
}
