<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Refrans;
use App\Models\Whyus;
use Illuminate\Http\Request;

class WhyusController extends Controller
{
    public  function  index(){

       $data= Whyus::all();
        return view("front.page.whyus",["data"=>$data]);
    }

}
