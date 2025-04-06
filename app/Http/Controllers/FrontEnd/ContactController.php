<?php

namespace App\Http\Controllers\FrontEnd;

use App\Homesection;
use App\Http\Controllers\Controller;
use App\Models\Destination;
use App\Models\MainSlider;
use App\Models\Package;
use App\Models\SectionControl;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Contact;
use App\Models\Newsletter;
use App\Models\Website;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
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
           $request->validate([
                  'fname' => 'required',
                  'email' => 'required|email',
                  'comment' => 'required',


            ]);
            // try {
                  //code...
                  $contact = new Contact;
                  $contact->name = $request->fname.' '.$request->lname;
                  $contact->email = $request->email;
                  $contact->phone = $request->phone;
                  $contact->comment = $request->comment;
                  $contact->save();

                  $user_agent = $request->server('HTTP_USER_AGENT');
                  $userIP = $request->ip();
                  // $ipdata = $this->IPtoLocation($userIP);
                  // $city = $ipdata['city']['name'];
                  // $country = $ipdata['country']['name'];
                  // $long = $ipdata['location']['latitude'];
                  // $lat = $ipdata['location']['longitude'];
                  $agent = DB::connection('mysql2')->table('users')->first()->name;
                  $data = [
                        'name' => $request->name,
                        'myemail' => $request->email,
                        'subject' => 'Inquiry',
                        'mycontact' => $request->phone,
                        'mycomment' => $request->comment,
                        'country' => $request->country,
                        'no_participants' => $request->no_participants,
                        'expected_date' => $request->expected_date,
                        'package_name' => $request->package_name,
                        'user_info' => " IP:<a href='https://www.ip-tracker.org/locator/ip-lookup.php?ip={$userIP}'>Click here to view more info :{$userIP}</a>",
                        'source' => $agent
                  ];

                  // return view('emails.contactus',$data);
                  $result = Mail::send('email.enquiry', $data, function ($message) use ($data) {
                        $message->from('noreply@nepalvisiontreks.com', 'Nepal Vision');
                        $message->subject($data['subject']);
                        $message->to('reservation@nepalvisiontreks.com');
                        // $message->bcc('yubraj.misfit@gmail.com');
                  });






                  $notification = array(
                        'alert-type' => 'success',
                        'messege' => 'Query placed sucessfully.',

                  );
            // } catch (\Throwable $th) {
            //       $notification = array(
            //             'alert-type' => 'error',
            //             'messege' => 'Failed to place query. Try again.',

            //       );
            // }
            return redirect()->back()->with($notification);
      }



      public function Enquery(Request $request)
      {
          if (Str::contains($request->email,  ".godaddy")) {
                abort(403);

              }
            $request->validate([
                  'g-recaptcha-response' => 'required|captcha',
              ]);

            $userIP = $request->ip();
            $ipdata = $this->IPtoLocation($userIP);

            $request->validate([
                  'name' => 'required',
                  'email' => 'required|email',

            ]);
            $user_agent = $request->server('HTTP_USER_AGENT');
            $userIP = $request->ip();
            // $ipdata = $this->IPtoLocation($userIP);
            // $city = $ipdata['city']['name'];
            // $country = $ipdata['country']['name'];
            // $long = $ipdata['location']['latitude'];
            // $lat = $ipdata['location']['longitude'];
            $booking = Booking::create([
                  'package' => $request->package_name,
                  'date'   => $request->expected_date,
                  'source' => $request->source,
                  'name'  => $request->name,
                  'agent' => $request->agent,
                  'email' => $request->email,
                  'phone' => $request->phone,
                  'comment' => $request->comment,
                  'type' => 'enquiry',
                  'no_traveller' => $request->no_participants,
                  'country' => $request->country,
                  'expected_date' => $request->expected_date
            ]);
            $agent = DB::connection('mysql2')->table('users')->where('id', $request->agent)->first()->name;
            $data = [
                  'name' => $request->name,
                  'myemail' => $request->email,
                  'subject' => ($request->subject) ? $request->subject : 'Inquiry',
                  'mycontact' => $request->phone,
                  'mycomment' => $request->comment,
                  'country' => $request->country,
                  'no_participants' => $request->no_participants,
                  'expected_date' => $request->expected_date,
                  'package_name' => $request->package_name,
                  'user_info' => " IP:<a href='https://www.ip-tracker.org/locator/ip-lookup.php?ip={$userIP}'>Click here to view more info :{$userIP}</a>",
                  'source' => $agent
            ];

            // return view('emails.contactus',$data);
            $result = Mail::send('email.enquiry', $data, function ($message) use ($data) {
                  $message->from('noreply@nepalvisiontreks.com', 'Nepal Vision');
                  $message->subject($data['subject']);
                  $message->to('inquiry@nepalvisiontreks.com');
                  // $message->bcc('yubraj.misfit@gmail.com');
            });


            $notification = array(
                  'alert-type' => 'success',
                  'messege' => 'Thank you for contacting us.',

            );

            return redirect()->route('pay.thanku')->with($notification);
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
