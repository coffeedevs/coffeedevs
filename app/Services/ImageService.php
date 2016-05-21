<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Intervention\Image\Image as Intervention;

class ImageService
{

    protected $path, $resizedPath, $intervention;

    public function __construct(Intervention $intervention)
    {
        $this->path = public_path() . '/images/projects/';
        $this->resizedPath = public_path() . '/images/projects/resized/';
        if (!file_exists($this->path)) {
            File::makeDirectory($this->path, $mode = 0777, true, true);
        }

        if (!file_exists($this->resizedPath)) {
            File::makeDirectory($this->resizedPath, $mode = 0777, true, true);
        }
        $this->intervention = $intervention;
    }

    private function makeMediumQualityImage($fileName)
    {
        return Image::make($this->path . $fileName)->fit(400, 300)->save($this->resizedPath . $fileName);
    }

    public function saveMainPicture($file)
    {
        do {
            $fileName = round(microtime(true)) . mt_rand(0, 1000) . '.' . $file->extension();
        } while (file_exists($fileName));

        File::copy($file, $this->path . $fileName);
        self::makeMediumQualityImage($fileName);
        return $fileName;
    }
}