<?php

namespace App\Http\Controllers\Back;

use App\Helper\imageUpload;
use App\Helper\mHelper;
use App\Http\Controllers\Controller;
use App\Models\Campaign;
use File;
use Illuminate\Http\Request;

class CampaingController extends Controller
{
    //
    public function index()
    {
        return view("back.compaing", ["data" => Campaign::all()]);
    }

    public function add()
    {
        return view('back.compaingadd');
    }

    public function post(Request $request)
    {
        $all = $request->except("_token");
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,webp,svg|max:3048',
        ], [
            'image.required' => 'Görsel alanı gerekli',
            'image.image' => 'Görsel yükleyiniz',
            'image.max' => 'Görsel boyutu 3Mb\'den küçük olmalıdır',
            'image.mimes' => 'Görsel dosya biçimi jpg, png, jpeg, gif, svg olmalıdır',
            'title.required' => 'Başlık alanı gerekli',
        ]);
        $all["slug"]=mHelper::slug($all["title"]);
        $all["image"] = imageUpload::singleUpload("campaing", $request->file("image"), 860, 500);
        $w = Campaign::create($all);
        return redirect()->back()->with(['status' => 'Başarılı', 'msg' => 'Kampanya Eklendi', 'type' => 'bg-success']);
    }


    public function delete($id)
    {
        $w = Campaign::where("id", "=", $id)->count();
        if ($w) {
            $data = Campaign::where("id", "=", $id)->get();

            $dltname = (explode("/", $data[0]["image"]));
            File::delete(public_path() . "/images/campaing/" . end($dltname));
            $w = Campaign::where("id", "=", $id)->delete();
            if ($w) {
                return redirect()->route("admin.campaing.index")->with(['status' => 'Başarılı', 'msg' => 'Öğe silindi', 'type' => 'bg-success']);
            } else {
                return redirect()->route("admin.campaing.index")->with(['status' => 'Başarısız', 'msg' => 'Öğe silinimedi', 'type' => 'bg-danger']);
            }

        } else {
            return redirect()->route("admin.campaing.index")->with(['status' => 'Başarısız', 'msg' => 'Öğe mevcut değil', 'type' => 'bg-danger']);
        }
    }

    public  function  edit($id){
        $w=Campaign::where("id",$id)->count();
        if($w){
            $w=Campaign::where("id",$id)->get();
            return view("back.campaingedit",["data"=>$w]);
        }else{
            return redirect()->route("admin.campaing.index")->with(['status'=>'Başarısız', 'msg'=> 'Öğe mevcut değil','type'=>'bg-danger']);
        }

    }
    public  function  put(Request  $request){
        $id=$request->route('id');
        $all= $request->except("_token");
        $request->validate([
            'image' => 'image|mimes:jpg,png,jpeg,gif,webp,svg|max:3048',
        ],[

            'image.image'=>'Görsel yükleyiniz',
            'image.max'=>'Görsel boyutu 3Mb\'den küçük olmalıdır',
            'image.mimes'=>'Görsel dosya biçimi jpg, png, jpeg, gif, svg olmalıdır',

        ]);
        $w =Campaign::where("id",$id)->get();
        $all["slug"]=mHelper::slug($all["title"]);
        $all["image"]= imageUpload::singleUploadUpdate("campaing",$request->file("image"),$w,"image",860,500);
        $update=Campaign::where("id",$id)->update($all);
        if($update){
            return redirect()->back()->with(['status'=>'Başarılı', 'msg'=> 'Öğe Güncellendi','type'=>'bg-success']);
        }
    }

    public  function  deleteall(Request $request){
        $ids = $request->ids;
        $data= Campaign::whereIn('id',$ids)->get();
        foreach ($data as $row ){
            imageUpload::delete("campaing", $row["images"]);
        }
        Campaign::whereIn('id',$ids)->delete();
        return response(['status'=>'Başarılı', 'msg'=> 'Öğe Silindi','type'=>'bg-success']);
    }
}
