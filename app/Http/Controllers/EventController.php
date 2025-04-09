<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Package;

class EventController extends Controller
{

public function index(){
     $events=Event::where('status',1)->where('title','!=',null)->orderBy('end_date','desc')->paginate(12);
     return view('frontend.event',compact('events'));
}




public function show($id){
     $event=Event::orderBy('id','desc')->where('status',1)->where('id',$id)->first();
     $mores=Event::where('status',1)->inRandomOrder()->where('title','!=',null)->limit(5)->get();
       $next=Event::where('status',1)->inRandomOrder()->where('title','!=',null)->first();
       $prev=Event::where('status',1)->inRandomOrder()->where('title','!=',null)->first();

     return view('frontend.event_view',compact('event','mores','next','prev'));
}






}
