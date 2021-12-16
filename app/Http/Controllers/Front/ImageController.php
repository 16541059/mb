<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Foto;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public  function index(){
        $data =Foto::all();
        return view("front.page.image",["data"=>$data]);
    }
}
