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
}
