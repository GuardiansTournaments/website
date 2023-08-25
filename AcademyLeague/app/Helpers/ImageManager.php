<?php

namespace App\Helpers;
use Image;
use Illuminate\Support\Facades\Storage;


class ImageManager
{

    public static function uploadImage($file, $name, $subject, $width = null, $height = null)
    {
        $filename = $subject . "_" . str_replace(' ', '_', $name) . "." . "jpg";
        $image = Image::make($file);
        // ->resize($width, $height, function ($constraint) {
        //     $constraint->aspectRatio();
        //     $constraint->upsize();
        // });
        $image->save('images/'.$subject.'s/'. $filename);
        $path = '/images/' . $subject . "s/" . $filename;
        return $path;
    }

    public static function downloadImage($url, $name, $subject)
    {
        $contents = file_get_contents($url);
        $oriname = substr($url, strrpos($url, '/') + 1);
        $extension = substr($oriname, strpos($oriname, ".") + 1);
        $filename = $name.'.'.$extension;
        $image = Image::make($contents);
        $image->save('images/'.$subject.'s/'. $filename);
        return '/images/'. $subject.'s/'.$filename;
    }
}
