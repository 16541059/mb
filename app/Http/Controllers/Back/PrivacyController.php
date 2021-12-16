<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Privacy;
use Illuminate\Http\Request;

class PrivacyController extends Controller
{
    public  function  index(){
        $w = Privacy::where("id", 1)->count();
        if ($w) {
            $w =  Privacy::where("id", 1)->get();
            return view("back.privacy", ["data" => $w[0]]);
        } else {
            $data = ["id" => 1, "kvkk" => "", "cerez" => "", "gizlilik" => ""];
            return view("back.privacy", ["data" => $data]);
        }
    }

    public  function  put(Request $request){
        $all = $request->except("_token");
        $id = $request->route('id');
        $w = Privacy::where("id", $id)->count();
        if ($w) {
            Privacy::where("id", $id)->update($all);
            return redirect()->back()->with(['status' => 'Başarılı', 'msg' => 'Politikalar Güncellendi', 'type' => 'bg-success']);
        } else {
            $all["id"] = 1;
            Privacy::create($all);
            return redirect()->back()->with(['status' => 'Başarılı', 'msg' => 'Politikalar Eklendi', 'type' => 'bg-success']);

        }
    }
}
