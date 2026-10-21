<?php

namespace App\Services;

use Spatie\ImageOptimizer\OptimizerChain;
use Illuminate\Support\Facades\File;
use Throwable;
use Intervention\Image\Laravel\Facades\Image;
use Intervention\Image\Image as Intervention;

class ImageService
{
    protected $path, $resizedPath, $optimizer;

    public function __construct(OptimizerChain $imageOptimizer)
    {
        $this->path = public_path() . '/images/projects/';
        $this->resizedPath = public_path() . '/images/projects/resized/';
        if (!file_exists($this->path)) {
            File::makeDirectory($this->path, $mode = 0777, true, true);
        }

        if (!file_exists($this->resizedPath)) {
            File::makeDirectory($this->resizedPath, $mode = 0777, true, true);
        }
        $this->optimizer = $imageOptimizer;
    }

    private function makeMediumQualityImage($fileName)
    {
        return Image::decode($this->path . $fileName)->cover(400, 300)->save($this->resizedPath . $fileName);
    }

    public function saveMainPicture($file)
    {
        do {
            $fileName = round(microtime(true)) . mt_rand(0, 1000) . '.' . $file->extension();
        } while (file_exists($fileName));

        File::copy($file, $this->path . $fileName);
        try {
            $this->optimizer->optimize($this->path . $fileName);
        } catch (Throwable $ex) {

        }

         $this->makeMediumQualityImage($fileName);

        return $fileName;
    }
}