<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
//use Auth
use DB;
class HomeController extends Controller
{
    public function index(){
        $role=Auth::user()->role;

        if($role=='student'){
            return view('student.index');
        }
        if($role=='technician'){
            return view('technician.index');
        }
        else{
            return view('lecturer.index');
        }

    }//end role


    public function Logout(){
        Auth::logout();
        return Redirect()->route('login');
    }

    //Lecturer Profile
    public function LectProfileView(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('lecturer.profile.profile_view',compact('user'));
    }

    public function LectProfileEdit(){
        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('lecturer.profile.profile_edit',compact('editData'));
    }

    public function LectProfileStore(Request $request){
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->staffID = $request->staffID;
      

        if ($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('dashboard/img/profile_img/'.$data->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('dashboard/img/profile_img'),$filename);
            $data['image'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'Profile Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('lecturer.profile.view')->with($notification);
    }//End Method

    //End Lect Profile


    //Technician Profile
    public function TechProfileView(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('technician.profile.profile_view',compact('user'));
    }

    public function TechProfileEdit(){
        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('technician.profile.profile_edit',compact('editData'));
    }

    public function TechProfileStore(Request $request){
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->staffID = $request->staffID;

        if ($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('dashboard/img/profile_img/'.$data->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('dashboard/img/profile_img'),$filename);
            $data['image'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'Profile Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('technician.profile.view')->with($notification);
    }//End Method

    //End Tech Profile

 //Student Profile
 public function StudProfileView(){
    $id = Auth::user()->id;
    $user = User::find($id);
    return view('student.profile.profile_view',compact('user'));
}

public function StudProfileEdit(){
    $id = Auth::user()->id;
    $editData = User::find($id);
    return view('student.profile.profile_edit',compact('editData'));
}

public function StudProfileStore(Request $request){
    $data = User::find(Auth::user()->id);
    $data->name = $request->name;
    $data->email = $request->email;
    $data->phone = $request->phone;
    $data->staffID = $request->staffID;
  

    if ($request->file('image')){
        $file = $request->file('image');
        @unlink(public_path('dashboard/img/profile_img/'.$data->image));
        $filename = date('YmdHi').$file->getClientOriginalName();
        $file->move(public_path('dashboard/img/profile_img'),$filename);
        $data['image'] = $filename;
    }
    $data->save();

    $notification = array(
        'message' => 'Profile Updated Successfully',
        'alert-type' => 'info'
    );

    return redirect()->route('student.profile.view')->with($notification);
}//End Method

//End Stud Profile   
    
//SVHunting module
public function SvhuntingList(){
    $id = Auth::user()->id;
    $user = User::find($id);
    return view('student.svhunting.svhunting_list',compact('user'));
    }

public function SvhuntingView($lect){
    $sv= User::findOrFail($lect);
    return view('student.svhunting.svhunting_view',compact('sv'));
}

public function SvhuntingForm($lect){ 
    $sv= User::findOrFail($lect);
    return view('student.svhunting.svhunting_form',compact('sv'));
}

public function SvhuntingUpload($lect){
    $sv= User::findOrFail($lect);
    return view('student.svhunting.svhunting_form',compact('sv'));
}
public function SvhuntingUploadPost(Request $request,$lect){
    $id = Auth::user()->id;
    $user = User::find($id);
    $sv= User::findOrFail($lect);
    $status= 'PENDING';
    $request->validate([
        'file' => 'required|mimes:pdf,xlx,csv|max:2048',
    ]);
    $fileName = time().'.'.$request->file->extension(); 
    $data=array('student'=>$user->id,"lecterur"=>$sv->id,"file"=>$fileName,"status"=>$status);
    DB::table('proposal')->insert($data);
    echo "Record inserted successfully.<br/>";
    return view('student.svhunting.svhunting_list',compact('user'));
}

public function SvhuntingDelete($lect){
    $id = Auth::user()->id;
    $user = User::find($id);
    $sv= User::findOrFail($lect);
    $data= DB::table('proposal')->where('student',$user->id)->where('lecterur',$sv->id)->delete();
    return view('student.svhunting.svhunting_list',compact('user'));
}

public function SvhuntingUpdate($lect){
    $sv= User::findOrFail($lect);
    return view('student.svhunting.svhunting_update',compact('sv'));
}

public function SvhuntingEdit($lect){
    $sv= User::findOrFail($lect);
    return view('student.svhunting.svhunting_update',compact('sv'));
}
public function SvhuntingEditPost(Request $request,$lect){
    $id = Auth::user()->id;
    $user = User::find($id);
    $sv= User::findOrFail($lect);
    $request->validate([
        'file' => 'required|mimes:pdf,xlx,csv|max:2048',
    ]);
    $fileName = time().'.'.$request->file->extension(); 
    DB::update('update proposal set file=? where student = ? and lecterur = ?',
    [$fileName,$user->id,$sv->id]);
    echo "Record updated successfully.<br/>";
    return view('student.svhunting.svhunting_list',compact('user'));
}

public function SvhuntingDownload($lect){
    $id = Auth::user()->id;
    $user = User::find($id);
    $sv= User::findOrFail($lect);
    $download = DB::table('proposal')->all();
    return view('student.svhunting.svhunting_list',compact('download'));
}
//SVHunting module END



}
