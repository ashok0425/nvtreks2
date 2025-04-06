<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\CategoryDestination;
use App\Models\Destination;
use App\Models\Event;
use App\Models\Package;
use View;
use Response;
class SiteMapController extends Controller
{


     public function siteMap(){
          $blogs=Blog::orderBy('ID','desc')->where('post_status','publish')->get();
          $packages_categories = CategoryDestination::where('status',1)->get();
          $packages = Package::where('status',1)->where('price','!=',0)->orderBy('id','desc')->get();
          $events=Event::where('status',1)->where('title','!=',null)->orderBy('end_date','desc')->get();
          $destination_packages = Destination::all();
          $destinations = Destination::all();

          $content = View::make('sitemap', ['blogs' => $blogs, 'packages' => $packages,'destinations'=>$destinations,'destination_packages'=>$destination_packages,'packages_categories'=>$packages_categories,'events'=>$events]);
          return   Response::make($content)->header('Content-Type', 'text/xml;charset=utf-8');
     }



}