<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Str;
class BlogController extends Controller
{

public function index(Request $request){
     $blogs=Blog::orderBy('id','desc')->where('status',1)->where('title','!=',null)
     ->when($request->keyword,function($query) use ($request){
          $query->where('title','LIKE',"%$request->keyword%")->orWhere('long_description','LIKE',"%$request->keyword%");
     })->paginate(12);
     $recentBlogs=Blog::where('status',1)->inRandomOrder()->where('title','!=',null)->limit(5)->get();
     return view('frontend.blog',compact('blogs','recentBlogs'));
}


public function show($url){
    $blog=Blog::orderBy('id','desc')->where('status',1)->where('id',$url)->orwhere('slug',$url)->first();
     if (!$blog) {
        return redirect('/blogs');
     }
     $recentBlogs=Blog::where('status',1)->inRandomOrder()->where('title','!=',null)->limit(5)->get();
       $next=Blog::where('status',1)->inRandomOrder()->where('title','!=',null)->first();
       $prev=Blog::where('status',1)->inRandomOrder()->where('title','!=',null)->first();

     return view('frontend.blog_detail',compact('blog','recentBlogs','next','prev'));
}


}
