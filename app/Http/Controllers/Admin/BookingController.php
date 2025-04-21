<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Support\Facades\DB;
class BookingController extends Controller
{

    public function index()
    {
        $bookings=Booking::orderBy('id','desc')->paginate(20);
       return view('admin.booking.index',compact('bookings'));
    }


}
