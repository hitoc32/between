<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment_category extends Model
{
    use HasFactory;
    
    public function comments()
    {
        return $this->belongsToMany('App\Models\Comment');
    }
}
