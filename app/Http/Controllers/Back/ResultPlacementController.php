<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Placement;
use App\Models\ResultPlacement;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ResultPlacementController extends Controller
{
    public  function  index(){
        $datetime = Carbon::now('Europe/Istanbul');
      $data=   ResultPlacement::orderBy("updated_at","DESC")->get();
        return view("back.resultplacement",["data"=>$data,"datetime"=>$datetime]);
    }

    public function  detail($id){
        $data= ResultPlacement::where("id",$id)->get();
        $question = Placement::all();
        $questiontotal = Placement::count();
        $i=0;
        foreach($question as $index=>$row ){
            foreach(json_decode($data[0]["result"])  as $key=>$value ){
                $row["".\App\Helper\mHelper::trueanswer($row["correct"])  .""]==$value?$i++:null;
            }
        }
        $trueans =$i;
        $falseans =$questiontotal-$trueans;


        return view("back.resultplacementdetail",["data"=>$data,"question"=>$question,"total"=>$questiontotal,"trueans"=>$trueans,"falseans"=>$falseans]);
    }

    public  function  post(Request $request){
        $id=$request->get("id");
        $data= ResultPlacement::where("id",$id)->get();
        $question = Placement::all();
        $questiontotal = Placement::count();
        $i=0;
        foreach($question as $index=>$row ){
            foreach(json_decode($data[0]["result"])  as $key=>$value ){
                $row["".\App\Helper\mHelper::trueanswer($row["correct"])  .""]==$value?$i++:null;
            }
        }
        $trueans =$i;
        $falseans =$questiontotal-$trueans;


        return view("back.resultplacementdetail",["data"=>$data,"question"=>$question,"total"=>$questiontotal,"trueans"=>$trueans,"falseans"=>$falseans]);
    }

    public function delete($id)
    {
        $w = ResultPlacement::where("id", "=", $id)->count();
        if ($w) {
            $w = ResultPlacement::where("id", "=", $id)->delete();
            if ($w) {
                return redirect()->route("admin.resultplacement.index")->with(['status' => 'Başarılı', 'msg' => 'Öğe silindi', 'type' => 'bg-success']);
            } else {
                return redirect()->route("admin.resultplacement.index")->with(['status' => 'Başarısız', 'msg' => 'Öğe silinimedi', 'type' => 'bg-danger']);
            }

        } else {
            return redirect()->route("admin.resultplacement.index")->with(['status' => 'Başarısız', 'msg' => 'Öğe mevcut değil', 'type' => 'bg-danger']);
        }
    }
    public  function  deleteall(Request $request){
        $ids = $request->ids;
        ResultPlacement::whereIn('id',$ids)->delete();
        return response(['status'=>'Başarılı', 'msg'=> 'Öğe Silindi','type'=>'bg-success']);
    }

}
