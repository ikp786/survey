<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';
        $data  = compact('title');
        return view('admin.dashboard', $data);
    }

    function logout()
    {
        Auth::logout();
        return redirect('admin')->with('Success', 'logout success');
    }
}