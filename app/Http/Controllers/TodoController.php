<?php

namespace App\Http\Controllers;

use App\Todo;
use App\Category;
use Illuminate\Http\Request;
use Auth;

class TodoController extends Controller
{
    public function index(){
        //view
//        echo Auth::user()->id;
//
        $checked = Todo::checked()->get();
        $unchecked = Todo::where('is_checked',0)->get();
        $category = Category::all();
        return view('todo', compact('checked','unchecked','category'));
    }

    public function store(){
        $data = request()->validate([
            'description' => 'required'
        ]);

        $user = Auth::user();
        $cust = new Todo();
        $cust->description = request('description');
        $cust->category_id = 2;
        $cust->is_checked = 0;
        $cust->save();

        return back();
    }

    public function show($todo){
        $category = Category::where('id',$todo)->firstOrFail();
        $todo = Todo::where('category_id',$todo)->firstOrFail();
        dd($todo);
        return view('todo',compact('$todo'));
    }
}
