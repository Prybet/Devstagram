<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImageController extends Controller
{
    public function store(Request $request)
    {

        $name =  Str::uuid() . "." . $request->file("file")->extension();

        $image = Image::make($request->file("file"))->fit(100, 100);

        $image->save(public_path("uploads") . "/" . $name);

        return response()->json(["image" => $name]);
    }
}
