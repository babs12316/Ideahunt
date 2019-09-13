<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Idea;

class MyIdeasController extends Controller
{
   public function show(){
    $ideas = Idea::orderBy('CREATED_AT', 'desc')->where('userId', Auth::id())->get();
    return view('myIdeas')->with('myIdeas',$ideas);
   }

  
  
   
}
