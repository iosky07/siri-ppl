<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index ()
    {
        return view('pages.user.index', [
            'user' => User::class
        ]);
    }
    public function create(){
        return view("pages.user.create");
    }
    public function edit($id){
        return view('pages.user.edit');
    }
    public function show($id){
        $data = User::find($id);
//        dd($users);
        return view('pages.user.show', compact('data'));
    }
}
