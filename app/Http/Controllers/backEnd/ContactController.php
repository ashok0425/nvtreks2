<?php

namespace App\Http\Controllers\backEnd;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class ContactController extends Controller
{

    public function index()
    {
        $contacts=DB::table('contacts')->orderBy('id','desc')->paginate(20);
       return view('admin.contact.index',compact('contacts'));
    }


}
