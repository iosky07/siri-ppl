<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IrrigationDashboard extends Controller
{
    public function index ()
    {
        return view('dashboard', [
            'dashboard' => IrrigationDashboard::class
        ]);
    }
}
