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
            'departure_date' => 'nullable',
            'package_id' => 'required',
            'destination_id' => 'nullable',
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
                'group_size' => $request->group_size??1,
                'message' => $request->message,
                'user_ip' => "<a href='https://www.ip-tracker.org/locator/ip-lookup.php?ip={$userIP}'>Click here to view more info :{$userIP}</a>",
                'type'=>$request->type??1,
                'amount'=>$request->amount??1,
                'destination_id' => $request->destination_id??8,
                'source' => $request->source,
                'uuid'=>Str::uuid()
            ]);
            Notification::route('mail', [
                'sales@nepalvisiontreks.com',
                $booking->email
            ])->notify(new BookingNotification($booking));
            $package=Package::find($request->package_id);
            $Pname=$package?->name;
            // $currency=$request->currency;
            if ($request->type==2) {
                return redirect("https://pay.nepalvisiontreks.com/?productName=$Pname&currency=USD&amount=$request->amount");
            }

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
