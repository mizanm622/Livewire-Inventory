<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //home page view
    public function index()
    {
        $role = auth()->user()->role;
        if($role == 1){
            return view('admin.home');
        }
        else
        {
            return view('dashboard');
        }

    }
}
