<?php

namespace App\Traits;

trait FileUploaDTrait
{
    public function upload($file,  string $filename): String
    {
        $filename = '';
        if ($file) {
            $filename = $file->getClientOriginalName();
            $file->move(public_path($filename), $file->getClientOriginalName());
        }
        return $filename;
    }
}
