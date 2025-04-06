<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
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
 public function destination($url) {
    $data = Destination::where('url',$url)->orwhere('id',$url)->first();
      $packages = Package::where('destination_id',$data->id)->orderBy('order','desc')->where('status',1)->where('price','!=',0)->orderBy('id','desc')->paginate(12);
      return view('frontend.package',compact('packages','data'));
 }

 public function all() {
     $packages = Package::where('status',1)->orderBy('order','desc')->where('price','!=',0)->orderBy('id','desc')->paginate(20);
     $data=Destination::find(8);
     return view('frontend.package',compact('packages','data'));
}

public function Deals() {
    $packages = Cache::remember('dealpackages', 604800, function () {
        return DB::table('packages')
            ->orderBy('id', 'desc')
            ->where('status', 1)
            ->where('duration', '!=', null)
            ->where('activity', '!=', null)
            ->where('discounted_price', '!=', null)
            ->paginate(24);
    });

    return view('frontend.deal',compact('packages'));
}

 public function category($url) {
  $data = CategoryDestination::where('url',$url)->orwhere('id',$url)->first();
if(!$data){
    abort(404);
}
      $packages = Package::where('category_destination_id',$data->id)->orderBy('order','desc')->where('status',1)->where('price','!=',0)->orderBy('id','desc')->paginate(12);
      return view('frontend.package',compact('packages','data'));
 }


 public function place($url) {

    $data = CategoryPlace::where('url',$url)->orwhere('id',$url)->first();

      $packages = Package::where('category_place_id',$data->id)->orderBy('order','desc')->where('status',1)->where('price','!=',0)->orderBy('id','desc')->paginate(12);
      return view('frontend.package',compact('packages','data'));
 }

public function show() {
    $s2=request()->segment(1);
    $s3=request()->segment(3);
if ($s3) {
    $url=$s3;
    $country_id=$s2;
}else{
    $url=request()->segment(2);
    $country_id='npee';
}
	$package = Package::with('gallery')->where('status',1)->where('url',$url)->first();
	if(!$package){
        abort(404);
   }
      $reviews=DB::table('testimonials')->join('package_testimonial','package_testimonial.testimonial_id','testimonials.id')->where('testimonials.status',1)->where('package_testimonial.package_id',$package->id)->orderBy('testimonials.date','desc')->limit(20)->get();
      $features=DB::table('packages')->join('package_featured','packages.id','package_featured.featured_id')->where('package_featured.package_id',$package->id)->select('packages.*')->where('status',1)->get();
      $before=Destination::find($package->destination_id);
      $country=Country::where('slug',$country_id)->value('id');
      $countries=Country::where('slug','!=','np')->select('slug')->get();

      return view('frontend.package_detail',compact('package','reviews','features','before','country','countries','url'));
}

public function printpackage($id){
     $package = Package::findOrFail($id);
     // dd($package);
     return view('frontend.package_print',compact('package'));
}



public function Departure(Request $request){
     $package=Package::find($request->packageid);
      $departures=Departure::where('status',1)->orderBy('start_date')->where('package_id',$request->packageid)->whereYear('start_date', '=', $request->year)->whereMonth('start_date', '=', $request->month)->where('start_date', '>=', Carbon::today())->get();
     return view('frontend.departure',compact('departures','package'));

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





public function filter_package(Request $request) {
    $query="SELECT * FROM  `packages` WHERE `status`=1 AND `price`!=0 ";
   if(isset($request->name)&&!empty($request->name)){
       $query.=" AND `name` LIKE  '%$request->name%' ";
   }

   if(!isset($request->to)&&empty($request->to)){
    $request->to=10000000;
   }


    if(!isset($request->from)&&empty($request->from)){
        $request->from=1;
    }

     $query.=" AND `price` between  $request->from AND $request->to ";







   $packages=DB::select($query);
$data='';
foreach($packages as $package){

     $data.= "<div class='col-md-3 col-sm-6 col-12'>
    <div class='card-style-2 '>
         <a href='". route('package.detail',['url'=>$package->url]) ."' class='text-decoration-none'>
        <div class='img-container'>";

        if ($package->banner==null){
         $data.=" <img src='". getImageurl('frontend/assets/tour-1.png')."' alt='' class='img-fluid w-100 w-100'>";
        }
        else {
         $data.="<img src='". getImageurl($package->banner)."' alt='".$package->name."' class='img-fluid w-100'>";
         }

         $data.=" </div>
        <div class='img-desc'>
            <div class='about-img row'>
                <div class='col-12'>
                   <p class='px-0 mx-0'>";

                    if (!empty($package->duration))
                    {
                     $data.= $package->duration ."|";

                    }

                    if (!empty($package->activity))
                    {
                     $data.= Str::limit($package->activity,20) ;

                    }


                    $data.=  " </p>

            </div>
            <div class='col-6 '>

                <div class='rating'>";
                    for ($i=1;$i<=$package->rating;$i++)
                    {


                     $data.="<i class='fas fa-star'></i> ";
                     }
                    for ($i=1;$i<=5-$package->rating;$i++)
                    {
                     $data.=   "<i class='far fa-star'></i> ";

                   }

                   $data.=   "</div>
            </div>

            <div class='col-6 custom-fw-600 custom-text-primary'>
            US  \$".$package->price ."


    </div>
            </div>
            <div class='title mt-1'>";
            $data.=$package->name;

            $data.=" </div>

        </div>
</a>

    </div>
</div>";
    }
   return $data;
 }

















}
