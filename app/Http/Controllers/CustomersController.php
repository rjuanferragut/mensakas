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
        return view('customers.index');
    }

    public function details($id) {
      // dd($id);
        return view('customers.details')->with('id');
    }

    public function create() {
        return view('customers.create');
    }

    public function store(Request $request) {
        dd($request);
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
