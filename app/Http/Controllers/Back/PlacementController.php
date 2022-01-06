<?php

namespace App\Http\Controllers\Back;

use App\Helper\imageUpload;
use App\Http\Controllers\Controller;
use App\Models\Placement;
use Illuminate\Http\Request;
use File;
class PlacementController extends Controller
{
    //
    public  function  index(){
        return view("back.placement",["data"=> Placement::all()]);
    }
    public  function  add(){
        return view('back.placementadd');
    }
    public  function  post(Request  $request){
        $all = $request->except("_token");
        $request->validate([

            'answera' => 'required',
            'question' => 'required',
            'answerb' => 'required',
            'answerc' => 'required',
            'answerd' => 'required',
            'correct' => 'required',
            'image' => 'image|mimes:jpg,png,jpeg,gif,webp,svg|max:3048',
        ], [
            'image.image' => 'Görsel yükleyiniz',
            'answera.required' => 'A şıkkı Boş Bırakılımaz',
            'answerb.required' => 'B şıkkı Boş Bırakılımaz',
            'answerc.required' => 'C şıkkı Boş Bırakılımaz',
            'answerd.required' => 'D şıkkı Boş Bırakılımaz',
            'question.required' => 'Soru Boş Bırakılımaz',
            'correct.required' => 'Doğru Cevapı Seçiniz',
            'image.max' => 'Görsel boyutu 3Mb\'den küçük olmalıdır',
            'image.mimes' => 'Görsel dosya biçimi jpg, png, jpeg, gif, svg olmalıdır',

        ]);
        $all["image"] = imageUpload::singleUpload("placement", $request->file("image"), 800, 600);
        $w = Placement::create($all);
        return redirect()->back()->with(['status' => 'Başarılı', 'msg' => 'Kampanya Eklendi', 'type' => 'bg-success']);
    }
    public  function  edit($id){
        $w=Placement::where("id",$id)->count();
        if($w){
            $w=Placement::where("id",$id)->get();
            return view("back.placementedit",["data"=>$w]);
        }else{
            return redirect()->route("admin.seviyesinav.index")->with(['status'=>'Başarısız', 'msg'=> 'Öğe mevcut değil','type'=>'bg-danger']);
        }

    }

    public function delete($id)
    {
        $w = Placement::where("id", "=", $id)->count();
        if ($w) {
            $data = Placement::where("id", "=", $id)->get();

            $dltname = (explode("/", $data[0]["image"]));
            File::delete(public_path() . "/images/placement/" . end($dltname));
            $w = Placement::where("id", "=", $id)->delete();
            if ($w) {
                return redirect()->route("admin.seviyesinav.index")->with(['status' => 'Başarılı', 'msg' => 'Öğe silindi', 'type' => 'bg-success']);
            } else {
                return redirect()->route("admin.seviyesinav.index")->with(['status' => 'Başarısız', 'msg' => 'Öğe silinimedi', 'type' => 'bg-danger']);
            }

        } else {
            return redirect()->route("admin.seviyesinav.index")->with(['status' => 'Başarısız', 'msg' => 'Öğe mevcut değil', 'type' => 'bg-danger']);
        }
    }

    public  function  put(Request  $request){
        $id=$request->route('id');
        $all= $request->except("_token");
        $request->validate([

            'answera' => 'required',
            'question' => 'required',
            'answerb' => 'required',
            'answerc' => 'required',
            'answerd' => 'required',
            'correct' => 'required',
            'image' => 'image|mimes:jpg,png,jpeg,gif,webp,svg|max:3048',
        ], [
            'image.image' => 'Görsel yükleyiniz',
            'answera.required' => 'A şıkkı Boş Bırakılımaz',
            'answerb.required' => 'B şıkkı Boş Bırakılımaz',
            'answerc.required' => 'C şıkkı Boş Bırakılımaz',
            'answerd.required' => 'D şıkkı Boş Bırakılımaz',
            'question.required' => 'Soru Boş Bırakılımaz',
            'correct.required' => 'Doğru Cevapı Seçiniz',
            'image.max' => 'Görsel boyutu 3Mb\'den küçük olmalıdır',
            'image.mimes' => 'Görsel dosya biçimi jpg, png, jpeg, gif, svg olmalıdır',

        ]);
        $w =Placement::where("id",$id)->get();
        $all["image"]= imageUpload::singleUploadUpdate("placement",$request->file("image"),$w,"image",800,600);
        $update=Placement::where("id",$id)->update($all);
        if($update){
            return redirect()->back()->with(['status'=>'Başarılı', 'msg'=> 'Öğe Güncellendi','type'=>'bg-success']);
        }
    }

    public  function  deleteall(Request $request){
        $ids = $request->ids;
        $data= Placement::whereIn('id',$ids)->get();
        foreach ($data as $row ){
            imageUpload::delete("placement", $row["images"]);
        }
        Placement::whereIn('id',$ids)->delete();
        return response(['status'=>'Başarılı', 'msg'=> 'Öğe Silindi','type'=>'bg-success']);
    }
}
