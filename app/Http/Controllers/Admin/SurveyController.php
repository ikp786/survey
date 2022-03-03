<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Survey;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function userList()
    {
        $users = Survey::select('id','email','user_type','created_at')->get();
        $title = 'Users List';
        $data  = compact('title','users');
        return view('admin.users.index',$data);
    }
}
