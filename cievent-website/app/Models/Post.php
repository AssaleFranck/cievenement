<?php

namespace App\Models;

use App\Models\Comment;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Laravelista\Comments\Commentable;

class Post extends Model
{
    use HasFactory;

    // protected $guarded = [];

    protected $fillable = [
        'title',
        'body',
        'imagePath',
        'user_id',
        'category_id',
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }

    // We have a post and it belongsTo a category

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function comments(){
        return $this->morphMany(Comment::class, 'commentable')
                            ->whereNull('parent_id');
    }

}
