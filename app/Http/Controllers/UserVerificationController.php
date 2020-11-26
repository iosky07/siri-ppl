<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserVerificationController extends Controller
{
    public function index ()
    {
        return view('pages.user.user-verification.index', [
            'user' => User::class
        ]);
    }
    public function show($id){
        $users = DB::table('users')
            ->where('id', '=', $id)
            ->get();
        return view('pages.user.user-verification.show', ['users' => $users]);
    }
}
