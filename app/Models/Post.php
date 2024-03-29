<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'title',
        'name',
        'body',
        'user_id',
        'date',
        'image_url',
    ];
    
    public function getPaginateByLimit(int $limit_count = 2)
    {
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function isPast()
    
    {
        return Carbon::parse($this->date)->lt(Carbon::now());
    }
    
    public function users()
    {
        return $this->belongTo(User::class);   
    }
    
    public function comments()
    {
     
        return $this->hasMany(Comment::class);
    }
    
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    
}
