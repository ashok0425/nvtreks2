<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use File;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function uploadFile($path,$file){
        if($file){
        $extension = $file->getClientOriginalExtension();
        $filename = uniqid(). time() . '.' . $extension;
        $path=$file->storeAs('public/upload/',$filename,'s3');
        return 'upload/'.$filename;
    }
        return null;
    }


    public function deleteFile($file){
        File::delete(public_path($file));
    }
}
