<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\CategoryDestination;
use App\Models\Destination;
use App\Models\Cms;
use App\Models\Departure;
use App\Models\Faq;
use App\Models\Package;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{


public function home(Request $request) {

    $destinations=Destination::whereIn('id',['8','9','10','11'])->get();
    $popular_package=Package::where('status',1)->where('hot_deal_package',1)->whereNotNull('discounted_price')->limit(3)->get();
    $destination_categories=CategoryDestination::where('status',1)->select('id','name','url','image')->limit(6)->get();
    $discounted_packages=Package::where('status',1)->whereNotNull('discounted_price')->limit(3)->get();

        $month = $request->get('month', Carbon::now()->month);
        $year = $request->get('year', Carbon::now()->year);
        $departures = Departure::whereMonth('start_date', $month)
        ->whereYear('start_date', $year)
        ->with(['package' => function ($query) {
            $query->select('id', 'name', 'url', 'duration', 'discounted_price', 'price', 'status');
        }])
        ->whereHas('package', function ($query) {
            $query->where('status', 1)->whereNotNull('duration')->whereNotNull('discounted_price')->whereNotNull('price');
        })
        ->select('id', 'package_id', 'start_date', 'end_date', 'total_seats', 'booked_seats')
        ->orderBy('start_date')
        ->limit(10)
        ->get();
        $blogs=Blog::where('display_homepage',1)->limit(5)->get();
        $testimonials = DB::table('testimonials')
    ->where('status', 1)
    ->whereRaw('(LENGTH(content) - LENGTH(REPLACE(content, " ", "")) + 1) < 60')
    ->orderByRaw('(LENGTH(content) - LENGTH(REPLACE(content, " ", "")) + 1) DESC')
    ->limit(5)
    ->get();
    $faqs=Faq::with('package')->where('show_on_home_page',1)->latest()->get();
      return view('frontend.index',compact('destinations','popular_package','destination_categories','discounted_packages','departures','month','year','blogs','testimonials','faqs'));
}


public function Page($page) {

      $data = Cms::where('status', 1)->where('url',$page)->orderBy('position')->with('child')->first();
      return view('frontend.page',compact('data'));
}

public function PageDetail($page,$url=null) {

      if (!isset($url)) {
            $data = Cms::where('status', 1)->where('url',$page)->first();

      }else{

            $data = Cms::where('status', 1)->where('parent_id',$page)->where('url',$url)->first();
             $page=Cms::where('id',$page)->value('url');
      }
      return view('frontend.page_detail',compact('data','page'));
}



}
