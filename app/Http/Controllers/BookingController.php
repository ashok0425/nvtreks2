<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Models\Destination;
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



            // $data = [
            //       'userIP' => $userIP,
            //       'email' => $request['email'][0],
            //       'departure_date' => $request->departure_date,
            //       'dob' => $request->dob,
            //       'phone_day' => $request->phone_day,
            //       'phone_evening' => $request->phone_evening,
            //       'no_traveller' => $request->no_traveller,
            //       'title' => $request->title,
            //       'name' => $request['f_name'][0],
            //       'cast' => $request['l_name'][0],
            //       'f_name' => $request->f_name,
            //       'l_name' => $request->l_name,
            //       'mailing_address' => $request->mailing_address,
            //       'myemail12' => $request->email,
            //       'country' => $request->country,
            //       'occupation' => $request->occupation,
            //       'passport_no' => $request->passport_no,
            //       'passport_place_issue' => $request->passport_place_issue,
            //       'issue_date' => $request->issue_date,
            //       'expiry_date' => $request->expiry_date,
            //       'emergency_contact' => $request->emergency_contact,
            //       'booking' => $booking,
            //       'departure_date' => $request->departure_date,
            //       'insurance' => $request->insurance,
            //       'source' => $request->source
            // ];
            // Mail::send('email.book', $data, function ($message) use ($data) {
            //       $message->from('noreply@nepalvisiontreks.com');
            //       $message->to('sales@nepalvisiontreks.com');
            //       $message->to('inquiry@nepalvisiontreks.com');
            //       $message->to($data['email']);
            //       $message->subject('booking a package');
            // });

            // // $currency=$request->currency;
            // // if ($request->bookandpay) {
            // //       return redirect()->route('booking.online', ['id' => $request->booking,'cu'=>$currency]);
            // // }

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
