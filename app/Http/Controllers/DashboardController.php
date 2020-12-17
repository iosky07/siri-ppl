<?php

namespace App\Http\Controllers;

use App\Models\Map;
use App\Models\Terrace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index(){
//        $id = Map::whereUserId(Auth::id())->get('id');
////        $mapId = Map::whereUserId(Auth::id())->get('id');
////        dd($mapId);
//        $terraces = Terrace::whereUserId(Auth::id())->get();
////        dd($terraces);
        return view('dashboard');
    }
}
