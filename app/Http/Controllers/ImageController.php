<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function getImage($filename){
        $file = Storage::disk("public")->get($filename);

        return new Response($file, 200);
    }

    public function getProfileImage($filename){
        $file = Storage::disk("profiles")->get($filename);

        return new Response($file, 200);
    }

}
