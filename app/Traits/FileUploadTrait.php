<?php

namespace App\Traits;

trait FileUploadTrait
{

    public function uploadFile($file, $folder, $existingFile = null)
    {
        if (! $file) {
            return $existingFile;
        } // ប្រសិនមិនមាន file → return file ដូចមាន
        $targetFolder = public_path("uploads/{$folder}");
        if (! file_exists($targetFolder)) {
            mkdir($targetFolder, 0755, true);
        } // create folder if not exist

        if ($existingFile) {
            $existingFilePath = public_path(parse_url($existingFile, PHP_URL_PATH));
            if (file_exists($existingFilePath)) {
                unlink($existingFilePath);
            } // delete old file
        }

        $fileName = time().'_'.$file->getClientOriginalName();
        $file->move($targetFolder, $fileName); // move uploaded file to target

        return "uploads/{$folder}/{$fileName}";
    }
}
