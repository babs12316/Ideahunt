<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class test extends Controller
{
    public function index()
    {
        $id = Auth::id();
      //  dd($id);
       $ideas = DB::table('users')->where('id', '=', $id)->get();
      return view('home')->with('ideas',$ideas);
    //  return view('home')->with('name','deepak');
}
    }


