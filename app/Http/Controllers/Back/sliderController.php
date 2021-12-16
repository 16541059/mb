<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Helper\imageUpload;
use App\Helper\mHelper;
use Carbon\Carbon;
use Auth;
use File;
class sliderController extends Controller
{
    public  function  index(){
        $data= Slider::all();
        return view('back.slider',["slider"=>$data]);
    }

    public  function  add(){
        return view('back.slideradd');
    }

    public  function  delete($id){
        $w= Slider::where("id","=",$id)->count();
        if($w){
            $data =Slider::where("id","=",$id)->get();

            $dltname= (explode("/",$data[0]["images"]));
            File::delete(public_path()."/images/slider/".end($dltname));
            $w= Slider::where("id","=",$id)->delete();
            if($w){
                return redirect()->route("admin.slider.index")->with(['status'=>'Başarılı', 'msg'=> 'Öğe silindi','type'=>'bg-success']);
            }else{
                return redirect()->route("admin.slider.index")->with(['status'=>'Başarısız', 'msg'=> 'Öğe silinimedi','type'=>'bg-danger']);
            }

        }else{
            return redirect()->route("admin.slider.index")->with(['status'=>'Başarısız', 'msg'=> 'Öğe mevcut değil','type'=>'bg-danger']);
        }
    }

    public  function  change($id){
        $w= Slider::where("id","=",$id)->count();
        if($w){
            $data =Slider::where("id","=",$id)->get();

            $w= Slider::where("id","=",$id)->update(["active"=> !$data[0]["active"]]);
            if($w){
                return redirect()->route("admin.slider.index")->with(['status'=>'Başarılı', 'msg'=> 'Öğe Güncellendi','type'=>'bg-success']);
            }else{
                return redirect()->route("admin.slider.index")->with(['status'=>'Başarısız', 'msg'=> 'Öğe Güncellendi','type'=>'bg-danger']);
            }

        }else{
            return redirect()->route("admin.slider.index")->with(['status'=>'Başarısız', 'msg'=> 'Öğe mevcut değil','type'=>'bg-danger']);
        }

    }

    public  function  post(Request  $request){
        $all= $request->except("_token");
        $request->validate([
            'name'=>'required',
            'title'=>'required',
            'images' => 'required|image|mimes:jpg,png,jpeg,gif,webp,svg|max:3048',
        ],[
            'images.required'=>'Görsel alanı gerekli',
            'images.image'=>'Görsel yükleyiniz',
            'images.max'=>'Görsel boyutu 3Mb\'den küçük olmalıdır',
            'images.mimes'=>'Görsel dosya biçimi jpg, png, jpeg, gif, svg olmalıdır',
            'name.required'=>'İsim alanı gerekli',
            'title.required'=>'Başlık alanı gerekli',
        ]);
        $all["images"]= imageUpload::singleUpload("slider",$request->file("images"),1920,1000);
        $w=Slider::create($all);
        return redirect()->back()->with(['status'=>'Başarılı', 'msg'=> 'Slider Eklendi','type'=>'bg-success']);
    }

    public  function  edit($id){
        $w=Slider::where("id",$id)->count();
        if($w){
            $w=Slider::where("id",$id)->get();
            return view("back.slideredit",["data"=>$w]);
        }else{
            return redirect()->route("admin.silder.index")->with(['status'=>'Başarısız', 'msg'=> 'Öğe mevcut değil','type'=>'bg-danger']);
        }

    }

    public  function  put(Request  $request){
        $id=$request->route('id');
        $all= $request->except("_token");
        $request->validate([
            'images' => 'image|mimes:jpg,png,jpeg,gif,webp,svg|max:3048',
        ],[

            'images.image'=>'Görsel yükleyiniz',
            'images.max'=>'Görsel boyutu 3Mb\'den küçük olmalıdır',
            'images.mimes'=>'Görsel dosya biçimi jpg, png, jpeg, gif, svg olmalıdır',

        ]);
        $w =Slider::where("id",$id)->get();
        $all["images"]= imageUpload::singleUploadUpdate("slider",$request->file("images"),$w,"images",1920,1000);
        $update=Slider::where("id",$id)->update($all);
        if($update){
            return redirect()->back()->with(['status'=>'Başarılı', 'msg'=> 'Öğe Güncellendi','type'=>'bg-success']);
        }
    }

    public  function  deleteall(Request $request){
        $ids = $request->ids;
        $data= Slider::whereIn('id',$ids)->get();
        foreach ($data as $row ){
            imageUpload::delete("slider", $row["images"]);
        }
        Slider::whereIn('id',$ids)->delete();
        return response(['status'=>'Başarılı', 'msg'=> 'Öğe Silindi','type'=>'bg-success']);
    }

}
