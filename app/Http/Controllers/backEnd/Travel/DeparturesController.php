<?php

namespace App\Http\Controllers\BackEnd\Travel;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Departure;
use App\Models\Package;
use Illuminate\Http\Request;

class DeparturesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $departures = Departure::with('package')
        ->when($request->search,function($query) use($request){
            $query->WhereHas('package',function($q) use ($request){
            return $q->where('name','like','%'.$request->search.'%');
        });
        })
        ->latest()->paginate(20);
        return view('admin.departure.index',compact('departures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $packages=Package::orderBy('name')->where('status',1)->get();

        return view('admin.departure.create', compact('packages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'package_id'=>'required',
            'start_date'=>'required',

        ]);
            //code...
            foreach ($request->start_date as $key => $date) {
                $departure = new Departure();
                $departure->start_date = $date;
                $departure->end_date = $request->end_date[$key] ?? null;
                $departure->total_seats = $request->total_seats[$key] ?? 0;
                $departure->show_on_home_page = $request->show_on_home_page[$key] ?? 0;
                $departure->package_id = $request->package_id;
                $departure->status = 1;
                $departure->save();
            }

            $notification=array(
                'alert-type'=>'success',
                'messege'=>'Departure Added Successfully',

             );
        return redirect()->route('admin.departures.index')->with($notification);
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
    public function edit(Departure $departure)
    {
        $packages=Package::where('status',1)->orderBy('name')->get();
        return view('admin.departure.edit', compact('departure','packages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Departure $departure)
    {

            $departure->start_date=$request->start_date;
            $departure->package_id=$request->package_id;
            $departure->end_date = $request->end_date ?? null;
            $departure->total_seats = $request->total_seats ?? $departure->total_seats;
            $departure->show_on_home_page = $request->show_on_home_page ?? $departure->show_on_home_page;
            $departure->status=$request->status??1;
            $departure->save();
            $notification=array(
                'alert-type'=>'success',
                'messege'=>'Departure updated',
             );


        return redirect()->route('admin.departures.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Departure $departure)
    {

            $departure->delete();
            $notification=array(
                'alert-type'=>'success',
                'messege'=>' Departure Deleted',

             );
    return redirect()->route('admin.departures.index')->with($notification);

}
}
