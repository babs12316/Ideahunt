<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Idea;
use DB;

class MyIdeasController extends Controller
{
   public function show(){
    $ideas = Idea::orderBy('CREATED_AT', 'desc')->where('userId', Auth::id())->get();
    $likestatus = DB::table('like_status')->where('userId',  Auth::id())->orderBy('id', 'desc')->pluck('likeStatus');
  //  return view('myIdeas')->with('myIdeas',$ideas);

    return view('myIdeas')->with('myIdeas',$ideas)->with("likestatus",$likestatus);
   }

  
  
   
}
