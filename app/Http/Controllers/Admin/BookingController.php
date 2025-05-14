<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class BookingController extends Controller
{

    public function index(Request $request)
    {
        $bookings=Booking::orderBy('id','desc')
        ->when($request->search,function($query) use ($request){
            $query->where(function($q) use ($request){
              $q->orwhere('email',$request->search)
              ->orwhere('name',$request->search)
              ->orwhere('phone',$request->search);
            });
        })
        ->paginate(20);
       return view('admin.booking.index',compact('bookings'));
    }


}
