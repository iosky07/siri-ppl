<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index(){

//        dd($some);
        return view('dashboard');
    }
}
