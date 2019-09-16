<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Idea;

class IdeaDetailController extends Controller
{
    
    public function cardData(Request $request)
    {
        $idea = Idea::find($request->id);
      //  dd($idea);
        return view('idea')->with('idea', $idea);
    }

    public function insertLikes(Request $request){
      $idea = Idea::find($request->cardId);
      $idea->likes = $request->likes;
      $idea->save();
    }
}
