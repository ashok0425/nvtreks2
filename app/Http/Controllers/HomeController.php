<?php

namespace App\Http\Controllers;

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
      return view('frontend.index',compact('destinations','popular_package','destination_categories','discounted_packages','departures','month','year','blogs'));
}

public function about() {
    return view('frontend.about-us');
}

public function privacy() {
    return view('frontend.privacy-policy');
}

public function term() {
    return view('frontend.term-condition');
}



public function UsefulInfo(){
    $UsefulInfo=Package::where('useful_info','!=',null)->value('useful_info');
    return view('frontend.usefulinfo',compact('UsefulInfo'));
    }

}
