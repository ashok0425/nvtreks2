<?php

namespace App\Http\Controllers;

use App\Models\CategoryDestination;
use App\Models\CategoryPlace;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Models\Contact ;
use App\Models\Country;
use App\Models\Departure;
use App\Models\Destination;
use App\Models\Testimonial;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB ;
use Str;
class PackageController extends Controller
{


public function show(Request $request) {
    $s2=request()->segment(1);
    $s3=request()->segment(3);
if ($s3) {
    $url=$s3;
    $country_id=$s2;
}else{
    $url=request()->segment(2);
    $country_id='npee';
}
	$package = Package::with('package_images','testimonials','feature_packages')->where('status',1)->where('url',$url)->first();
	if(!$package){
        abort(404);
   }
      $reviews=$package->testimonials;
      $features=$package->feature_packages;
      $before=Destination::find($package->destination_id);
      $country=Country::where('slug',$country_id)->value('id');
      $countries=Country::where('slug','!=','np')->select('slug')->get();
      $month = $request->get('month', Carbon::now()->month);
      $year = $request->get('year', Carbon::now()->year);

      $countryData = $package->country($country);

      $seo = [
          'meta_title' => $countryData ? ($countryData->pivot->page_title ?? $package->page_title) : $package->page_title,
          'meta_description' => $countryData ? ($countryData->pivot->meta_description ?? $package->meta_description) : $package->meta_description,
          'meta_keyword' => $countryData ? ($countryData->pivot->meta_keywords ?? $package->meta_keywords) : $package->meta_keywords,
         'image'=>$package->thumbnail,
          'mobile_meta_title' => $countryData ? ($countryData->pivot->mobile_meta_title ?? $package->mobile_meta_title ?? $package->page_title) : ($package->mobile_meta_title ?? $package->page_title),
          'mobile_meta_description' => $countryData ? ($countryData->pivot->mobile_meta_description ?? $package->mobile_meta_description ?? $package->meta_description) : ($package->mobile_meta_description ?? $package->meta_description),
          'mobile_meta_keyword' => $countryData ? ($countryData->pivot->mobile_meta_keyword ?? $package->mobile_meta_keyword ?? $package->meta_keywords) : ($package->mobile_meta_keyword ?? $package->meta_keywords),
      ];

      return view('frontend.package_detail',compact('package','reviews','features','before','country','countries','url','year','month','seo'));
}

public function printpackage($id){
     $package = Package::findOrFail($id);
     // dd($package);
     return view('frontend.package_print',compact('package'));
}



public function Departure(Request $request)
{
    $month = $request->get('month', Carbon::now()->month);
    $year = $request->get('year', Carbon::now()->year);

    // Handle year rollover for December
    $nextMonth = $month == 12 ? 1 : $month + 1;
    $nextMonthYear = $month == 12 ? $year + 1 : $year;

    $departures = Departure::where('package_id', $request->id)
        ->where(function ($query) use ($month, $year, $nextMonth, $request) {
            $query->where(function ($q) use ($month, $year) {
                $q->whereMonth('start_date', $month)
                  ->whereYear('start_date', $year);
            })
            ->when(!$request->get('month'),function($query) use ($nextMonth, $year){
            $query->orWhere(function ($q) use ($nextMonth, $year) {
                $q->whereMonth('start_date', $nextMonth)
                  ->whereYear('start_date', $year);
            });
        });
    })
        ->whereDate('start_date', '>', Carbon::today())
        ->with('package:name,duration,id,price,discounted_price')
        ->select('id', 'package_id', 'start_date', 'end_date', 'total_seats', 'booked_seats')
        ->orderBy('start_date')
        ->limit(10)
        ->get();

    return response()->json([
        'departures' => $departures,
    ]);
}






public function Testimonial(Request $request){
     $packages=Package::where('status',1)->get();
     // Carbon::now();
     if($request->package){
             $packagefinder=Package::find($request->package);
             $testimonials=$packagefinder->testimonials()->paginate(20);

     }
     else{
          $testimonials = Testimonial::where('status',1)->orderBy('id','desc')->paginate(20);

     }
     return view('frontend.testimonial',compact('testimonials','packages'));
}




public function testimonialStore(Request $request)
{
    try {
        DB::beginTransaction();
        $testimonials = new  Testimonial;
        $testimonials->name = $request->name;
        $testimonials->title = $request->title;
        $testimonials->content = $request->content;
        $testimonials->status = 1;
        $testimonials->rating = $request->rating;

        $testimonials->date = today();
        $banner = $request->file('file');
        if ($banner) {
            $fname = rand() . $request->name . $banner->getClientOriginalExtension();
            $testimonials->image = 'upload/testimonial/' . $fname;
            $banner->move(public_path() . '/upload/testimonial/', $fname);
        }
        if ($testimonials->save()) {
                $package_testmonial = [];
                $package_testmonial['package_id'] = $request->package;
                $package_testmonial['testimonial_id'] = $testimonials->id;
                DB::table('package_testimonial')->insert($package_testmonial);
        }

DB::commit();

        $notification = array(
            'alert-type' => 'success',
            'messege' => 'Successfully submitted testimonial',

        );
    } catch (\Throwable $qE) {
DB::rollBack();
        $notification = array(
            'alert-type' => 'error',
            'messege' => 'Failed to Added Testimonial.',

        );
    }

    return redirect()->back()->with($notification);
}

}
