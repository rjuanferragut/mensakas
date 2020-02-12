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
        return view('home');
    }
}
// panel controller, crear controllers independientes
// <?php
//
// namespace App\Http\Controllers;
//
// use Illuminate\Http\Request;
//
// class Panelcontroller extends Controller
// {
//   /**
//        * Display a listing of the resource.
//        *
//        * @return \Illuminate\Http\Response
//        */
//       public function index(){
//           return view('welcome');
//       }
//       public function dashboard() {
//           return view('dashboard');
//       }
//       public function customers(){
//         //
//         return view('customers.index');
//       }
//       public function suppliers(){
//         return view('suppliers.index');
//       }
//       public function products(){
//         return view('products.index');
//       }
//       public function orders(){
//         return view('orders.index');
//       }
//       public function riders(){
//         return view('riders.index');
//       }
//       public function employees(){
//         return view('employees.index');
//       }
//
//       // details functions
//       public function customer(){
//         return view('customers.details');
//       }
//
//       public function employee(){
//         return view('employees.details');
//       }
//
//       public function order(){
//         return view('orders.details');
//       }
//
//       public function rider(){
//         return view('riders.details');
//       }
//
//       public function supplier(){
//         return view('suppliers.details');
//       }
//
// }
