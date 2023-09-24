<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Border_control extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'post_id',
        'arrive_level',
        'arrive_content',
        'depature_level',
        'depature_content',
        'luggage_time',
        'luggage_content',
        ];
    
    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
}
