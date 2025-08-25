<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 
        'content', 
        'user_id',
        'filename',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class, 'post_id');
    }

    public function categories() {
        return $this->belongsToMany(Category::class,'category_posts', 'post_id','category_id');
    }

    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;
}
