<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function post(Request $request)
    {
        return view('add', [
            Comment::store($request)
        ]);
    }
}
