<?php

namespace App\Http\Controllers\backEnd;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MainSlider;
use File;
use App\Http\Traits\status;
class BannerController extends Controller
{
    use status;

    public function index(){
        $banners=MainSlider::all();
        return view('admin.banner.index',compact('banners'));
    }


    public function create(){
        return view('admin.banner.create');
    }

    public function store(Request $request){

        $main_sliders=new MainSlider;
        $file=$request->file('image');

        if($file){
            $main_sliders->image=$this->uploadFile('upload/mainslider',$file);
                }
        $main_sliders->title=$request->title;
        $main_sliders->details=$request->details;
        $main_sliders->type=$request->type;
        $main_sliders->link=$request->page;
        $main_sliders->status=$request->status??1;
            $main_sliders->save();
            $notification=array(
                'alert-type'=>'success',
                'messege'=>'Banner Added',

            );
          return redirect()->back()->with($notification);
    }



    public function edit(MainSlider $banner){
        return view('admin.banner.edit',compact('banner'));
    }


    public function update(Request $request,MainSlider $banner){

        $file=$request->file('image');
        if($file){
            $this->deleteFile($banner->image);
            $banner->image=$this->uploadFile('upload/mainslider',$file);
                }
        $banner->title=$request->title;
        $banner->details=$request->details;
        $banner->type=$request->type;
        $banner->link=$request->page;
        $banner->status=$request->status??1;
        $banner->save();
            $notification=array(
                'alert-type'=>'success',
                'messege'=>'Main Banner updated',

            );
            return redirect()->route('admin.banners.index')->with($notification);

}

 public function show()
{
    # code...
}

public function destroy($id)
{
        $main_sliders = MainSlider::findOrFail($id);
        $this->deleteFile($main_sliders->image);
        $main_sliders->delete();
        $notification=array(
            'alert-type'=>'success',
            'messege'=>'Successfully Deleted Banner.',

         );

    return redirect()->route('admin.banners.index')->with($notification);
}

}
