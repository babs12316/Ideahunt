<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Idea;

class IdeaDetailController extends Controller
{
    public function cardData(Request $request)
    {
        $idea = Idea::find($request->id);
        return view('idea')->with('idea', $idea);
    }

    public function insertLikes(Request $request){
        $idea = new Idea;
        $idea->id=$request->cardId;
        $idea->likes= $request->likes;
        Idea::where('id', $idea->id)
         ->update(['likes' => $idea->likes]);
          $idea->save();  
    }
}
