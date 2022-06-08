<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Logbook;

class LogbookController extends Controller
{
    public function savelogbook(Request $request) {
        
        $newlogbook = new logbook;
        $newlogbook->name = $request->name;
        $newlogbook->student_id = $request->studentid;
        $newlogbook->title = $request->title;
        $newlogbook->meetdate= $request->meet_date;
        $newlogbook->starttime= $request->start_time;
        $newlogbook->endtime = $request->end_time;
        $newlogbook->progress = $request->progress;
        $newlogbook->details = $request->detail;
        $newlogbook->plan = $request->plan;
        $newlogbook->status = "pending";
        $newlogbook->save();

        return view('LogBookForm');
    }
}
