<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Refrans;
use Illuminate\Http\Request;

class RefransController extends Controller
{
    public  function index(){
        $data =Refrans::all();
        return view("front.page.refrans",["data"=>$data]);
    }
}
