<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Video;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ContactController extends Controller
{
    public function index()
    {
        $datetime = Carbon::now('Europe/Istanbul');
        $coutn=Contact::count();
        $w = Contact::orderBy("updated_at", "DESC")->paginate(50);
        return view("back.contact", ["data" => $w, "datetime" => $datetime,"total"=>$coutn]);
    }

    public function getmessage(Request $request)
    {
        $id = $request->get("id");
        $w = Contact::where("id", $id)->get();
        return ('<div class="card card-primary card-outline">
    <div class="card-header">
      <h3 class="card-title">Mesaj</h3>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>  </button>
    </div>
    <div class="card-body p-0">
      <div class="mailbox-read-info">
        <h6>İsim:'.$w[0]["name"].'</h6>
        <h6>Mail:' . $w[0]["email"].'</h6>
        <h6>Telefon:'.$w[0]["tel"].'</h6>
      </div>
      <div class="mailbox-read-message">
      <h5>'.$w[0]["subject"].'</h5>
      '.$w[0]["message"].'
      </div>
    </div>
  </div>');
    }

    public  function  delete($id){
        $w= Contact::where("id","=",$id)->count();
        if($w){

            $w= Contact::where("id","=",$id)->delete();
            if($w){
                return redirect()->route("admin.contact.index")->with(['status'=>'Başarılı', 'msg'=> 'Öğe silindi','type'=>'bg-success']);
            }else{
                return redirect()->route("admin.contact.index")->with(['status'=>'Başarısız', 'msg'=> 'Öğe silinimedi','type'=>'bg-danger']);
            }

        }else{
            return redirect()->route("admin.contact.index")->with(['status'=>'Başarısız', 'msg'=> 'Öğe mevcut değil','type'=>'bg-danger']);
        }
    }

    public  function  deleteall(Request $request){
        $ids = $request->ids;
        Contact::whereIn('id',$ids)->delete();
        return response(['status'=>'Başarılı', 'msg'=> 'Öğe Silindi','type'=>'bg-success']);
    }

}
