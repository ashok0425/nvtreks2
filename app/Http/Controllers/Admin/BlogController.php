<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $blogs = Blog::when($request->search, function ($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%')
            ->orWhere('long_description', 'like', '%' . $search . '%');
            })->latest()->paginate(15);
       return view('admin.blog.index',compact('blogs'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

       return view('admin.blog.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function store(Request $request)
     {
         // Validate input
         $request->validate([
             'title' => 'required|string|max:255',
             'long_description' => 'required',
             'thumbnail' => 'nullable|image',
             'cover_image' => 'nullable|image',
         ]);

             // Upload images if available
             $thumbnail = $request->hasFile('thumbnail')
                 ? $this->uploadFile('upload/blog', $request->file('thumbnail'))
                 : null;

             $coverImage = $request->hasFile('cover_image')
                 ? $this->uploadFile('upload/blog', $request->file('cover_image'))
                 : null;

             // Create blog
             $blog = new Blog();
             $blog->title = $request->title;
             $blog->slug = Str::slug($request->url ?? $request->title);
             $blog->thumbnail = $thumbnail;
             $blog->cover_image = $coverImage;
             $blog->display_homepage = $request->display_homepage ?? false;
             $blog->meta_title = $request->meta_title;
             $blog->meta_description = $request->meta_description;
             $blog->meta_keyword = $request->meta_keyword;
             $blog->mobile_title = $request->mobile_title;
             $blog->mobile_description = $request->mobile_description;
             $blog->mobile_keyword = $request->mobile_keyword;
             $blog->status = 1;
             $blog->long_description = $request->long_description;
             $blog->save();

             // Clear cache
             Cache::forget('blogs');

             return redirect()->route('admin.blogs.index')->with([
                 'alert-type' => 'success',
                 'messege' => 'Blog created successfully.',
             ]);

     }


    public function edit(Blog $blog)
    {
        return view('admin.blog.edit',compact('blog'));
    }


    public function update(Request $request,Blog $blog)
    {

       // Validate input
       $request->validate([
        'title' => 'required|string|max:255',
        'long_description' => 'required',
        'thumbnail' => 'nullable|image',
        'cover_image' => 'nullable|image',
    ]);

        // Upload images if available
        $thumbnail = $request->hasFile('thumbnail')
            ? $this->uploadFile('upload/blog', $request->file('thumbnail'))
            : $blog->thumbnail;

        $coverImage = $request->hasFile('cover_image')
            ? $this->uploadFile('upload/blog', $request->file('cover_image'))
            : $blog->cover_image;

        // Create blog
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->url ?? $request->title);
        $blog->thumbnail = $thumbnail;
        $blog->cover_image = $coverImage;
        $blog->display_homepage = $request->display_homepage ?? false;
        $blog->meta_title = $request->meta_title;
        $blog->meta_description = $request->meta_description;
        $blog->meta_keyword = $request->meta_keyword;
        $blog->mobile_title = $request->mobile_title;
        $blog->mobile_description = $request->mobile_description;
        $blog->mobile_keyword = $request->mobile_keyword;
        $blog->status = $request->status;
        $blog->long_description = $request->long_description;
        $blog->save();

        // Clear cache
        Cache::forget('blogs');

        return redirect()->route('admin.blogs.index')->with([
            'alert-type' => 'success',
            'messege' => 'Blog created successfully.',
        ]);

    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
            $notification=array(
                'alert-type'=>'success',
                'messege'=>'Successfully deleted .',

             );

        return redirect()->back()->with($notification);
    }











    protected function active($id,$table){
        DB::table($table)->where('ID',$id)->update([
             'post_status'=>'publish',
         ]);
         $notification=array(
             'alert-type'=>'success',
             'messege'=>'Status: Activated.',

          );
          return redirect()->back()->with($notification);
     }

     protected function deactive($id,$table){
        DB::table($table)->where('ID',$id)->update([
            'post_status'=>'disable',
        ]);
        $notification=array(
            'alert-type'=>'info',
            'messege'=>'Status: Deactivated',

         );
         return redirect()->back()->with($notification);
    }



    private function toAscii($str) {
        $clean = preg_replace('~[^\\pL\d]+~u', '-', $str);
        $clean = strtolower(trim($clean, '-'));

        return $clean;
    }

    public function uploadimage(Request $request){
        $request->validate([
            'upload' => 'required|image'
        ]);

        $path = $request->file('upload')->store('uploads', ['disk' => 's3']);

        return ["url" => getFilePath($path)];
    }

}
