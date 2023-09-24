<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Nation;
use App\Models\Post;

class NationController extends Controller
{
    public function index(Nation $nation){
        $posts = $nation->posts;
        
        return view('nations.index', compact('nation', 'posts'));
    }
}
