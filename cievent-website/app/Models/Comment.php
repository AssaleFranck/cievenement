<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\Static_;

class Comment extends Model
{
    use HasFactory;


    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();
    }

     protected $table='comments';
     protected $fillable=['name', 'email', 'comment', 'parent_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    public function commentable(){
        return $this->morphTo();

    }

    // public function posts(){
    //     return $this->hasOne(Post::class);
    // }
}
