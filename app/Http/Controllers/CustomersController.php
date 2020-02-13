<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
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
      $countries = DB::table('country')->get();
        return view('customers.index', compact('customers', 'states', 'countries'));
    }

    public function details($id) {
        return view('customers.details')->with('id');
    }

    public function create() {
        //
    }

    public function store(Request $request) {
      $validate = $request->validate([
          'name' => 'required',
          'last_name' => 'required',
          'phone' => 'required',
          'password' => 'required',
          'email' => 'required',
          'address' => 'required',
          'state' => 'required',
          'country' => 'required',
          'zip' => 'required'
      ]);

      // if($validate){
        $isInsert = DB::table('address')->insert(
            ['id_country' => $request->country],
            ['id_state' => $request->state],
            ['address' => (string)$request->address],
            ['zipcode' => $request->zip],
            ['active' => '1'],
            ['deleted' => '0']
        );

        $addressInserted = DB::table('address')->where('id_state', $request->state)->where('address', $request->address)->where('active', 2)->first();
        dd($addressInserted, $isInsert, $request->address);

        DB::table('customers')->insertGetId(
            ['id_lang' => 1],
            ['id_address' => $addressInserted->id_address],
            ['is_guest' => 0],
            ['first_name' => $request->name],
            ['last_name' => $request->last_name],
            ['email' => $request->email],
            ['phone' => $request->phone]
          );

      //     return redirect()->back()->with('Datos del cliente guardados');
      // }else{
      //     return redirect()->back()->with('error', 'Faltan datos del cliente');
      // }

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
