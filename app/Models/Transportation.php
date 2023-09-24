<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transportation extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'post_id',
        'train_time',
        'train_cost',
        'train_content',
        'bus_time',
        'bus_cost',
        'bus_content',
        'other_transportation_content',
        ];
        
    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
}
