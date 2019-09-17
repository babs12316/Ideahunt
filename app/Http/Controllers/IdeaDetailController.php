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
    return view('idea')->with('idea', $idea);
  }

  public function insertLikes(Request $request)
  {

  /*  DB::table('like_status')->insertOrIgnore(
      ['id' => $request->cardId, 'userId' => Auth::id(), 'likestatus' =>0]
    );
*/
    DB::table('like_status')
      ->where([
        ['id', '=', $request->cardId],
        ['userId', '=', Auth::id()],
      ])->update(['likestatus' => $request->likestatus]);

     $countLikes= DB::table('like_status')->where
     ([
      ['id', '=', $request->cardId],
      ['likeStatus', '=', '1'],
  ])->count('likeStatus');



   // if ($request->likestatus == "true") {
      $idea = Idea::find($request->cardId);
      $idea->likes = $countLikes;
      $idea->save();
    //}
  }
}
