<?php

namespace App\Http\Controllers\Back;

use App\Helper\imageUpload;
use App\Helper\mHelper;
use App\Http\Controllers\Controller;
use App\Models\Exam;
use Carbon\Carbon;
use Illuminate\Http\Request;
use \Illuminate\Support\Str;
use Form;

class ExamController extends Controller
{
    public function index()
    {
        $datetime = Carbon::now('Europe/Istanbul');
        return view("back.exam", ["data" => Exam::orderBy("updated_at","DESC")->get(),"datetime"=>$datetime]);
    }

    public function add()
    {
        return view("back.examadd");
    }

    public function post(Request $request)
    {

        $arr = [];
        foreach ($request->get("question") as $key=>$row){
            $arr[] = array(
                "image" => !empty($request->file("image")[$key]) ? imageUpload::singleUpload("exam", $request->file("image")[$key],800,600) : "",
                "question_" . $key . "" => $request->get("question")[$key],
                "answera_" . $key . "" => $request->get("answera")[$key],
                "answerb_" . $key . "" => $request->get("answerb")[$key],
                "answerc_" . $key . "" => $request->get("answerc")[$key],
                "answerd_" . $key . "" => $request->get("answerd")[$key],
            );
        }

        $all["name"] = $request->get("name");
        $all["slug"] = mHelper::slug($request->get("name")) ;
        $all["date"] = $request->get("date");
        $all["time"] = $request->get("time");
        $all["level"] = $request->get("level");
        $all["max"] = $request->get("max");
        $all["question"] = json_encode($arr);
        Exam::create($all);
        return redirect()->back()->with(['status' => 'Başarılı', 'msg' => 'Öğe Eklendi', 'type' => 'bg-success']);

    }


    public function edit($id)
    {
        $w = Exam::where("id", $id)->count();
        if ($w) {
            $datetime = Carbon::now('Europe/Istanbul');
            $w = Exam::where("id", $id)->get();

            return view("back.examedit", ["data" => $w,"datetime"=>$datetime]);
        } else {
            return redirect()->back();
        }
    }

    public function put(Request $request)
    {
        $id= $request->route("id");
        $arr = [];
        $w=Exam::where("id",$id)->get();
        $w= json_decode($w[0]["question"]);
        foreach ($request->get("question") as $key=>$row){
            $arr[] = array(

                  "image" =>  !empty($request->file("image")[$key]) ?  imageUpload::singleUploadUpdatejson("exam",$request->file("image")[$key], !empty($w[$key]->image)?$w[$key]->image: "",800,600):(!empty($w[$key]->image)?$w[$key]->image: "" ) ,
                "question_" . $key . "" => $request->get("question")[$key],
                "answera_" . $key . "" => $request->get("answera")[$key],
                "answerb_" . $key . "" => $request->get("answerb")[$key],
                "answerc_" . $key . "" => $request->get("answerc")[$key],
                "answerd_" . $key . "" => $request->get("answerd")[$key],
            );
        }
        $all["name"] = $request->get("name");
        $all["slug"] = mHelper::slug($request->get("name")) ;
        $all["date"] = $request->get("date");
        $all["time"] = $request->get("time");
        $all["max"] = $request->get("max");
        $all["level"] = $request->get("level");
        $all["question"] = json_encode($arr);
    //    dd($arr);
        Exam::where("id",$id)->update($all);
        return redirect()->back()->with(['status' => 'Başarılı', 'msg' => 'Öğe Güncellendin', 'type' => 'bg-success']);
    }

    public function delete($id)
    {
        $w = Exam::where("id", "=", $id)->count();
        if ($w) {
            $w = Exam::where("id", "=", $id)->delete();
            if ($w) {
                return redirect()->route("admin.exam.index")->with(['status' => 'Başarılı', 'msg' => 'Öğe silindi', 'type' => 'bg-success']);
            } else {
                return redirect()->route("admin.exam.index")->with(['status' => 'Başarısız', 'msg' => 'Öğe silinimedi', 'type' => 'bg-danger']);
            }

        } else {
            return redirect()->route("admin.exam.index")->with(['status' => 'Başarısız', 'msg' => 'Öğe mevcut değil', 'type' => 'bg-danger']);
        }
    }

    public function deleteall(Request $request)
    {

        $ids = $request->ids;
        Exam::whereIn('id', $ids)->delete();
        return response(['status' => 'Başarılı', 'msg' => 'Öğe Silindi', 'type' => 'bg-success']);
    }

    public function total(Request $request)
    {
        $val = $request->get("value");
        $i = $request->get("i");
        $val = $i + $val;
        $html = "";
        for ($i; $i < $val; $i++) {
            $html .= ('<div class="callout callout-success">
                        <div class="d-flex justify-content-between bd-highlight mb-3">
                             <div class="p-2 bd-highlight"> ' . ($i + 1) . ')Soru</div>
                            <div class="p-2 bd-highlight"> <button type="button"  onclick="($(this).parent(\'div\').parent(\'div\').parent(\'div\').remove())" class="btn btn-danger" > <i class="fa fa-trash"></i> Sil</button> </div>
                           </div>
                        <div class="form-group">
                            <label for="exampleInputFile">' . Form::label("image", "Görsel") . '</label>
                            ' . Form::file("image[$i]", ["class" => "form-control"]) . '
                            <span style="color:red;">İsteğe Bağlı</span>
                        </div>
                        <div class="form-group">
                            ' . Form::label("question[$i]", "Soru") . '
                            ' . Form::textarea("question[$i]", old("question[$i]"), ["class" => "form-control summernote", "id" => "summernote", "required"]) . '
                        </div>
                        <div class="form-group row ">
                            ' . Form::label("a", "Doğru Cevap:", ["class" => "col-form-label"]) . '
                            ' . Form::text("answera[$i]", old("answera[$i]"), ["class" => "form-control ", "required", "id" => "a"]) . '
                        </div>
                        <div class="form-group row ">
                            ' . Form::label("b", "Yanlış Cevap:", ["class" => "col-form-label"]) . '
                            ' . Form::text("answerb[$i]", old("answerb[$i]"), ["class" => "form-control ", "required", "id" => "b"]) . '
                        </div>
                        <div class="form-group row ">
                            ' . Form::label("answerc[$i]", "Yanlış Cevap:", ["class" => "col-form-label"]) . '
                            ' . Form::text("answerc[$i]", old("answerc[$i]"), ["class" => "form-control ", "required", "id" => "c"]) . '
                        </div>
                        <div class="form-group row ">
                            ' . Form::label("answerd[$i]", "Yanlış Cevap:", ["class" => "col-form-label"]) . '
                            ' . Form::text("answerd[$i]", old("answerd[$i]"), ["class" => "form-control ", "required", "id" => "d"]) . '
                        </div>
                    </div>
            ');
        }
        return $html;
    }

}
