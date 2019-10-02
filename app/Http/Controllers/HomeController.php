<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Idea;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */

  public function addIdea(Request $request)
  {

    $idea = new Idea;
    $idea->title = $request->title;
    $idea->description = $request->description;
    $idea->userId = Auth::id();
    $idea->likes = 0;
    $idea->save();

    DB::table('like_status')->insertOrIgnore(
      ['id' => $idea->id, 'userId' => Auth::id(), 'likestatus' => 0]
    );
  }

  public function displayIdea()
  {
    $idea = new Idea;
    $idea = $idea->fresh();
    $likestatus = DB::table('like_status')->orderBy('id', 'desc')->pluck('likeStatus');
    $myideas =  DB::table('like_status')->where('userId', Auth::id())->get();
    $ideas = Idea::orderBy('CREATED_AT', 'desc')->get();
    return view('home')->with('ideas', $ideas)->with("likestatus", $likestatus)->with("myideas", $myideas);
  }
}
