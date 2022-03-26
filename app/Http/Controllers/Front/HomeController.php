<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Models\Question;
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
        $questions  = Question::all();
        $title = 'how-works';
        $data  =  compact('title','questions');
        return view('front.how-works',$data);
    }
    function whoWeAre(){

        $title = 'who-we-are';
        $data  =  compact('title');
        return view('front.who-we-are',$data);
    }

    public function storeContactUs(Request $request)
    {        
        if($request->ajax()){
            $save = ContactUs::create($request->all());
            $data  = $request->all();
            if($save->id > 0){
                \Mail::to('info@wageshare.com')->send(new \App\Mail\ContactUsMail($data));
                // \Mail::to('khanebrahim643@gmail.com')->send(new \App\Mail\ContactUsMail($data));
            return 1;
            }else{
                return  2;
            }
        }
    }
}
