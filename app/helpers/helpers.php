<?php

use App\Models\Website;
use Illuminate\Support\Facades\Cache;


function getImageurl($path){

    if (env('APP_ENV')=='local') {
      return  "https://d2i9o55ouvfvau.cloudfront.net/public/$path";
    }else{
      return  "https://d2i9o55ouvfvau.cloudfront.net/public/$path";


    }
}


function getFilePath($path){

  if (env('APP_ENV')=='local') {
    return  "https://d2i9o55ouvfvau.cloudfront.net/$path";
  }else{
    return  "https://d2i9o55ouvfvau.cloudfront.net/$path";


  }
}


function setting($key=null){
    $setting =Cache::remember('setting', 24*60*60, function () {
     return Website::first();

    });
    return $key?$setting->key:$setting;
}

