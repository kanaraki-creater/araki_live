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
    
    public function edit(Comment $comment)
    {
        return view('comments.edit')->with(['comment' => $comment]);
    }
    
    public function update(CommentRequest $request, Comment $comment)
    {
        $input = $request['comment'];
        $comment->fill($input)->save();
    
        return redirect('/posts/' . $comment->post_id);
    }
    
    public function delete(Request $request, Comment $comment)
    {
        $post = $request->input('postId');
        $comment->delete();
        return redirect('/posts/' . $post);
    }
}
