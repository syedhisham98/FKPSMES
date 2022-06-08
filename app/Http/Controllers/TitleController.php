<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\TitleModel;

class TitleController extends Controller
{
    public function titleAdd(Request $req){

        $title = new TitleModel;
        $title->titleName = $req->titleName;
        $title->titleObj= $req->titleObj;
        $title->titleScope = $req->titleScope;
        $title->titleBackground = $req->titleBackground;
        $title->titleSoftware = $req->titleSoftware;
        $title->titleTool = $req->titleTool;
        $title->save();
        return redirect()->route('title.lists');

    }

    public function addTitle(){
        return view('lecturer.title.titleAdd');
    }

    public function TitleStudList(){
        $data=TitleModel::all();
        return view('student.title.title_list',['titlestuds' => $data]);
    }

    public function TitleLectList(){
        $data=TitleModel::all();
        return view('lecturer.title.title_list',['titlelects' => $data]);
    }

    public function TitleStud(){
        $data=TitleModel::all();
        return view('student.title.title_view',['title' => $data]);
    }

    public function TitleLect(){
        $data=TitleModel::all();
        return view('lecturer.title.title_view',['titles' => $data]);
    }

    public function delete($titleID){

        $data=TitleModel::destroy($titleID);
        // $data->delete();
        return redirect()->route('title.lists');
    }



    // public function TitleStudView(){
    //     $id = Auth::user()->id;
    //     $user = User::find($id);

    //     $title = TitleModel::all();
    //     return view('student.title.title_view'), [''];
    // }


}
