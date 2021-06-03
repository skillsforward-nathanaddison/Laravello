<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->where('archived', 0)->with('category', 'author')->get();
        return view('posts', compact('posts'));
    }

    public function create(User $author)
    {
        return view('add', [
            'author' => $author,
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request)
    {
        return view('add', [
            Post::store($request),
            'categories' => Category::all()]);
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return  view('post', compact('post'));
    }

    public function edit($id, Post $post)
    {
        return view('edit', [
            'id'    => $id,
            'post' => $post
        ]);
    }

    public function update(Request $request)
    {
        return Post::edit($request);
    }

    public function delete($id, Post $post)
    {
        return view('delete', [
            'id'    => $id,
            'post' => $post
        ]);
    }
    public function archive(Request $request)
    {
        return Post::archive($request);
    }
}
