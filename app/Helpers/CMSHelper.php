<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use Image;

use Illuminate\Support\Facades\Http;

class CMSHelper
{
    public static function image_thumbnail($file, $w, $h)
    {
        $thumb_filepath = 'thumbnail' . '/' . $w . 'x'. $h . '/' . $file;
        
        if (Storage::exists($file)) {
            if (Storage::exists($thumb_filepath)) {
                return Storage::url($thumb_filepath);
            } else {
                Storage::makeDirectory('thumbnail' . '/' . $w . 'x'. $h . '/' . dirname($file));
                $imgFile = Image::make(Storage::get($file));
                $file = $imgFile->fit($w, $h, function ($constraint) {
                    $constraint->upsize();
                });
                Storage::put($thumb_filepath, $file->encode('jpg', 80));
                return Storage::url($thumb_filepath);
            }
        } else {
            return "https://via.placeholder.com/" . $w . "x" . $h . ".jpg?text=No+Image";
        }
    }
    
    public static function site_config($key)
    {
        $site_config_path = 'site-config.json'; // Update the file path as per your local storage setup
        
        if (Storage::exists($site_config_path)) {
            $site_config = json_decode(Storage::get($site_config_path), true);
        } else {
            $site_config = [];
        }
        
        return $site_config[$key];
    }
}
