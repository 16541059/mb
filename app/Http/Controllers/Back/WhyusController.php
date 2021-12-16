<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Whyus;
class WhyusController extends Controller
{
    public  function index(){
        $w=Whyus::all();
        return view("back.whyus",["data"=>$w]);
    }

    public  function  post(Request $request){
        $all=$request->except("_token");
        Whyus::create($all);
        return redirect()->route("admin.whyus.index")->with(['status'=>'Başarılı', 'msg'=> 'Öğe Eklendi','type'=>'bg-success']);
    }

    public  function  delete($id){
        $w= Whyus::where("id","=",$id)->count();
        if($w){

            $w= Whyus::where("id","=",$id)->delete();
            if($w){
                return redirect()->route("admin.whyus.index")->with(['status'=>'Başarılı', 'msg'=> 'Öğe silindi','type'=>'bg-success']);
            }else{
                return redirect()->route("admin.whyus.index")->with(['status'=>'Başarısız', 'msg'=> 'Öğe silinimedi','type'=>'bg-danger']);
            }

        }else{
            return redirect()->route("admin.whyus.index")->with(['status'=>'Başarısız', 'msg'=> 'Öğe mevcut değil','type'=>'bg-danger']);
        }
    }

    public  function  deleteall(Request $request){
        $ids = $request->ids;
        Whyus::whereIn('id',$ids)->delete();
        return response(['status'=>'Başarılı', 'msg'=> 'Öğe Silindi','type'=>'bg-success']);
    }

    public  function put(Request $request){
        $all["question"]=$request->get("questionedit");
        $all["ansver"]=$request->get("ansveredit");
        $all["id"]=$request->get("id");
      $w= Whyus::where('id',$all["id"])->update($all);
      if($w){
          return response(['status'=>'Başarılı', 'msg'=> 'Güncellendi','type'=>'bg-success']);
      }

    }

}
