<?php

use App\Models\Website;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

function getImageUrl($path){

if (!Storage::disk('s3')->exists('public/'.$path)||!$path) {
return null;
}
      return  "https://d2i9o55ouvfvau.cloudfront.net/public/$path";

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


function IPtoLocation($ip)
      {
            $apiURL = 'https://api.geoapify.com/v1/ipinfo?apiKey=ba7648986b064e67a1418a20662a6dba';

            // Make HTTP GET request using cURL
            $ch = curl_init($apiURL);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $apiResponse = curl_exec($ch);

            curl_close($ch);

            // Retrieve IP data from API response
            $ipData = json_decode($apiResponse, true);

            // Return geolocation data
            return !empty($ipData) ? $ipData : false;
      }

