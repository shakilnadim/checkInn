<?php

    namespace App\Custom;

    class Files{
        function fileUpload($file, $path){
            $fullFileName = $file->getClientOriginalName();
            $fileName = pathinfo($fullFileName, PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;

            $path = $file->storeAs($path, $fileNameToStore);
            
            return $fileNameToStore;
        }
    }