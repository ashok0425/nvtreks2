<?php

namespace App\Http\Controllers;

use App\Http\Resources\PackageResource;
use App\Models\CategoryDestination;
use App\Models\CategoryPlace;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Models\Destination;
use ArrayObject;
use DB;
use Illuminate\Support\Facades\Route;
use Str;

class DestinationController extends Controller
{

public function index(Request $request,$url=null) {
    $seo=[];
    if(Route::is('package.place')){
        $data = CategoryPlace::where('url',$url)->orwhere('id',$url)->firstOrFail();
        $categories = CategoryDestination::where('status',1)->limit(10)->get();
        $type=null;
        $seo=[
            'meta_title' => $data->meta_title,
            'meta_keyword' => $data->meta_keyword,
            'meta_description' => $data->meta_description,
            'mobile_meta_title' => $data->mobile_meta_title??$data->meta_title,
            'mobile_meta_description' => $data->mobile_meta_description??$data->meta_keyword,
            'mobile_meta_keyword' => $data->mobile_meta_keyword??$data->meta_description,
        ];
    }elseif(Route::is('package.category')){
        $data = CategoryDestination::where('url',$url)->orwhere('id',$url)->firstOrFail();
	   $categories = CategoryDestination::where('status',1)->limit(10)->get();
       $type=null;
       $seo=[
        'meta_title' => $data->meta_title,
        'meta_keyword' => $data->meta_keyword,
        'meta_description' => $data->meta_description,
        'mobile_meta_title' => $data->mobile_meta_title??$data->meta_title,
        'mobile_meta_description' => $data->mobile_meta_description??$data->meta_keyword,
        'mobile_meta_keyword' => $data->mobile_meta_keyword??$data->meta_description,
    ];
    }
    elseif(Route::is('deals')){
        $data = (object)['name'=>'Special Deals','cover_image'=>null,'image'=>null,'id'=>1];
	   $categories = CategoryDestination::where('status',1)->limit(10)->get();
       $type='deal';
    }else{
        $data = Destination::where('url',$url)->orwhere('id',$url)->firstOrFail();
	   $categories = CategoryDestination::where('destination_id',$data->id)->where('status',1)->get();
       $type='destination';
       $seo=[
        'meta_title' => $data->meta_title,
        'meta_keyword' => $data->meta_keyword,
        'meta_description' => $data->meta_description,
        'mobile_meta_title' => $data->mobile_meta_title??$data->meta_title,
        'mobile_meta_description' => $data->mobile_meta_description??$data->meta_keyword,
        'mobile_meta_keyword' => $data->mobile_meta_keyword??$data->meta_description,
    ];
    }


      return view('frontend.destination',compact('categories','data','type','seo'));
}


public function filter(Request $request)
{
    $query = Package::query();

    // 🔍 Search Filter
    if ($request->filled('search')) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    // 💰 Price Range Filter
    $minPrice = data_get($request, 'price.min');
    $maxPrice = data_get($request, 'price.max');

    if (!is_null($minPrice) && !is_null($maxPrice)) {
        $query->whereBetween('price', [$minPrice, $maxPrice]);
    }


    // 📅 Days Filter (assumed to be mapped with `duration`)
    // if (
    //     $request->filled('days.min') &&
    //     $request->filled('days.max')
    // ) {
    //     $minDays = (int) $request->input('days.min');
    //     $maxDays = (int) $request->input('days.max');

    //     $query->whereRaw("CAST(REGEXP_REPLACE(duration, '[^0-9]', '') AS UNSIGNED) BETWEEN ? AND ?", [
    //         $minDays,
    //         $maxDays
    //     ]);
    // }


    // ⛰ Difficulty Filter
    if ($request->filled('difficulty')) {
        $query->where('difficulty', $request->difficulty);
    }

    // 📂 Category Filter (assumed to be category_destination_id or category_place_id)
    if ($request->filled('category')) {
        $query->where('category_destination_id', $request->category);
    }

    if ($request->type=='destination') {
        $query->where('destination_id', $request->destination_id)->get();
    }
    if ($request->type=='deal') {
        $query->whereNotNull('discounted_price')->get();
    }

    // 🔄 Paginate or get the results
    $results = $query->latest()->paginate(10);

    // Return paginated response with metadata and data
    return response()->json([
        'data' => PackageResource::collection($results),
        'meta' => [
            'currentPage' => $results->currentPage(),
            'totalPages' => $results->lastPage(),
            'totalResults' => $results->total(),
            'perPage' => $results->perPage(),
        ]
    ]);
}





}
