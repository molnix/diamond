<?php


namespace App\Service;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

class fileServices
{
    public function uploadFile(UploadedFile $file, $file_path){
        $file->move(public_path($file_path), $file->getClientOriginalName());
    }

    public function deleteFile($file){
        if(is_array($file))
        {
            foreach ($file as $item){
                $directory=explode('/',$item);
                if(isset($directory[1]))
                {
                    File::deleteDirectory($directory[0].'/'.$directory[1].'/'.$directory[2]);
                }
            }
        }
        else{
            $directory=explode('/',$file);
            if(isset($directory[1]))
            {
                File::deleteDirectory($directory[0].'/'.$directory[1].'/'.$directory[2]);
            }
        }
    }
}
