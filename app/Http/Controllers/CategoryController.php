<?php

namespace App\Http\Controllers;
use auth;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create(){
        $data = request()->validate([
            'category' => 'required'
        ]);

        $user = Auth::user();
        $cust = new Category();
        $cust->category = request('category');
        $cust->user_id = $user->id;
        $cust->save();

        return back();
    }
}
