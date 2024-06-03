<?php

namespace App\Trait;

use File;
use Illuminate\Support\Facades\Storage;
use Image;

trait FileUploadTrait
{
    public function uploadFile($file, $path, $height = null, $width = null)
    {
        if ($file) {
            $filename = time() . rand(1, 99) . '.' . $file->getClientOriginalExtension();

            // Check if the file is an image
            if (strpos($file->getMimeType(), 'image') !== false) {
                $image = Image::make($file);

                // Check if both height and width are provided for resizing
                if ($height && $width) {
                    $image->resize($width, $height);
                }

                $image->save(storage_path($path) . '/' . $filename);
            } else {
                $file->move(storage_path($path), $filename);
            }

            return $filename;
        }
    }


    public function deleteFile($path)
    {
        if (Storage::exists($path)) {
            Storage::delete($path);
            return true;
        }

        return false;
    }
}