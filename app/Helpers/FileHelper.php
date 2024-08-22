<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class FileHelper
{
    public static function uploadFile($file, $path)
    {
        $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/'.$path), $fileName);
        $picture = 'uploads/'. $path . '/' . $fileName;
        return $picture;
    }

    public static function removeFile($filePath)
    {
        if (Storage::exists('public/'.$filePath)) {
            Storage::delete('public/'.$filePath);
        }
    }
}
