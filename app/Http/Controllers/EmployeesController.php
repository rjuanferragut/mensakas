<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controllers;
use DB;

class EmployeesController extends Controller
{
    public function index()
    {
        return view('employees.index');
    }
    public function details($id)
    {
        return view('employees.details');
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
