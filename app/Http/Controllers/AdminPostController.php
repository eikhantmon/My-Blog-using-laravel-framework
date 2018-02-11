<?php

namespace App\Http\Controllers;
use App\Post;

use Illuminate\Http\Request;

class AdminPostController extends Controller
{
     public function index()
    {
    	$posts = Post::all();

    	return view('admin.posts.index', compact('posts'));
    }

    public function edit(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        if ($post->user_id != $request->user()->id) {

            return view('admin.posts.edit', compact('post'));
        }

        return abort(403, 'Unauthorized');

    }

     public function destroy(Request $request,$id)
    {
        $post = Post::findOrFail($id);

        if($post->user_id != $request->user()->id) {
            return abort(403, 'Unauthorized');
        }

        $post->delete();

        return redirect()->route('admin.posts.index');
    }

}
