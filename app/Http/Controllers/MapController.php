<?php

namespace App\Http\Controllers;

use App\Models\Map;
use App\Models\Terrace;
use Illuminate\Http\Request;

class MapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.map.index', [
            'map' => Map::class
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.map.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $map = Map::findOrFail($id);
        return view('pages.map.show', compact('map'));
    }

    public function createTerrace($id){
//        dd(id);
        return view('pages.region-terrace.create',compact('id'));
    }

    public function editTerrace($id) {
//        dd($id);
        return view('pages.region-terrace.edit', compact('id'));
    }

    public function deleteTerrace($id) {
        $data = Terrace::find($id);
        $data->delete();
        return back()->withInput();
    }

//    public function storeTerrace(Request $request,$id){
//        Terrace::create($request->all());
//        return redirect(route('admin.map.show',$id));
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('pages.map.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
