<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;


class FileUpload
{

  public function storeFiles($files, $path = 'images', $deleteFiles = [])
  {

    Storage::disk('public')->delete($deleteFiles);

    $paths = [];

    foreach ($files as $fileName) {
      if (request()->file($fileName)) {
        foreach (request()->file($fileName) as $uploadedFile) {
          $paths[$fileName][] = $uploadedFile->store($path);
        }
      }
    }

    return $paths;
  }



  public function deleteFiles($files)
  {
  }
}
