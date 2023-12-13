<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function uploadImage(Request $request) {
        $path = Storage::putFile("image", $request->image);
        return response()->json([
            "path" => $path
        ]);
    }

    public function getImage($file_name) {
        $image = Storage::get("/image/" . $file_name);
        return response($image, 200)->header('Content-Type', Storage::mimeType("/image/" . $file_name));
    }
}
