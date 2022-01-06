<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public  function  index(){
        $datetime = Carbon::now('Europe/Istanbul');
    $data=  Registration::orderBY("updated_at","Desc")->get();
     return view("back.registration",["data"=>$data,"datetime"=>$datetime]);
    }

    public  function  detail($id){
       $data= Registration::where("id",$id)->get();
       return view("back.registrationdetail",["data"=>$data]);
    }
    public function delete($id)
    {
        $w = Registration::where("id", "=", $id)->count();
        if ($w) {

            $w = Registration::where("id", "=", $id)->delete();
            if ($w) {
                return redirect()->route("admin.onkayit.index")->with(['status' => 'Başarılı', 'msg' => 'Öğe silindi', 'type' => 'bg-success']);
            } else {
                return redirect()->route("admin.onkayit.index")->with(['status' => 'Başarısız', 'msg' => 'Öğe silinimedi', 'type' => 'bg-danger']);
            }

        } else {
            return redirect()->route("admin.onkayit.index")->with(['status' => 'Başarısız', 'msg' => 'Öğe mevcut değil', 'type' => 'bg-danger']);
        }
    }

    public  function  deleteall(Request $request){
        $ids = $request->ids;
        Registration::whereIn('id',$ids)->delete();
        return response(['status'=>'Başarılı', 'msg'=> 'Öğe Silindi','type'=>'bg-success']);
    }

    public  function  post(Request  $request){
        $id=$request->id;
        $data= Registration::where("id",$id)->get();
        return view("back.registrationdetail",["data"=>$data]);
    }

}
