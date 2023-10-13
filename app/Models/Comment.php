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
        'title',
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
    //usersテーブルとのリレーション
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    
    //categoryテーブルとの多対多リレーション
    public function categories()
    {
        return $this->belongsToMany('App\Models\Category');   
    }

}
