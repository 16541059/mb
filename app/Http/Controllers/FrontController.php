<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        return view ('front.index');
    }

    public function about()
    {
        return view('front.pages.about');
    }

    public function brands()
    {
        return view('front.pages.brands');
    }

    public function franchise()
    {
        return view ('front.pages.franchise');
    }
    public function contact()
    {
        return view('front.pages.contact');
    }
}
