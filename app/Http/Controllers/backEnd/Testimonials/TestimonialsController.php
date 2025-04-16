<?php

namespace App\Http\Controllers\BackEnd\Testimonials;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Package;
use App\Models\Testimonial;
use App\Models\PackageTestimonial;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;

class TestimonialsController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $testimonials = Testimonial::latest()
        ->when($request->search,function($query) use ($request){
            $query->where('title','like','%'.$request->search.'%')
            ->orWhere('name','like','%'.$request->search.'%')
            ->orWhere('content','like','%'.$request->search.'%');
        })
        ->paginate(20);
        return view('admin.testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $packages = Package::where('status', 1)->get();
        return view('admin.testimonials.create', compact('packages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            // Create and fill testimonial model
            $testimonial = new Testimonial();
            $testimonial->fill([
                'name'          => $request->name,
                'title'         => $request->title,
                'content'       => $request->content,
                'status'        => 1,
                'rating'        => $request->rating,
                'display_home'  => $request->display_home,
                'date'          => $request->date,
            ]);

            // Handle file upload
            if ($request->hasFile('file')) {
                $testimonial->image = $this->uploadFile('upload/testimonial', $request->file('file'));
            }

            $testimonial->save();

            // Insert testimonial-package pivot entries
            if ($request->has('package') && is_array($request->package)) {
                $testimonialPackages = [];

                foreach ($request->package as $packageId) {
                    $testimonialPackages[] = [
                        'testimonial_id' => $testimonial->id,
                        'package_id'     => $packageId,
                    ];
                }

                DB::table('package_testimonial')->insert($testimonialPackages);
            }

            return redirect()->route('admin.testimonials.index')->with([
                'alert-type' => 'success',
                'messege'    => 'Successfully Added Testimonial.',
            ]);

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        $packages = Package::where('status', 1)->get();
        $edit_packages = $testimonial->packages()->select('packages.id','packages.name')->get();

        return view('admin.testimonials.edit', compact('testimonial', 'packages','edit_packages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Testimonial $testimonial)
    {

            $testimonial->name = $request->name;
            $testimonial->title = $request->title;
            $testimonial->content = $request->content;
            $testimonial->status = $request->status??$testimonial->status;
            $testimonial->rating = $request->rating;
            $testimonial->display_home = $request->display_home;
            $testimonial->date = $request->date;

            $banner = $request->file('file');
            if ($banner) {
               $this->deleteFile($testimonial->image);
                $testimonial->image =$this->uploadFile('upload/testimonial',$banner);

            }
            if ($testimonial->save()) {
                $length = count($request->package);
                DB::table('package_testimonial')->where('testimonial_id',$testimonial->id)->delete();
                for ($i = 0; $i < $length; $i++) {
                    $package_testmonial = [];
                    $package_testmonial['package_id'] = $request->package[$i];
                    $package_testmonial['testimonial_id'] = $testimonial->id;
                    DB::table('package_testimonial')->insert($package_testmonial);
                }
            }

            $notification = array(
                'alert-type' => 'success',
                'messege' => 'Successfully Updated Testimonial.',

            );


        return redirect()->route('admin.testimonials.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        try {
            $testimonial = Testimonial::findOrFail($id);
            $this->deleteFile($testimonial->image);

            $testimonial->delete();
            $notification = array(
                'alert-type' => 'success',
                'messege' => 'Successfully Deleted Testimonial.',

            );
        } catch (QueryException $e) {
            $notification = array(
                'alert-type' => 'success',
                'messege' => 'Failed to delete  Testimonial.',

            );
        }

        return redirect()->route('admin.testimonials.index')->with($notification);
    }
}
