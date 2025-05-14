<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Contact;
use App\Models\Newsletter;
use App\Models\Website;
use App\Notifications\EnquiryReceived;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use Str;
class ContactController extends Controller
{

      public function index()
      {
            $detail = Website::where('id', 1)->first();
            return view('frontend.contact', compact('detail'));
      }



      public function Store(Request $request)
      {
          if (Str::contains($request->email,  ".godaddy")) {
                abort(403);
              }

              $validator = Validator::make($request->all(), [
                'first_name' => 'required_without:name',
                'name' => 'required_without:first_name',
                'email' => 'required|email',
                'message' => 'required',
                'g-recaptcha-response' => 'required|captcha',
            ]);

            if ($validator->fails()) {
                $notification = [
                    'alert-type' => 'error',
                    'messege' => implode("\n", $validator->errors()->all()),
                ];
                return redirect()->back()->withInput()->with($notification);
            }
                  $contact = new Contact;
                  $contact->name = $request->name??$request->first_name.''.$request->last_name;
                  $contact->email = $request->email;
                  $contact->phone = $request->phone;
                  $contact->comment = $request->message;
                  $contact->page = $request->message;
                  $contact->save();
                  $userIP = $request->ip();
                  $data = [
                        'name' => $contact->name,
                        'email' => $request->email,
                        'phone' => $request->phone,
                        'subject' => 'Enquiry Email',
                        'comment' => $contact->comment,
                        'user_info' => " IP:<a href='https://www.ip-tracker.org/locator/ip-lookup.php?ip={$userIP}'>Click here to view more info :{$userIP}</a>",
                        'source' => $request->source,
                  ];

                  Notification::route('mail', 'ashokmehta1234y@gmail.com')
                  ->notify(new EnquiryReceived($data));

                  $notification = array(
                        'alert-type' => 'success',
                        'messege' => 'Query placed sucessfully.',

                  );

            return redirect()->back()->with($notification);
      }




      function IPtoLocation($ip)
      {
            $apiURL = 'https://api.geoapify.com/v1/ipinfo?apiKey=ba7648986b064e67a1418a20662a6dba';

            // Make HTTP GET request using cURL
            $ch = curl_init($apiURL);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $apiResponse = curl_exec($ch);

            curl_close($ch);

            // Retrieve IP data from API response
            $ipData = json_decode($apiResponse, true);

            // Return geolocation data
            return !empty($ipData) ? $ipData : false;
      }




      public function subscribeStore(Request $request)
      {
            if (Str::contains($request->email,  ".godaddy")) {
                            abort(403);
            }

            $request->validate([
                'email' => 'required|email'
            ]);

            try {
                  //code...
                  $newsletter = new Newsletter;
                  $newsletter->email = $request->email;
                  $newsletter->save();
                  $notification = array(
                        'alert-type' => 'success',
                        'messege' => 'Newsletter subscribed sucessfully.',

                  );
            } catch (\Throwable $th) {
                  $notification = array(
                        'alert-type' => 'error',
                        'messege' => 'Failed to subscribed. Try again.',

                  );
            }
            return redirect()->back()->with($notification);
      }
}
