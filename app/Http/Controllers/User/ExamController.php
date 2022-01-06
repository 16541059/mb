<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\Examresult;
use App\Models\Placement;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{
    public function index()
    {
        $w = Auth::user()["level"];

        $data = Exam::where("level", $w)->where("date","=",Carbon::now()->format("Y-m-d"))->get();
        $datetime = Carbon::now('Europe/Istanbul');
        $check= Examresult::all();
        return view("user.exam", ["data" => $data, "datetime" => $datetime,"check"=>$check]);
    }

    public  function  question($slug){
        $data = Exam::where("slug", $slug)->get();
        $datetime = Carbon::now('Europe/Istanbul');
        $user_id = Auth::user()["id"];
        $check =Examresult::where("user_id",$user_id)->where("exam_id",$data[0]["id"])->count();
        if($check){
            return redirect()->back()->with(['status'=>'Başarısız', 'msg'=> 'Bu sınava dana önce katıldınız','type'=>'bg-success']);
        }
        return view("user.question", ["data" => $data, "datetime" => $datetime]);
    }

    public  function  post(Request $request){

         $w=Exam::where("slug",$request->route("slug"))->get();
         $all["exam_id"]=$w[0]["id"];
         $all["user_id"]=Auth::user()["id"];
         $all["answers"]=json_encode($request->get("result")) ;
        $w= Examresult::where("user_id",$all["user_id"])->where("exam_id",$all["exam_id"])->count();
        if(!$w){
         $data=   Examresult::create($all);
         $id= $data->id;
            $w= Examresult::where("id",$id)->with("exam")->with("user")->get();
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
            $point = $i/$total*100;
            Examresult::where("id",$id)->update(["point"=>$point]);
        }


    }

}
