<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\CategoryDestination;
use App\Models\Destination;
use App\Models\Cms;
use App\Models\Departure;
use App\Models\Faq;
use App\Models\MainSlider;
use App\Models\Package;
use App\Models\PackageImage;
use App\Models\Team;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{


public function home(Request $request) {

   // Prepare all variables first (before caching)
$destinations = Destination::whereIn('id',['8','9','10','11'])->get();
$popular_packages = Package::where('status',1)->where('hot_deal_package',1)->limit(3)->get();
$missed_packages = Package::where('status',1)->where('is_missed_package',1)->limit(6)->get();
$destination_categories = CategoryDestination::where('status',1)->select('id','name','url','image','icon')->limit(6)->get();
$discounted_packages = Package::where('status',1)->whereNotNull('discounted_price')->limit(3)->get();

$month = $request->get('month', Carbon::now()->month);
$year = $request->get('year', Carbon::now()->year);

$departures = Departure::whereMonth('start_date', $month)
    ->whereYear('start_date', $year)
    ->whereDate('start_date', '>', Carbon::today())
    ->with(['package' => function ($query) {
        $query->select('id', 'name', 'url', 'duration', 'discounted_price', 'price', 'status','destination_id');
    }])
    ->whereHas('package', function ($query) {
        $query->where('status', 1)->whereNotNull('duration')->whereNotNull('discounted_price')->whereNotNull('price');
    })
    // ->where("show_on_home_page",1)
    ->select('id', 'package_id', 'start_date', 'end_date', 'total_seats', 'booked_seats')
    ->orderBy('start_date')
    ->paginate(10);

$blogs = Blog::query()->latest()->limit(5)->whereNotNull('title')->get();
$gallery_images = PackageImage::where('show_on_home_page',1)->inRandomOrder()->limit(24)->pluck('image')->toArray();

$setting = setting();
$seo = [
    'meta_title' => $setting->title,
    'meta_keyword' => $setting->keyword,
    'meta_description' => $setting->descr,
    'mobile_meta_title' => $setting->mobile_meta_title ?? $setting->title,
    'mobile_meta_description' => $setting->mobile_meta_description ?? $setting->keyword,
    'mobile_meta_keyword' => $setting->mobile_meta_keyword ?? $setting->descr,
];

// Cache and return the rendered response
// $response = Cache::remember('homepage', 1440, function () use (
//     $missed_packages, $destinations, $popular_packages,
//     $destination_categories, $discounted_packages,
//     $departures, $month, $year, $blogs, $seo, $gallery_images
// ) {
    return view('frontend.index', compact(
        'missed_packages', 'destinations', 'popular_packages',
        'destination_categories', 'discounted_packages',
        'departures', 'month', 'year', 'blogs', 'seo', 'gallery_images'
    ));
// });

// return response($response);


}

public function about() {
    $seo=[
        'meta_title' => setting()->title,
        'meta_keyword' => setting()->keyword,
        'meta_description' => setting()->descr,
        'mobile_meta_title' => setting()->mobile_meta_title??setting()->title,
        'mobile_meta_description' => setting()->mobile_meta_description??setting()->keyword,
        'mobile_meta_keyword' => setting()->mobile_meta_keyword??setting()->descr,
    ];

    return view('frontend.about-us',compact('seo'));
}

public function privacy() {
    $seo=[
        'meta_title' => setting()->title,
        'meta_keyword' => setting()->keyword,
        'meta_description' => setting()->descr,
        'mobile_meta_title' => setting()->mobile_meta_title??setting()->title,
        'mobile_meta_description' => setting()->mobile_meta_description??setting()->keyword,
        'mobile_meta_keyword' => setting()->mobile_meta_keyword??setting()->descr,
    ];

    return view('frontend.privacy-policy',compact('seo'));
}

public function term() {
    $seo=[
        'meta_title' => setting()->title,
        'meta_keyword' => setting()->keyword,
        'meta_description' => setting()->descr,
        'mobile_meta_title' => setting()->mobile_meta_title??setting()->title,
        'mobile_meta_description' => setting()->mobile_meta_description??setting()->keyword,
        'mobile_meta_keyword' => setting()->mobile_meta_keyword??setting()->descr,
    ];

    return view('frontend.term-condition',compact('seo'));
}


public function gallery() {
    $seo=[
        'meta_title' => setting()->title,
        'meta_keyword' => setting()->keyword,
        'meta_description' => setting()->descr,
        'mobile_meta_title' => setting()->mobile_meta_title??setting()->title,
        'mobile_meta_description' => setting()->mobile_meta_description??setting()->keyword,
        'mobile_meta_keyword' => setting()->mobile_meta_keyword??setting()->descr,
    ];

    $packages=Package::with('package_images:image,id,package_id')->withCount('package_images')
    ->having('package_images_count', '>', 1)
    ->paginate(3);
    return view('frontend.gallery',compact('packages','seo'));
}

public function team() {
    $seo=[
        'meta_title' => setting()->title,
        'meta_keyword' => setting()->keyword,
        'meta_description' => setting()->descr,
        'mobile_meta_title' => setting()->mobile_meta_title??setting()->title,
        'mobile_meta_description' => setting()->mobile_meta_description??setting()->keyword,
        'mobile_meta_keyword' => setting()->mobile_meta_keyword??setting()->descr,
    ];

    $teams=Team::latest()->paginate(10);
    return view('frontend.team',compact('teams','seo'));
}



public function UsefulInfo(){
    $UsefulInfo=Package::where('useful_info','!=',null)->value('useful_info');
    return view('frontend.usefulinfo',compact('UsefulInfo'));
}

}
