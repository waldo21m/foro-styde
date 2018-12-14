<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class CreatePostController extends Controller
{
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $post = new Post($request->all());

        // Asignar el post al usuario que está conectado
        auth()->user()->posts()->save($post);

        return $post->title;
    }
}
