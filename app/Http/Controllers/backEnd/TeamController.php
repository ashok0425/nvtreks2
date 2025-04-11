<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeamController extends Controller
{

    public function index(Request $request)
    {
        $teams=Team::latest()->paginate(10);
       return view('admin.team.index',compact('teams'));
    }

    public function create()
    {
       return view('admin.team.create');

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
            'name'=>'required|max:255',
            'thumbnail'=>'required|mimes:jpg,jpeg,png,webp'

        ]);

                $thumbnail=$this->uploadFile('upload/team',$request->thumbnail)??null;
                $team=new Team();
                $team->name=$request->name;
                $team->thumbnail=$thumbnail;
                $team->content=$request->content;
                $team->position=$request->position;
                $team->save();
                $notification=array(
                    'alert-type'=>'success',
                    'messege'=>'Team  Added',

                 );
                 return redirect()->route('admin.teams.index')->with($notification);

    }

    public function edit(Team $team)
    {
        return view('admin.team.edit',compact('team'));
    }


    public function update(Request $request,Team $team)
    {
        $request->validate([
            'name'=>'required|max:255',
            'thumbnail'=>'nullable|mimes:jpg,jpeg,png,webp'

        ]);

                $thumbnail=$this->uploadFile('upload/team',$request->thumbnail)??$team->thumbnail;
                $team->name=$request->name;
                $team->thumbnail=$thumbnail;
                $team->content=$request->content;
                $team->position=$request->position;
                $team->save();
                $notification=array(
                    'alert-type'=>'success',
                    'messege'=>'Team  Updated',

                 );
                 return redirect()->route('admin.teams.index')->with($notification);

    }

    public function destroy($id)
    {
        Team::where('id',$id)->delete();
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
