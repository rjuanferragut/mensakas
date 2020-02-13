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
          'customer_name' => 'required',
          'customer_last_name' => 'required',
          'customer_phone' => 'required',
          'customer_password' => 'required',
          'customer_email' => 'required',
          'customer_address' => 'required',
          'customer_zip' => 'required'
      ]);

      if($validate){
        dd($validate);
        // $country = DB::table('country')->select('id_country')->where()
        //
        // DB::table('address')->insert([
        //
        // ]);
        //
        //   DB::table('customers')->insert([
        //       'firstname' => $request['firstname'],
        //       'lastname' => $request['lastname'],
        //       'email' => $request['email'],
        //       'passwd' => Hash::make($request['siret']),
        //       'siret' => $request['siret'],
        //       'phone' => $request['phone'],
        //       'phone_default' => $request['phone'],
        //       'id_gender' => $request['gender'],
        //       'company' => $request['company'],
        //       'id_lang' => 1,
        //       'id_shop' => 1,
        //       'id_shop_group' => 1,
        //       'id_default_group' => $request['group'],
        //       'active' => 0,
        //       'date_add' => Carbon::now(),
        //       'date_upd' => Carbon::now()
        //   ]);
        //
        //   $id = DB::getPdo()->lastInsertId();
        //
        //   DB::table('ps_customer_group')->insert([
        //       'id_customer' => $id,
        //       'id_group' => $request['group']
        //   ]);
        //
        //   $data = array('name'=> $request['firstname'] . " " . $request['lastname'], 'email' => $request['email'], 'siret' => $request['siret'], 'phone' => $request['phone'], 'company' => $request['company']);
        //
        //   Mail::send('mail', $data, function($message) use ($data) {
        //      $message->to($data['email'], $data['name'])->subject
        //         ('[INFO] - Alta de Usuario en Castelao S.L.');
        //      $message->from('castelaosl@castelaosl.com','Castelao S.L.');
        //   });

          return redirect()->action('CustomersController@index');
      }else{
          return redirect()->back()->with('error', 'Faltan datos del cliente');
      }

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
