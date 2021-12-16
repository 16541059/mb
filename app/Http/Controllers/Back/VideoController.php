<?php

namespace App\Http\Controllers\Back;

use App\Helper\imageUpload;
use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public  function  index(){
        $data= Video::all();
        return view("back.video",["data"=>$data]);
    }

    public  function  post(Request $request){
        $all= $request->except("_token");
        $request->validate([
            'name' => 'required',
            'link' => 'required',
        ],[
            'name.required'=>'İsim alanı gerekli',
            'link.required'=>'Link alanı gerekli',
        ]);
        $link= (explode("=",$all["link"]));
        $all["link"]=end($link);
        Video::create($all);
        return redirect()->route("admin.video.index")->with(['status'=>'Başarılı', 'msg'=> 'Öğe Eklendi','type'=>'bg-success']);
    }
    public  function  delete($id){
        $w= Video::where("id","=",$id)->count();
        if($w){

            $w= Video::where("id","=",$id)->delete();
            if($w){
                return redirect()->route("admin.video.index")->with(['status'=>'Başarılı', 'msg'=> 'Öğe silindi','type'=>'bg-success']);
            }else{
                return redirect()->route("admin.video.index")->with(['status'=>'Başarısız', 'msg'=> 'Öğe silinimedi','type'=>'bg-danger']);
            }

        }else{
            return redirect()->route("admin.video.index")->with(['status'=>'Başarısız', 'msg'=> 'Öğe mevcut değil','type'=>'bg-danger']);
        }
    }

    public  function  deleteall(Request $request){
        $ids = $request->ids;
        Video::whereIn('id',$ids)->delete();
        return response(['status'=>'Başarılı', 'msg'=> 'Öğe Silindi','type'=>'bg-success']);
    }

}
