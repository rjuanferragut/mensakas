<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $customers = DB::table('customers')->paginate(10);
      $states = DB::table('state')->get();
        return view('customers.index', compact('customers', 'states'));
    }

    public function details($id) {
        return view('customers.details')->with('id');
    }

    public function create() {
        //
    }

    public function store(Request $request) {
        // dd($request);

        return redirect()->route('customers.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id) {
        //
    }

    public function update(Request $request, $id) {
        //
    }

    public function destroy($id)
    {
        //
    }
}
