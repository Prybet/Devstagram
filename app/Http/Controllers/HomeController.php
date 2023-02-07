<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function __invoke()
    {
        return view("home", ['posts' => Post::whereIn('user_id', auth()->user()->followings->pluck("id")->toArray())->latest()->paginate(20)]);
    }
}
