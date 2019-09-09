<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Idea;
use Illuminate\Support\Facades\Auth;
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
        $idea->save();
    }

    public function displayIdea()
    {  
        $idea = new Idea;
        $idea= $idea->fresh();
    //    $ideas = Idea::orderBy('CREATED_AT', 'desc')->where('userId', Auth::id())->get();
        $ideas = Idea::orderBy('CREATED_AT', 'desc')->get();
        return view('home')->with('ideas',$ideas);
    }
 
}
