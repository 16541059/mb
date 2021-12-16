<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Contact;
use App\Models\Placement;
use App\Models\Registration;
use App\Models\ResultPlacement;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function  index(){
        $register=   Registration::orderBy("created_at","Desc")->get()->take(5);
      $contact=  Contact::orderBy("created_at","Desc")->get()->take(5);
      $placment= ResultPlacement::orderBy("created_at","Desc")->get()->take(5);
      $about =About::where("id",1)->get();
        return view("dashboard",["register"=>$register,"contact"=>$contact,"placement"=>$placment,"about"=>$about]);
    }
}
