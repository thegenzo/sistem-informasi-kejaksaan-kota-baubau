<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use Image;

use Illuminate\Support\Facades\Http;

class CMSHelper
{
    public static function image_thumbnail($file, $w, $h){
        $file = Str::after($file, config('filesystems.disks.s3.endpoint') . "/" . config('filesystems.disks.s3.bucket') . "/");
        if(Storage::disk('s3')->exists($file)){
            $thumb_filepath = 'thumbnail' . '/' . $w . 'x'. $h . '/' . $file;
            if(Storage::disk('s3')->exists($thumb_filepath)){
                return Storage::disk('s3')->url($thumb_filepath);
            }
            else {
                Storage::disk('s3')->makeDirectory('thumbnail' . '/' . $w . 'x'. $h . '/' . dirname($file));
                $imgFile = Image::make(Storage::disk('s3')->get($file));
                $file = $imgFile->fit($w, $h, function ($constraint) {
                    $constraint->upsize();
                });
                Storage::disk('s3')->put($thumb_filepath, $file->encode('jpg', 80));
                return Storage::disk('s3')->url($thumb_filepath);
            }
        }
        else {
            return "https://via.placeholder.com/" . $w . "x" . $h . ".jpg?text=No+Image";
        }
    }
    public static function site_config($key){
        $site_config_path = env('AWS_PREFIX') . "/site-config.json";
        if(Storage::disk('s3')->exists($site_config_path)){
            $site_config = json_decode(Storage::disk('s3')->get($site_config_path), true);
        }
        else {
            $site_config = [];
        }
        return $site_config[$key];
    }
}