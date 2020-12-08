<?php

namespace App\Http\Controllers;

use App\Models\Map;
use App\Models\Region;
use App\Models\Terrace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegionTerraceController extends Controller
{
    public function index ()
    {
        return view('pages.region-terrace.index', [
            'terrace' => Terrace::class
        ]);
    }
    public function create(){
        return view("pages.region-terrace.create");
    }
    public function edit($id){
        return view('pages.region-terrace.edit');
    }
    public function show($id){
        $map = Map::findOrFail($id);
        return view('pages.region-terrace.show', compact('map'));
    }
}
