<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Models\Destination;
use App\Notifications\BookingNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;

class BookingController extends Controller
{

    public function index(Request $request)
      {
            $packages = Package::where('status',1)->orderBy('id', 'desc')->get();
            $date = $request->date;
            $size = $request->size;
            $destinations=Destination::where('status',1)->get();
            return view('frontend.booking', compact('date', 'packages', 'size','destinations'));
      }

      public function store(Request $request)
      {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'departure_date' => 'required',
            'package_id' => 'required',
            'destination_id' => 'required',
            'group_size' => 'nullable',
            'message' => 'required'
        ]);
            $userIP = $request->ip();

            $booking= Booking::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'departure_date' => $request->departure_date,
                'package_id' => $request->package_id,
                'group_size' => $request->group_size,
                'message' => $request->message,
                'user_ip' => $userIP,
                'destination_id' => $request->destination_id,
                'source' => $request->source,
                'uuid'=>Str::uuid()
            ]);
            Notification::route('mail', [
                'sales@nepalvisiontreks.com',
                'inquiry@nepalvisiontreks.com',
                $booking->email
            ])->notify(new BookingNotification($booking));

            // $currency=$request->currency;
            // if ($request->bookandpay) {
            //       return redirect()->route('booking.online', ['id' => $request->booking,'cu'=>$currency]);
            // }

            $notification = array(
                  'alert-type' => 'success',
                  'messege' => 'Package Booked Successfully',

            );

            return redirect()->route('booknow.success')->with($notification);
      }




      public function success()
      {
            return view('frontend.success');
      }


}
