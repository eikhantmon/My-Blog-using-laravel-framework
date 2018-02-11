<?php

namespace App\Http\Controllers;
use App\Role;
use App\Admin;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
    	$role_users = Role::with('users')->where('name', 'admin')->get();
    	$users = $role_users->users;

    	return view('admin.authors.index', compact('users'));
    }

    // public function edit($id)
    // {
    // 	return view('admin.authors.edit');
    // }

    public function edit(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        if ($post->user_id != $request->user()->id) {

            return view('admin.authors.edit', compact('post'));
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

        return redirect()->route('admin.authors.index');
    }
}
