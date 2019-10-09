<?php

namespace App\Http\Controllers;

use App\Customers;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function lists()
    {
        $controller = Customers::all();

        return view('internals.customer', [
            'cust' => $controller,
        ]);
    }

    public function addcustomer()
    {

        $data = request()->validate([
            'namess' => 'required|min:3',
            'emailss' => 'required|email'
        ]);

        $cust = new Customers();
        $cust->name = request('namess');
        $cust->email = request('emailss');
        $cust->save();

        return back();
    }
}
