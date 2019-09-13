<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $idea->delete();

    }
}
