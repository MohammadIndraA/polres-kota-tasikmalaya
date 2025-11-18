<?php 

namespace App\Helpers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

if(! function_exists('upload')) {
    function upload($directory, $file, $filename= "") 
    {
        $extensi = $file->getClientOriginalExtension();
        $filename = "{$filename}_" . date('Ymdhis'). ".{$extensi}";

        Storage::disk('public')->putFileAs("/$directory",$file,$filename);
        return "/$directory/$filename";
    }
}

if (!function_exists('uploadMultiple')) {
  function uploadMultiple(string $field, array $files, string $folder): array
{
    $paths = [];
    foreach ($files as $file) {
        $paths[] = $file->store($folder, 'public');
    }
    return $paths; // langsung array path
}

}
