<?php

namespace App\Http\Controllers\Back;

use App\Helper\imageUpload;
use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Popup;
use Illuminate\Http\Request;

class PopupController extends Controller
{
    public function index()
    {

        $w = Popup::where("id", 1)->count();
        if ($w) {
            $w = Popup::where("id", 1)->get();
            return view("back.popup", ["data" => $w[0]]);
        } else {
            $data = ["id" => 1, "image" => "", "link" => "", "active" => "", "oneshow" => ""];
            return view("back.popup", ["data" => $data]);
        }
    }

    public function put(Request $request)
    {
        $all=$request->except("_token");
        $request->validate([
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:3048',
        ],
            [
                'image.image' => 'Görsel yükleyiniz',
            ]
        );

        $id = $request->route('id');
        $all["active"]=$request->has("active");
        $all["oneshow"]=$request->has("oneshow");
        $w = Popup::where("id", $id)->count();
        if ($w) {
            $w = Popup::where("id", $id)->get();
            $all["image"] = imageUpload::singleUploadUpdate("diger", $request->file("image"), $w, "image");
            Popup::where("id", $id)->update($all);
            return redirect()->back()->with(['status' => 'Başarılı', 'msg' => 'Popup Güncellendi', 'type' => 'bg-success']);
        } else {
            $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:3048',
            ],
                [
                    'image.image' => 'Görsel yükleyiniz',
                    'image.required' => 'Görsel yükleyiniz',
                ]
            );
            $all["id"] = 1;

            $all["image"] = imageUpload::singleUpload("diger", $request->file("image"));
            Popup::create($all);
            return redirect()->back()->with(['status' => 'Başarılı', 'msg' => 'Popup Eklendi', 'type' => 'bg-success']);

        }


    }


}
