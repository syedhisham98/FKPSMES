<?php

namespace App\Http\Controllers;
use App\Models\Approval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApprovalController extends Controller
{
  
    public function view()
    {
        $students = Approval::all();
      return view ('approval.index')->with('approval', $students);
    }
    
  
    public function approve(Request $request, $stud_id)
    {
        $students = Approval::find($stud_id);
        $students->update($request->all());
        $students =DB::table('students')
                   ->where ('proposal_status','Pending')
                   ->update(['proposal_status'=>'Approved']);
        return redirect('approval.index')->with('flash_message', 'Proposal Updated!');  
    }

   
    public function reject($stud_id)
    {
        Approval::destroy($stud_id);
        return redirect('approval.index')->with('flash_message', 'Proposal deleted!');  
    }

}