<?php

namespace App\Http\Controllers\Back;

use App\Helper\imageUpload;
use App\Helper\mHelper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Language;
use Illuminate\Http\Request;
use File;
class LanguegeController extends Controller
{
    public  function  index(){
        $w= Language::all();
        return view('back.language',["data"=>$w]);

    }

    public  function  add(){

        return view("back.languageadd");
    }

    public  function  post(Request  $request){
        $all= $request->except("_token");
        $request->validate([
            'description'=>'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,webp,svg|max:3048',
        ],[
            'image.required'=>'Görsel alanı gerekli',
            'image.image'=>'Görsel yükleyiniz',
            'image.max'=>'Görsel boyutu 3Mb\'den küçük olmalıdır',
            'image.mimes'=>'Görsel dosya biçimi jpg, png, jpeg, gif, svg olmalıdır',
            'description.required'=>'İçerik alanı gerekli',
        ]);
        $all["image"]= imageUpload::singleUpload("diller",$request->file("image"),763,569);
        $all["slug"]=mHelper::slug($all["title"]);
        $w=Language::create($all);
        return redirect()->back()->with(['status'=>'Başarılı', 'msg'=> 'Öğe Eklendi','type'=>'bg-success']);
    }

    public  function  delete($id){
        $w= Language::where("id","=",$id)->count();
        if($w){
            $data =Language::where("id","=",$id)->get();

            $dltname= (explode("/",$data[0]["image"]));
            File::delete(public_path()."/images/diller/".end($dltname));
            $w= Language::where("id","=",$id)->delete();
            if($w){
                return redirect()->route("admin.language.index")->with(['status'=>'Başarılı', 'msg'=> 'Öğe silindi','type'=>'bg-success']);
            }else{
                return redirect()->route("admin.language.index")->with(['status'=>'Başarısız', 'msg'=> 'Öğe silinimedi','type'=>'bg-danger']);
            }

        }else{
            return redirect()->route("admin.language.index")->with(['status'=>'Başarısız', 'msg'=> 'Öğe mevcut değil','type'=>'bg-danger']);
        }
    }
    public  function  edit($id){
        $w =Language::where("id",$id)->get();
        return view("back.languageedit",["data"=>$w]);
    }

    public  function  put(Request $request){
        $id=$request->route('id');
        $all= $request->except("_token");
        $request->validate([
            'description'=>'required',
            'image' => 'image|mimes:jpg,png,jpeg,gif,webp,svg|max:3048',
        ],[
            'image.required'=>'Görsel alanı gerekli',
            'image.image'=>'Görsel yükleyiniz',
            'image.max'=>'Görsel boyutu 3Mb\'den küçük olmalıdır',
            'image.mimes'=>'Görsel dosya biçimi jpg, png, jpeg, gif, svg olmalıdır',
            'description.required'=>'İçerik alanı gerekli',
        ]);
        $w =Language::where("id",$id)->get();
        $all["image"]= imageUpload::singleUploadUpdate("diller",$request->file("image"),$w,"image",763,569);
        $all["slug"]=mHelper::slug($all["title"]);
        $update=Language::where("id",$id)->update($all);
        if($update){
            return redirect()->back()->with(['status'=>'Başarılı', 'msg'=> 'Öğe Güncellendi','type'=>'bg-success']);
        }

    }

    public  function  deleteall(Request $request){
        $ids = $request->ids;
        $data= Language::whereIn('id',$ids)->get();
        foreach ($data as $row ){
            imageUpload::delete("diller", $row["image"]);
        }
        Language::whereIn('id',$ids)->delete();
        return response(['status'=>'Başarılı', 'msg'=> 'Öğe Silindi','type'=>'bg-success']);
    }

}
