<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(10);

        return view('index', ['posts' => $posts]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:191',    
            'content' => 'required|max:255',    
        ]);
        
        $request->user()->posts()->create([
            'title' => $request->title, 
            'content' => $request->content, 
        ]);
        
        return back();
    }
    

}
