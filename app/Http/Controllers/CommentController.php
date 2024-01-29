<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class CommentController extends Controller
{
    return view('posts.index')->with(['comments' => $comment->get()]);
}
