<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\ManageInventoryModel;
use DB;

class ManageInventoryController extends Controller
{
    public function std_InventoryHome(){
    $id = Auth::user()->id;
    $user = User::find($id);
    return view('ManageInventoryUsage.std_InventoryHome',compact('user'));
    }

    public function std_MakeRequest(){

    $id = Auth::user()->id;
    $user = User::find($id);
    //get lect id and name by roles
    $lname = 'lecturer';
    $l_id = User::where('role', $lname)->value('id');
    
    $sv_name = User::where('role', $lname)->value('name');
    return view('ManageInventoryUsage.std_MakeRequest',compact('user', 'sv_name', 'id', 'l_id'));
    }

    public function std_StatusRequest(){

    $id = Auth::user()->id;
    $user = User::find($id);
    //get lect id and name by roles
    $lname = 'lecturer';
    $l_id = User::where('role', $lname)->value('id');
    
    $sv_name = User::where('role', $lname)->value('name');


    
    $items = ManageInventoryModel::all();
    return view('ManageInventoryUsage.std_Status', compact('user', 'sv_name'), ['items' => $items]);
    }

    public function lect_RequestPage()
    {
        $id = Auth::user()->id;
        $user = User::find($id);

        $items = ManageInventoryModel::all();
        return view('ManageInventoryUsage.lect_StudentRequest', compact('user'), ['items' => $items]);
    }

    public function tech_RequestPage()
    {
        $id = Auth::user()->id;
        $user = User::find($id);

        $items = ManageInventoryModel::all();
        return view('ManageInventoryUsage.tech_StudentRequest', compact('user'), ['items' => $items]);
    }

    public function tech_View($id)
    {
        $items = ManageInventoryModel::find($id);
        return view('ManageInventoryUsage.tech_date', ['items' => $items]);
    } 

    public function update(Request $req )
    {

        $items = ManageInventoryModel::find($req->id);
        $items->date_take = $req->take;
        $items->date_return = $req->return;
        $items->save();
        return redirect('tech_View');

    }
    
    


    public function make_Request(Request $request)
    {

        $inventory = new ManageInventoryModel;
        $inventory->stud_Name=$request->stdname;
        $inventory->lect_Name=$request->lectname;
        $inventory->stud_id=$request->stud_id;
        $inventory->lect_id=$request->lect_id;
        $inventory->item_Name=$request->name;
        $inventory->item_Description=$request->description;
        $inventory->quantity=$request->quantity;

        $inventory->save();
        return redirect('std_Inventory_Home');

        
    }

    public function update_Request(Request $request)
    {

        $inventory = ManageInventoryModel::find($request->id);
        $inventory->status = $request->status;
        $inventory->save();
        return redirect('lect_Request');

        
    }
    

   
}
