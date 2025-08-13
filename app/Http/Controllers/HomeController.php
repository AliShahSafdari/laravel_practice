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

    public function edit($id){
        // return $id;
        $note = Note::find($id);
        return view('home')
            ->with('notes', Note::all())
            ->with('data', 'Home')
            ->with('note', $note);

    }

    public function update(Request $request, $id){
         $request -> validate([
            'note'=> 'required'
         ]);


        $note = Note::find($id);
        $note->note = $request->note;
        $note->save();

        return redirect('/');
        // return $request->all();
    }

    public function delete($id){

        $note= Note::find($id);
        $note->delete();
        return redirect('/');
    }

}
