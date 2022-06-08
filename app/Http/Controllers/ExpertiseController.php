<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Expertise;
use App\Models\Teaching;
use App\Models\Research;
use App\Models\Intellectual;

class ExpertiseController extends Controller
{
    //teaching method
    public function LectTeachingView(){
        $data['allData'] = Teaching::all();
        return view('lecturer.expertise.teaching_view',$data);
    }

    public function LectTeachingAdd(){
        return view('lecturer.expertise.add.teach_add');
    }

    public function LectTeachingStore(Request $request){
        $countClass = count($request->code);
        if($countClass !=NULL){
            for($i=0; $i <$countClass; $i++){
                $teach = new Teaching();
                $teach->code = $request->code[$i];
                $teach->subject = $request->subject[$i];
                $teach->save();
            }//end loop
        }//end if cond

        $notification = array(
            'message' => 'Teaching Info Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('lecturer.teaching.view')->with($notification);
    }//end method

    
    public function LectTeachingDelete($id){
        $user = Teaching::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Teaching Data Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('lecturer.teaching.view')->with($notification);
    }

    //research method
    public function LectResearchView(){
        $data['allData'] = Research::all();
        return view('lecturer.expertise.research_view',$data);
    }

    public function LectResearchAdd(){
        return view('lecturer.expertise.add.research_add');
    }

    public function LectResearchStore(Request $request){
        $countClass = count($request->title);
        if($countClass !=NULL){
            for($i=0; $i <$countClass; $i++){
                $research = new Research();
                $research->title = $request->title[$i];
                $research->role = $request->role[$i];
                $research->save();
            }//end loop
        }//end if cond

        $notification = array(
            'message' => 'Research Info Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('lecturer.research.view')->with($notification);
    }//end method

    
    public function LectResearchDelete($id){
        $user = Research::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Research Data Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('lecturer.research.view')->with($notification);
    }

    //intellectual method
    public function LectIntView(){
        $data['allData'] = Intellectual::all();
        return view('lecturer.expertise.intellect_view',$data);
    }

    public function LectIntAdd(){
        return view('lecturer.expertise.add.intellect_add');
    }

    public function LectIntStore(Request $request){
        $countClass = count($request->name);
        if($countClass !=NULL){
            for($i=0; $i <$countClass; $i++){
                $intellectual = new Intellectual();
                $intellectual->name = $request->name[$i];
                $intellectual->save();
            }//end loop
        }//end if cond

        $notification = array(
            'message' => 'Teaching Info Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('lecturer.intellectual.view')->with($notification);
    }//end method

    
    public function LectIntDelete($id){
        $user = Intellectual::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Intellectual Property Data Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('lecturer.intellectual.view')->with($notification);
    }

    public function StdExpView(){
        $data['lecturers'] = User::where('role','lecturer')->get();
        return view('student.expertise.exp_view',$data);
    }

    
public function StdProView($lect){
    $sv= User::findOrFail($lect);
    $data['teach'] = Teaching::all();
    $data['research'] = Research::all();
    $data['intellect'] = Intellectual::all();
    return view('student.expertise.profile_view',compact('sv'));
}


}
