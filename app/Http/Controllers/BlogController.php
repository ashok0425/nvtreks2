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
     $seo=[
        'meta_title' => 'Blog & Articles |Nepal Vision Treks & Expedition',
        'meta_keyword' =>'Blog',
        'meta_description' => 'Nepal Vision Blog is packed with different articles in the tourism field.',
        'mobile_meta_title' => 'Blog & Articles |Nepal Vision Treks & Expedition',
        'mobile_meta_keyword' =>'Blog',
        'mobile_meta_description' => 'Nepal Vision Blog is packed with different articles in the tourism field.',
    ];
     return view('frontend.blog',compact('blogs','recentBlogs','seo'));
}


public function show($url){
    $blog=Blog::orderBy('id','desc')->where('status',1)->where('id',$url)->orwhere('slug',$url)->first();
     if (!$blog) {
        return redirect('/blogs');
     }
     $recentBlogs=Blog::where('status',1)->inRandomOrder()->where('title','!=',null)->limit(5)->get();
       $next=Blog::where('status',1)->inRandomOrder()->where('title','!=',null)->first();
       $prev=Blog::where('status',1)->inRandomOrder()->where('title','!=',null)->first();
       $seo = [
        'meta_title' => $blog->meta_title,
        'meta_description' => $blog->meta_description,
        'meta_keyword' => $blog->keywords,

        'mobile_meta_title' => $blog->mobile_title ?? $blog->meta_title,
        'mobile_meta_description' => $blog->mobile_description ?? $blog->meta_description,
        'mobile_meta_keyword' => $blog->mobile_keyword ?? $blog->keywords,

        'image' => getImageurl($blog->guid),
    ];

     return view('frontend.blog_detail',compact('blog','recentBlogs','next','prev','seo'));
}


}
