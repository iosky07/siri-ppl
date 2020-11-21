<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function index ()
    {
        return view('pages.blog.index', [
            'blog' => Blog::class
        ]);
    }
    public function create(){
        return view("pages.blog.create");
    }
    public function edit($id){
        return view('pages.blog.edit');
    }
    public function show($id){
        $blogs = DB::table('blogs')
            ->where('id', '=', $id)
            ->get();
        return view('pages.blog.show', ['blogs' => $blogs]);
    }
}
