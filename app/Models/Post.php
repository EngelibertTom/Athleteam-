<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $timestamps = false;
    use HasFactory;

    protected $table = 'post';

    protected $fillable = [
        'id',
        'title',
        'content',
        'image',
        'user_id',
        'author'
    ];

    public function user()
    {
        return $this->belongsTo("App\Models\User", "user_id");
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
