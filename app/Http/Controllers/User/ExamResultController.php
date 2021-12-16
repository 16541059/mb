<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Examresult;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamResultController extends Controller
{
    public  function  index(){
        $id= Auth::user()["id"];
        $data= Examresult::where("user_id",$id)->where("active",1)->with("user")->with("exam")->get();
        return view("user.result",["data"=>$data]);
    }


    public  function  detail($id){
        $w= Examresult::where("id",$id)->with("exam")->with("user")->get();
        $datetime = Carbon::now('Europe/Istanbul');
        $result=  json_decode($w[0]["answers"]) ;
        $total=  count(json_decode($w[0]["exam"]["question"]))  ;
        $i=0;
        foreach(json_decode($w[0]["exam"]["question"]) as $key=>$row ){
            foreach ($row as $keys=>$value){
                $val=   explode( '_', $keys );
                if($val[0]=="question"){
                    $userresutl= !empty( $result->$keys)?$result->$keys:$keys;

                }
                if($val[0]=="answera"){
                    $userresutl==$value?++$i:"";
                }
            }
        }

        return view("user.resultexamdetail", ["data" => $w,"datetime"=>$datetime ,"result"=>$result,"total"=>$total,"trueans"=>$i]);
    }

    public  function  post(Request $request){
        $id=$request->get("id");
        $w= Examresult::where("id",$id)->with("exam")->with("user")->get();
        $datetime = Carbon::now('Europe/Istanbul');
        $result=  json_decode($w[0]["answers"]) ;
        $total=  count(json_decode($w[0]["exam"]["question"]))  ;
        $i=0;
        foreach(json_decode($w[0]["exam"]["question"]) as $key=>$row ){
            foreach ($row as $keys=>$value){
                $val=   explode( '_', $keys );
                if($val[0]=="question"){
                    $userresutl= !empty( $result->$keys)?$result->$keys:$keys;

                }
                if($val[0]=="answera"){
                    $userresutl==$value?++$i:"";
                }
            }
        }

        return view("user.resultexamdetail", ["data" => $w,"datetime"=>$datetime ,"result"=>$result,"total"=>$total,"trueans"=>$i]);
    }
}
