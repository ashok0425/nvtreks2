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






public function filterBlog(Request $request){
    $from= Carbon::parse($request->from)->format('Y-m-d');
    $to= Carbon::parse($request->to)->format('Y-m-d');
// $query='SELECT * FROM blogs WHERE post_date BETWEEN $from AND $to AND post_status='publish'";
     $blogs=Blog::orderBy('ID','desc')->where('post_status','publish')->where('post_title','!=',null)->whereBetween('post_date',[$from,$to])->get();
$data='';

if(count($blogs)<=0){
     return "<div class='col-md-4 col-sm-12  my-5 offset-md-4 text-danger custom-fw-700 custom-fs-25'>No Data Found</div>";

}
     foreach ($blogs as $blog) {
          $data.="<div class='col-md-4 col-sm-12  my-2'>
          <div class='post-card-1 card'>
              <a href='". route('blog.detail',['id'=>$blog->ID]) ."'>
              <div class='img-container'>";
                  if ($blog->guid!=null && file_exists($blog->guid))
                  {
                    $data.="<img src='". getImageurl($blog->guid)."'  class='img-fluid w-100'>";
                  }else
                  {
                    $data.=   "<img src='". getImageurl('frontend/assets/recent-post.png')."' alt='IMG' class='img-fluid'  >";
                  }
                  $data.= "<div class='date'>
                      <span>".
                       Carbon::parse($blog->post_date)->format('d')."
                  </span>
                       ". Carbon::parse($blog->post_date)->format('M Y') ."

                  </div>
              </div>
              <div class='px-2'>

              <div class='img-desc'>
                  <h2 class='custom-fs-18 text-dark custom-fw-700'>". Str::limit($blog->post_title,35) ."</h2>
              </div>
          </div>
              </a>
          </div>
      </div>";
     }
     return $data;

}

}
