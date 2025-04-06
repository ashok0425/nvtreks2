<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Invoice;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class BuyController extends Controller
{

    public function index($url = null, $date = null)
      {
            $packages = Package::orderBy('id', 'desc')->get();
            $package = null;
            $agents = DB::connection('mysql2')->table('users')->where('email_verified_at', '!=', null)->get();
            if ($url != null) {
                  $package = Package::where('url',$url)->first();
            }
            $currency=request()->query('cu')?request()->query('cu'):'USD';
            return view('frontend.buynow', compact('package', 'date', 'packages', 'agents','currency'));
      }




      public function Step2(Request $request)
      {
            $package = Package::find(1);
            $no_traveller = $request->no_traveller;
            $booking = $request->booking;
            $agent = $request->agent;

            $departure_date = $request->departure_date;
            $currency = $request->currency;

            return view('frontend.step2', compact('package', 'no_traveller', 'booking', 'departure_date', 'agent','currency'));
      }








      public function Store(Request $request)
      {
            $agent = DB::connection('mysql2')->table('users')->where('id', $request->agent)->first()->name;
            $user_agent = $request->server('HTTP_USER_AGENT');
            $userIP = $request->ip();
            // $ipdata = $this->IPtoLocation($userIP);
            // $city = $ipdata['city']['name'];
            // $country = $ipdata['country']['name'];
            // $long = $ipdata['location']['latitude'];
            // $lat = $ipdata['location']['longitude'];

            // dd($data);
            // $no_traveller=count($request->f_name);
            $booking = Package::find($request->booking);
            $booking1 = Booking::create([
                  'package' => $request->booking,
                  'date'       => $request->departure_date,
                  'no_traveller' => $request->no_traveller,
                  'source' => $request->source,
                  'agent' => $request->agent,
                  'type' => 'booking',
                  // 'longitude' => $long,
                  // 'latitude' => $lat,
                  // 'actual_country' => $country,
                  // 'actual_place' => $city,


            ]);
            for ($i = 0; $i < $request->no_traveller-1; ++$i) {
                  // print_r($request['itenerary_outline'][$i]);
                  $customer_detail = new Customer;
                  $customer_detail->fname = $request['f_name'][$i]?$request['f_name'][$i]:'secondary customer';
                  $customer_detail->lname = $request['l_name'][$i]?$request['l_name'][$i]:'secondary customer laste';
                  $customer_detail->detail_mail_address = $request['mailing_address'][$i]?$request['mailing_address'][$i]:'secondary mailing user';
                  $customer_detail->email = $request['email'][$i]?$request['email'][$i]:'example@gmail.com';
                  $customer_detail->phone = $request['phone_day'][$i];
                  // $customer_detail->phone_evening = $request['phone_evening'][$i];
                  // $customer_detail->dob = $request['dob'][$i];
                  $customer_detail->passport_no = '3434';
                  $customer_detail->expiry = '12123';
                  $customer_detail->emergency_contact = $request['emergency_contact'][$i];
                  $customer_detail->country = $request['country'][$i];
                  $customer_detail->booking_id = $booking1->id;
                  $customer_detail->save();
            }


            $data = [
                  'userIP' => $userIP,
                  'email' => $request['email'][0],
                  'departure_date' => $request->departure_date,
                  'dob' => $request->dob,
                  'phone_day' => $request->phone_day,
                  'phone_evening' => $request->phone_evening,
                  'no_traveller' => $request->no_traveller,
                  'title' => $request->title,
                  'name' => $request['f_name'][0],
                  'cast' => $request['l_name'][0],
                  'f_name' => $request->f_name,
                  'l_name' => $request->l_name,
                  'mailing_address' => $request->mailing_address,
                  'myemail12' => $request->email,
                  'country' => $request->country,
                  'occupation' => $request->occupation,
                  // 'mobile' =>$request->mobile,
                  // 'landline'=>$request->landline,
                  'passport_no' => $request->passport_no,
                  'passport_place_issue' => $request->passport_place_issue,
                  'issue_date' => $request->issue_date,
                  'expiry_date' => $request->expiry_date,
                  'emergency_contact' => $request->emergency_contact,
                  'booking' => $booking,
                  'departure_date' => $request->departure_date,
                  'insurance' => $request->insurance,
                  'source' => $agent
            ];
            Mail::send('email.book', $data, function ($message) use ($data) {
                  $message->from('noreply@nepalvisiontreks.com');
                  $message->to('sales@nepalvisiontreks.com');
                  $message->to('inquiry@nepalvisiontreks.com');
                  $message->to($data['email']);
                  $message->subject('booking a package');
            });

            $currency=$request->currency;
            if ($request->bookandpay) {
                  return redirect()->route('booking.online', ['id' => $request->booking,'cu'=>$currency]);
            }

            $notification = array(
                  'alert-type' => 'success',
                  'messege' => 'Successfully Booked a pakage.',

            );

            return redirect()->route('pay.thanku')->with($notification);
      }






      public function payonline($id = null)
      {
            $package = Package::where('id', $id)->first();
            $packages=[];
            if (!$package) {
                  $packages = Package::where('status', 1)->get();
            }
       
            return view('frontend.online_pay', compact('package','packages'));
      }






      public function Confirmation(Request $request)
      {
            
        return view('frontend.confirmpayment',compact('request'));
      }



      public function getPayment(Request $request)
      {
            // return "test";
            // dd($request->all());
            $paymentGatewayID = '';
            $respCode = '';
            $pan = '';
            $amount = '';
            $invoiceNo = '';
            $tranRef = '';
            $approvalCode = '';
            $eci = '';
            $dateTime = '';
            $status = '';

            $data['paymentID'] = $request->paymentGatewayID;
            $data['respCode'] = $request->respCode;
            $data['pan'] = $request->pan;
            // $data['amount'] = $request->Amount;
            $data['invoiceNo'] = $request->invoiceNo;
            $data['tranRef'] = $request->tranRef;
            $data['approvalCode'] = $request->approvalCode;
            $data['eci'] = $request->eci;
            $data['dateTime'] = $request->dateTime;
            $data['email'] = $request->userDefined1;
            $data['amount'] = $request->userDefined2;
            $data['name'] = $request->userDefined4;
            $data['package_name'] = $request->userDefined5;
            $data['status'] = $request->status;
            // dd($data);
            // return view('emails.sendpaymentdetails',$data);
            if ($data['respCode'] == '00') {
                  Mail::send('emails.sendpaymentdetails', $data, function ($message) use ($data) {
                        $message->from('noreply@nepalvisiontreks.com');
                        // $message->to($data['email']);
                        $message->to('info@nepalvisiontreks.com');

                        // $message->bcc('yubraj.misfit@gmail.com');

                        $message->subject('payment received for Nepal Vision');
                        // $message->replyTo($details['email'], $details['fullname']);

                  });
                  return redirect()->route('pay.thankuthanks')->with(['status_message' => 'Thanks for payment', 'alert_type' => 'danger']);
            }
            // return "done";
            return redirect()->route('failed')->with(['status_message' => 'Sorry! Your Payment could not be processed', 'alert_type' => $this->alert_type]);
            // return view('frontend.home.thanks',$data);
      }



      public function thanku()
      {
            return view('frontend.thankyou');
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
}
