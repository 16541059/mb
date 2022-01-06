<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Foto;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public  function index(){
        $data =Video::all();
        return view("front.page.video",["data"=>$data]);
    }
}
