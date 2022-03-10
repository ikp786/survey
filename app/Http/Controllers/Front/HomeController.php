<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $title = 'Home Page';
        $data  = compact('title');
        return view('front.index',$data);
    }

    public function thanks()
    {
        $title   ='Thanks you';
        $data    = compact('title');
        return view('front.thanks',$data);
    }
}
