<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    
    protected $fillable = [
    'title',
    'body',
    'user_id',
    'post_id'
];
    
    public function user()
    {
        return $this->belongTo(User::class);
    }
    
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
