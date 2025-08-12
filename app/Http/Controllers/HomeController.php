<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $page = "Home1";
        return view('Home')
        ->with('data',$page)
        ->with('notes',Note::all());
    }

    public function save(Request $request){
         $request -> validate([
            'note'=> 'required'
         ]);

         Note::create(['note'=>$request->note]);
         
         return redirect()->back();
    }
}
