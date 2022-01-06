<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\Examresult;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ExamResultController extends Controller
{
    public  function  index(){
       $w=Exam::all();
        $datetime = Carbon::now('Europe/Istanbul');
        return view("back.examresult", ["data" => $w,"datetime"=>$datetime]);
    }

    public  function  edit($id){
        $w= Examresult::where("exam_id",$id)->count();
        if($w){
            $w= Examresult::where("exam_id",$id)->with("exam")->with("user")->get();
            $datetime = Carbon::now('Europe/Istanbul');
            return view("back.resultexamlist", ["data" => $w,"datetime"=>$datetime]);
        }
         return  redirect()->back()->with(['status' => 'Başarısız', 'msg' => 'Henüz hiçbir öğrenci sınava katılmadı', 'type' => 'bg-danger']);


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

        return view("back.resultexamdetail", ["data" => $w,"datetime"=>$datetime ,"result"=>$result,"total"=>$total,"trueans"=>$i]);
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

        return view("back.resultexamdetail", ["data" => $w,"datetime"=>$datetime ,"result"=>$result,"total"=>$total,"trueans"=>$i]);

    }


    public function delete($id)
    {
        $w = Examresult::where("id", "=", $id)->count();
        if ($w) {
            $w = Examresult::where("id", "=", $id)->delete();
            if ($w) {
                return redirect()->route("admin.examresult.index")->with(['status' => 'Başarılı', 'msg' => 'Öğe silindi', 'type' => 'bg-success']);
            } else {
                return redirect()->route("admin.examresult.index")->with(['status' => 'Başarısız', 'msg' => 'Öğe silinimedi', 'type' => 'bg-danger']);
            }

        } else {
            return redirect()->route("admin.examresult.index")->with(['status' => 'Başarısız', 'msg' => 'Öğe mevcut değil', 'type' => 'bg-danger']);
        }
    }

    public function deleteall(Request $request)
    {

        $ids = $request->ids;
        Examresult::whereIn('id', $ids)->delete();
        return response(['status' => 'Başarılı', 'msg' => 'Öğe Silindi', 'type' => 'bg-success']);
    }

    public  function  update($id){

            $w = Examresult::where("exam_id", "=", $id)->update(["active"=>1]);
            if ($w) {
                return redirect()->route("admin.examresult.index")->with(['status' => 'Başarılı', 'msg' => 'Güncellendi', 'type' => 'bg-success']);
            } else {
                return redirect()->route("admin.examresult.index")->with(['status' => 'Başarısız', 'msg' => 'Güncelenemedi', 'type' => 'bg-danger']);
            }
    }

}
