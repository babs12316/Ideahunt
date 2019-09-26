<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Idea;
class ModifyIdeaController extends Controller
{
    public function edit(Request $request){
        $idea = Idea::where('id', $request->id)->get();
         return view('modifyIdea')->with('myidea',$idea);
       }

       public function update(Request $request){
        $idea = Idea::find($request->id);
        $idea->title =$request->title;
        $idea->description =$request->description;
        $idea->save();

    }

    public function delete(Request $request){
     
        $idea = Idea::find($request->id);
        DB::table('like_status')->where('id', '=', $request->id)->delete();
        $idea->delete();
    
    //    DB::table('like_status')->where('id', '=', $request->id)->delete();

    }
}
