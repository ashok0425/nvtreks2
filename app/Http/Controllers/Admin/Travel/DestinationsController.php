<?php

namespace App\Http\Controllers\Admin\Travel;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class DestinationsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['destinations']= Destination::orderBy('id', 'desc')->get();
        return view('admin.destinations.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.destinations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:255|unique:destinations'
        ]);

            $destination = new Destination;
            $destination->name = $request->name;
            $destination->status = 1;
            $destination->details = $request->details;
            $destination->url = Str::slug($request->name);
            $destination->meta_title = $request->meta_title;
            $destination->meta_keyword = $request->meta_keyword;
            $destination->meta_description = $request->meta_description;
            $destination->image=$this->uploadFile('upload/destination',$request->file('file'));
            $destination->cover_image=$this->uploadFile('upload/destination',$request->file('cover_image'));
            $destination->save();
            $notification=array(
                'alert-type'=>'success',
                'messege'=>'Successfully created destination.',

             );
        return redirect()->route('admin.destinations.index')->with($notification);
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
    public function edit(Destination $destination)
    {
        return view('admin.destinations.edit', compact('destination'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Destination $destination)
    {

        $this->validate($request, [
            'name' => 'required|min:3|max:255|'
        ]);
            $destination->name = $request->name;
            $destination->status = 1;
            $destination->details = $request->details;
            $destination->url = Str::slug($request->name);
            $destination->meta_title = $request->meta_title;
            $destination->meta_keyword = $request->meta_keyword;
            $destination->status = $request->status??0;
            $destination->meta_description = $request->meta_description;
            $destination->image=$this->uploadFile('upload/destination',$request->file('file'))??$destination->image;
            $destination->cover_image=$this->uploadFile('upload/destination',$request->file('cover_image'))??$destination->cover_image;
            $destination->save();
            $notification=array(
                'alert-type'=>'success',
                'messege'=>'Successfully created destination.',

             );


        return redirect()->route('admin.destinations.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Destination $destination)
    {
            $this->deleteFile($destination->image);
            $destination->delete();
            $notification=array(
                'alert-type'=>'success',
                'messege'=>'Successfully deleted destinations.',

             );

        return redirect()->back()->with($notification);
    }

}
