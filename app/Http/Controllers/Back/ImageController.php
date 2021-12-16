<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Foto;
use App\Helper\imageUpload;
use Illuminate\Http\Request;
use File;
class ImageController extends Controller
{
    public  function  index(){
        $data= Foto::all();
        return view("back.image",["data"=>$data]);
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
        $all["image"]= imageUpload::singleUpload("foto",$request->file("file"));
     //   $all["name"]=$request->file("file")->getClientOriginalName();
        $w=Foto::create($all);
        return response(['status'=>'Başarılı', 'msg'=> 'Görsel  Eklendi','type'=>'bg-success']);
    }

    public  function  delete($id){
        $w= Foto::where("id","=",$id)->count();
        if($w){
            $data =Foto::where("id","=",$id)->get();

            $dltname= (explode("/",$data[0]["image"]));
            File::delete(public_path()."/images/foto/".end($dltname));
            $w= Foto::where("id","=",$id)->delete();
            if($w){
                return redirect()->route("admin.image.index")->with(['status'=>'Başarılı', 'msg'=> 'Öğe silindi','type'=>'bg-success']);
            }else{
                return redirect()->route("admin.image.index")->with(['status'=>'Başarısız', 'msg'=> 'Öğe silinimedi','type'=>'bg-danger']);
            }

        }else{
            return redirect()->route("admin.image.index")->with(['status'=>'Başarısız', 'msg'=> 'Öğe mevcut değil','type'=>'bg-danger']);
        }
    }

    public  function  deleteall(Request $request){
        $ids = $request->ids;
        $data= Foto::whereIn('id',$ids)->get();
        foreach ($data as $row ){
            imageUpload::delete("foto", $row["image"]);
        }
        Foto::whereIn('id',$ids)->delete();
        return response(['status'=>'Başarılı', 'msg'=> 'Öğe Silindi','type'=>'bg-success']);
    }

}
