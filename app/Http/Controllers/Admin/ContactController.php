<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Svg\Tag\Rect;

class ContactController extends Controller
{

    public function index()
    {
        $contacts=DB::table('contacts')->orderBy('id','desc')->paginate(20);
       return view('admin.contact.index',compact('contacts'));
    }

    public function subscriber(Request $request)
    {
        $subscribers=Newsletter::latest()
        ->when($request->search,function($query) use ($request){
            $query->where('email','LIKE','%'.$request->search.'%');
        })
        ->paginate(20);
       return view('admin.subscriber.index',compact('subscribers'));
    }


}
