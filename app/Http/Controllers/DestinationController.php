<?php

namespace App\Http\Controllers;

use App\Http\Resources\PackageResource;
use App\Models\CategoryDestination;
use App\Models\CategoryPlace;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Models\Destination;
use DB;
use Str;

class DestinationController extends Controller
{

public function index($url) {
	$destination = Destination::where('url',$url)->orwhere('id',$url)->first();
	if(!$destination){
	    abort(404);
	}
	$categories = CategoryDestination::where('destination_id',$destination->id)->where('status',1)->get();
	$packages = Package::where('destination_id',$destination->id)->where('status',1)->orderBy('order','desc')->where('price','!=',0)->limit(8)->orderBy('id','desc')->get();

      return view('frontend.destination',compact('categories','packages','destination'));
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
    if (
        $request->filled('days.min') &&
        $request->filled('days.max')
    ) {
        $minDays = (int) $request->input('days.min');
        $maxDays = (int) $request->input('days.max');

        $query->whereRaw("CAST(REGEXP_REPLACE(duration, '[^0-9]', '') AS UNSIGNED) BETWEEN ? AND ?", [
            $minDays,
            $maxDays
        ]);
    }


    // ⛰ Difficulty Filter
    if ($request->filled('difficulty')) {
        $query->where('difficulty', $request->difficulty);
    }

    // 📂 Category Filter (assumed to be category_destination_id or category_place_id)
    if ($request->filled('category')) {
        $query->where('category_destination_id', $request->category);
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
