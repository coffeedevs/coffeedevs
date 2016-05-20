<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Intervention\Image\Image as Intervention;

class ImageService
{

    protected $path, $intervention;

    public function __construct(Intervention $intervention)
    {
        $this->path = public_path() . '/images/projects/';
        $this->intervention = $intervention;
    }

    private function makeMediumQualityImage($fileName)
    {
        $img = Image::make('original-' . $fileName);
        $img->fit(400, 300);
        if (!file_exists(public_path() . '/files/news/medium/')) {
            File::makeDirectory(public_path() . '/files/news/medium/', $mode = 0777, true, true);
        }
        $img->save(public_path() . '/files/news/medium/' . $fileName);
    }

    public function saveMainPicture($file)
    {
        // Reviso la extension del archivo.
        $fileExt = 'jpg';
        if (!is_string($file)) {
            if ($file->getMimeType() == 'image/png')
                $fileExt = 'png';
            elseif ($file->getMimeType() == 'image/jpeg')
                $fileExt = 'jpg';
            else abort(500, 'Archivo no permitido');
        }
        if (!file_exists($this->path)) {
            File::makeDirectory($this->path, $mode = 0777, true, true);
        }

        do {
            $fileName = round(microtime(true)) . mt_rand(0, 1000) . '.' . $fileExt;
        } while (file_exists($fileName));

        File::copy($file, $this->path . 'original-' . $fileName);
        self::makeMediumQualityImage($fileName);
        return $fileName;
    }
}