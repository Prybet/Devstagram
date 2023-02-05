<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {

        $request->request->add(["username" => Str::slug($request->username)]);


        $this->validate($request, [
            "name" => ["required", "min:4", "max:20"],
            "username" => ["required", "unique:users", "min:4", "max:20"],
            "email" => ["required", "unique:users", "email", "max:60"],
            "password" => ["required", "confirmed", "min:6", "max:60"]
        ]);


        User::create([
            "name" => $request->name,
            "username" => $request->username,
            "email" => $request->email,
            "password" => Hash::make($request->password),

        ]);

        auth()->attempt($request->only("email", "password"));

        return redirect()->route("posts.index", auth()->user()->username);
    }
}
