<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::OrderBy('created_at', 'DESC')->paginate();

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post, $slug)
    {
        // Comentamos estas líneas ya que haremos uso de una nueva funcionalidad.
        // Ver el test_post_url_with_wrong_slug_still_work()
        //abort_unless($post->slug == $slug, 404);
        //abort_if($post->slug != $slug, 404);

        if ($post->slug != $slug) {
            return redirect($post->url, 301);
        }

        return view('posts.show', compact('post'));
    }
}
