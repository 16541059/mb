<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Examresult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public  function  index(){
        $user =Auth::user()["id"];
        $totalexam= Examresult::where("user_id",$user)->count();
        $resultexam= Examresult::where("user_id",$user)->where("active",1)->count();
        $data= Examresult::where("user_id",$user)->where("active",1)->with("exam")->get();
        $avg= Examresult::where("user_id",$user)->where("active",1)->avg("point");
        return view("user.dashboard",["totalexam"=>$totalexam,"resultexam"=>$resultexam,"avg"=>$avg,"data"=>$data]);
    }
}
