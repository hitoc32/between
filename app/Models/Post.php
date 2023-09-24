<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'user_id',
        'nation_id',
        'airport',
        'airport_sf',
        'region',
        'basic_content',
        'image_path'
        ];
    
    public function getByLimit(int $limit_count = 5)
    {
        return $this->orderBy('updated_at', 'DESC')->limit($limit_count)->get();
    }
    
    public function getPaginateByLimit(int $limit_count = 20)
    {
        return $this->orderBy('updated_at', 'DESC')->limit($limit_count)->get();
    }
    
    //nation_idごとにグループ化
    /*public function getCountAmount(){
        return DB::table('posts')
            ->select('nation_id')
            ->selectRaw('COUNT(nation_id) as count_nationId')
            ->groupBy('nation_id')->get();
    }
    */
    
    //以下はリレーション設定
    public function nation()
    {
        return $this->belongsTo(Nation::class, 'nation_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function border_control()
    {
        return $this->hasOne(Border_control::class);
    }
    public function facility()
    {
        return $this->hasOne(Facility::class);
    }
    public function transportation()
    {
        return $this->hasOne(Transportation::class);
    }
    //commentsテーブルとのリレーション
    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id');
    }
    
    

}
