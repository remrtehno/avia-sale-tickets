<?php

namespace App\Services;

use App\Models\Image;
use Illuminate\Support\Facades\Storage;


class FileUpload
{

  public function storeFiles($files, $path = 'images')
  {
    $mapStoredFiles = [];

    foreach ($files as $fileName) {
      if (request()->file($fileName)) {
        foreach (request()->file($fileName) as $uploadedFile) {
          $url = Storage::putFile($path, $uploadedFile);

          $image = Image::create(['url' => $url]);
          $mapStoredFiles[$fileName][] = $image->id;
        }
      }
    }

    return $mapStoredFiles;
  }


  public function deleteFiles($files)
  {
    Storage::disk('public')->delete($files);
  }
}
