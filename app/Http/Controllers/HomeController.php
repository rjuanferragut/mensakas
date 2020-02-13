<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function index()
    {
        return view('dashboard');
    }

    public function suppliers(){
      return view('suppliers.index');
    }
    public function products(){
      return view('products.index');
    }
    public function orders(){
      return view('orders.index');
    }
    public function riders(){
      return view('riders.index');
    }
    public function employees(){
      return view('employees.index');
    }

    // details functions


    public function employee(){
      return view('employee.details');
    }

    public function order(){
      return view('order.details');
    }

    public function rider(){
      return view('rider.details');
    }

    public function supplier(){
      return view('supplier.details');
    }
}
