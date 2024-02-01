<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    public function index()
    {
        return view('posts.index')->with(['comments' => $comment->get()]);
    }
    
    public function create()
    {
        return view('comments.create');
    }
    
    public function store(CommentRequest $request, Post $post, Comment $comment)
    {
        $input = $request['comment'];
        $input += ['user_id' => \Auth::id()];
        $input += ['post_id' => $post->id];
        $comment->fill($input)->save();
        
        return redirect('/posts/' . $post->id);
    }
}