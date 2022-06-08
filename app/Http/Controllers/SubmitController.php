<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;
use App\Models\Submit;

class SubmitController extends Controller 
{
   public function submitForm()
   {
     return view('approval.submit');
   }

   public function submit(Request $request)
   {
    $request->validate([
      'file' => 'required|mimes:csv,txt,xlx,xls,pdf|max:2048'
      ]);

      $fileModel = new Submit();

      if($request->file()) {
          $fileName = time().'_'.$request->file->getClientOriginalName();
          $filePath = $request->file('file')->storeAs('uploads', $fileName,'public');

          $fileModel->name = time().'_'.$request->file->getClientOriginalName();
          $fileModel->file_path = '/storage/' . $filePath;
          $fileModel->save();

          return back()
          ->with('success','File has been uploaded.')
          ->with('file', $fileName);
   }
  }
}