<?php

namespace Modules\Products\Traits;

use Illuminate\Http\UploadedFile;

trait UploadProductImageTrait
{
    public function uploadImage(UploadedFile $uploadedFile, $folder = null, $disk = 'public', $filename = null)
    {
        $name = !is_null($filename) ? $filename : str_random(25);

        $file = $uploadedFile->storeAs($folder, $name.'.'.$uploadedFile->getClientOriginalExtension(), $disk);

        return $file;
    }
}
