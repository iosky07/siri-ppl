<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegionMapController extends Controller
{
    public function index ()
    {
        return view('pages.region-map.index', [
            'region' => Region::class
        ]);
    }
    public function show($id){
        $regions = DB::table('regions')
            ->where('id', '=', $id)
            ->get();
        return view('pages.region-map.show', ['regions' => $regions]);
    }
}
