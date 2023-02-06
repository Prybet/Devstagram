<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('profile.index');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            "username" => ["required", "unique:users,username," . auth()->user()->id, "min:4", "max:20", "not_in:edit-profile"],
            "email" =>  ["required", "unique:users,email," . auth()->user()->id, "email", "max:60"]
        ]);


        if ($request->image) {
            $request->request->add(["username" => Str::slug($request->username)]);

            $name =  Str::uuid() . "." . $request->file("image")->extension();

            $image = Image::make($request->file("image"))->fit(1000, 1000);

            $image->save(public_path("profiles") . "/" . $name);
        }



        $user = User::find(auth()->user()->id);
        $user->username = $request->username;
        $user->email = $request->email;

        if ($request->new_pasword) {

            $this->validate($request, [
                "password" => ["required", "confirmed", "min:6", "max:60"],
                "new_password" => ["required", "confirmed", "min:6", "max:60"]
            ]);

            $user->password = Hash::make($request->new_password);
        }

        $user->image = $name ?? auth()->user()->image ?? '';


        if (!auth()->attempt([
            "email" => auth()->user()->email,
            "password" => $request->password
        ])) {
            return back()->with("message", "Contraseña incorrecta");
        }

        $user->save();

        return redirect()->route('posts.index', $user->username);
    }
}
