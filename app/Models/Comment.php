<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'user_id',
        'post_id',
        'comment',
        ];
    
    public function likes(){
        return $this->hasMany(Like::class, 'comment_id');
    }
    
    public function getByLimit(int $limit_count = 10)
    {
        return $this->orderBy('updated_at', 'DESC')->limit($limit_count)->get();
    }
    //postsテーブルとのリレーション
    public function post(){
        return $this->belongsTo(Post::class, 'post_id');
    }

}
