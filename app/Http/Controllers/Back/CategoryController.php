<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Helper\imageUpload;
use App\Helper\mHelper;
use Carbon\Carbon;
use Auth;
use File;
class CategoryController extends Controller
{
    public  function  index(){
        $parentCategories= Category::with("subcategory")->get();
        return view('back.category',["category"=>$parentCategories]);

    }

    public  function  add(){

        $data= Category::where('parent_id',0)->pluck("name","id")->toArray();
        return view("back.egitimadd",["category"=>$data]);
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
        $all["image"]= imageUpload::singleUpload("egitim",$request->file("image"),800,580);
        $all["slug"]=mHelper::slug($all["name"]);
        $w=Category::create($all);
        return redirect()->back()->with(['status'=>'Başarılı', 'msg'=> 'Öğe Eklendi','type'=>'bg-success']);
    }

    public  function  delete($id){
        $w= Category::where("id","=",$id)->count();
        if($w){
            $data =Category::where("id","=",$id)->get();

            $dltname= (explode("/",$data[0]["image"]));
            File::delete(public_path()."/images/egitim/".end($dltname));
            Category::where("parent_id",$id)->delete();
            $w= Category::where("id","=",$id)->delete();
            if($w){
                return redirect()->route("admin.egitim.index")->with(['status'=>'Başarılı', 'msg'=> 'Öğe silindi','type'=>'bg-success']);
            }else{
                return redirect()->route("admin.egitim.index")->with(['status'=>'Başarısız', 'msg'=> 'Öğe silinimedi','type'=>'bg-danger']);
            }

        }else{
            return redirect()->route("admin.egitim.index")->with(['status'=>'Başarısız', 'msg'=> 'Öğe mevcut değil','type'=>'bg-danger']);
        }
    }
    public  function  edit($id){
        $w =Category::where("id",$id)->get();
        $data= Category::where('parent_id',0)->pluck("name","id")->toArray();
        return view("back.egitimedit",["category"=>$data,"data"=>$w]);
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
        $w =Category::where("id",$id)->get();
        $all["image"]= imageUpload::singleUploadUpdate("egitim",$request->file("image"),$w,"image",800,580);
        $all["slug"]=mHelper::slug($all["name"]);
        $update=Category::where("id",$id)->update($all);
        if($update){
            return redirect()->back()->with(['status'=>'Başarılı', 'msg'=> 'Öğe Güncellendi','type'=>'bg-success']);
        }

    }

    public  function  deleteall(Request $request){
        $ids = $request->ids;
        $data= Category::whereIn('id',$ids)->get();
        Category::whereIn("parent_id",$ids)->delete();
        foreach ($data as $row ){
            imageUpload::delete("egitim", $row["image"]);
        }
        Category::whereIn('id',$ids)->delete();
        return response(['status'=>'Başarılı', 'msg'=> 'Öğe Silindi','type'=>'bg-success']);
    }

}
