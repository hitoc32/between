<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Facility extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'post_id',
        'store_content',
        'wifi_content',
        'toilet_content',
        ];
        
    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
}
