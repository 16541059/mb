<?php

namespace App\Http\Controllers\Back;

use App\Helper\imageUpload;
use App\Http\Controllers\Controller;
use App\Models\Refrans;
use Illuminate\Http\Request;
use File;
class RefaransController extends Controller
{
    public  function  index(){
        $data= Refrans::all();
        return view("back.refarans",["data"=>$data]);
    }

    public  function  post(Request $request){
        $all= $request->except("_token");
        $request->validate([
            'name'=>'required',
            'file' => 'required|image|mimes:jpg,png,jpeg,gif,webp,svg|max:3048',
        ],[
            'file.required'=>'Görsel alanı gerekli',
            'name.required'=>'İsim alanı gerekli',
            'file.image'=>'Görsel yükleyiniz',
            'file.max'=>'Görsel boyutu 3Mb\'den küçük olmalıdır',
            'file.mimes'=>'Görsel dosya biçimi jpg, png, jpeg, gif, svg olmalıdır',

        ]);
        $all["image"]= imageUpload::singleUpload("refrans",$request->file("file"),220,85);
        //   $all["name"]=$request->file("file")->getClientOriginalName();
        $w=Refrans::create($all);
        return response(['status'=>'Başarılı', 'msg'=> 'Referans  Eklendi','type'=>'bg-success']);
    }

    public  function  delete($id){
        $w= Refrans::where("id","=",$id)->count();
        if($w){
            $data =Refrans::where("id","=",$id)->get();

            $dltname= (explode("/",$data[0]["image"]));
            File::delete(public_path()."/images/refrans/".end($dltname));
            $w= Refrans::where("id","=",$id)->delete();
            if($w){
                return redirect()->route("admin.refrans.index")->with(['status'=>'Başarılı', 'msg'=> 'Öğe silindi','type'=>'bg-success']);
            }else{
                return redirect()->route("admin.refrans.index")->with(['status'=>'Başarısız', 'msg'=> 'Öğe silinimedi','type'=>'bg-danger']);
            }

        }else{
            return redirect()->route("admin.refrans.index")->with(['status'=>'Başarısız', 'msg'=> 'Öğe mevcut değil','type'=>'bg-danger']);
        }
    }

    public  function  deleteall(Request $request){
        $ids = $request->ids;
        $data= Refrans::whereIn('id',$ids)->get();
        foreach ($data as $row ){
            imageUpload::delete("refrans", $row["image"]);
        }
        Refrans::whereIn('id',$ids)->delete();
        return response(['status'=>'Başarılı', 'msg'=> 'Öğe Silindi','type'=>'bg-success']);
    }
}
