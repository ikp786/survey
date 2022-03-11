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

    function contactus(){

        $title = 'Contact Us';
        $data  =  compact('title');
        return view('front.contact',$data);
    }

    function termCondition(){ 

        $title = 'Contact Us';
        $data  =  compact('title');
        return view('front.term-condition',$data);
    }
    function howWorks(){

        $title = 'how-works';
        $data  =  compact('title');
        return view('front.how-works',$data);
    }
    function whoWeAre(){

        $title = 'who-we-are';
        $data  =  compact('title');
        return view('front.who-we-are',$data);
    }
}
