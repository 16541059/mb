<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use File;
use App\Helper\imageUpload;

class AboutController extends Controller
{
    public function index()
    {

        $w = About::where("id", 1)->count();
        if ($w) {
            $w = About::where("id", 1)->get();
            return view("back.about", ["data" => $w[0]]);
        } else {
            $data = ["id" => 1, "logo" => "", "image" => "", "about" => "", "name" => "", "sosial" => ""];
            return view("back.about", ["data" => $data]);
        }
    }

    public function put(Request $request)
    {

        $request->validate([
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:3048',
            'logo' => 'image|mimes:jpg,png,jpeg,gif,svg|max:3048',
            'about' => "required",
        ],
            [
                'about.required' => 'İçerik Alanı Boş bırakılamaz'
            ]

        );

        $all["sosial"] = json_encode([
            "adres" => $request->get("adres"),
            "tel" => $request->get("tel"),
            "mail" => $request->get("mail"),
            "site" => $request->get("site"),
            "day" => $request->get("day"),
            "time" => $request->get("time"),
            "maps" => $request->get("maps"),
            "video" => $request->get("video"),
            "facebook" => $request->get("facebook"),
            "instagram" => $request->get("instagram"),
            "twitter" => $request->get("twitter"),
            "whatsapp" => $request->get("whatsapp"),
            "youtube" => $request->get("youtube"),
            "telegram" => $request->get("telegram"),
            "linkedin" => $request->get("linkedin"),
        ]);
        $id = $request->route('id');
        $w = About::where("id", $id)->count();
        if ($w) {
            $w = About::where("id", $id)->get();
            $all["name"] = $request->get("name");
            $all["about"] = $request->get("about");
            $all["logo"] = imageUpload::singleUploadUpdate("about", $request->file("logo"), $w, "logo", 220, 80);
            $all["image"] = imageUpload::singleUploadUpdate("about", $request->file("image"), $w, "image");
            About::where("id", $id)->update($all);
            return redirect()->back()->with(['status' => 'Başarılı', 'msg' => 'Hakkımıza Güncellendi', 'type' => 'bg-success']);
        } else {
            $all["id"] = 1;
            $all["name"] = $request->get("name");
            $all["about"] = $request->get("about");
            $all["logo"] = imageUpload::singleUpload("about", $request->file("logo"), 220, 80);
            $all["image"] = imageUpload::singleUpload("about", $request->file("image"));
            About::create($all);
            return redirect()->back()->with(['status' => 'Başarılı', 'msg' => 'Hakkımızda Eklendi', 'type' => 'bg-success']);

        }


    }


}
