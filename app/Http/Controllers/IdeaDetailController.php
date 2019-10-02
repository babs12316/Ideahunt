<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Idea;
use Illuminate\Support\Facades\DB;

class IdeaDetailController extends Controller
{

  public function cardData(Request $request)
  {
    $idea = Idea::find($request->id);
    $likestatus = DB::table('like_status')->where([
      ['id', '=', $request->id],
      ['userId', '=', Auth::id()],
    ])->pluck('likeStatus');
    return view('idea')->with('idea', $idea)->with("likestatus",$likestatus);
  }

  public function insertLikes(Request $request)
  {

    DB::table('like_status')->insertOrIgnore(
      ['id' => $request->cardId, 'userId' => Auth::id(), 'likeStatus' =>$request->likestatus]
    );

    DB::table('like_status')
      ->where([
        ['id', '=', $request->cardId],
        ['userId', '=', Auth::id()],
      ])->update(['likeStatus' => $request->likestatus]);

     $countLikes= DB::table('like_status')->where
     ([
      ['id', '=', $request->cardId],
      ['likeStatus', '=', 1],
  ])->count('likeStatus');

  $idea = Idea::find($request->cardId);
   $idea->likes =  $countLikes;
    $idea->save();

    print_r($countLikes);
 
   
   
   
  }


  /*public function deleteLikes(Request $request){

    DB::table('like_status')->where('id', '=', $request->id)->delete();
    return redirect()->action('ModifyIdeaController@delete');
  }*/

}


