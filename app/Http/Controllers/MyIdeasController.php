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
    $likestatus = DB::table('like_status')->orderBy('id', 'desc')->pluck('likeStatus');

    $myideas =  DB::table('like_status')->where('userId', Auth::id())->get();
  
  //  return view('myIdeas')->with('myideas',$ideas)->with("likestatus",$likestatus);
  return view('home')->with('ideas',$ideas)->with("likestatus",$likestatus)->with("myideas",$myideas);
   }

  
  
   
}
