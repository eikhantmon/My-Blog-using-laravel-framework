<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class UserBlogController extends Controller
{
    public function blog() {

    	$blogs = Post::paginate(6);
    	return view('user.blog', compact('blogs'));
    	//return view('Heloo');
    }

    public function detail($slug) {
    	$blog = Post::where('slug', $slug)->firstOrFail();
    	return view('user.blog-detail', compact('blog'));
    }
}
