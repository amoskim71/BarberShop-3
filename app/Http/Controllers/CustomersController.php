<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Auth;

class CustomersController extends Controller
{
    public function index()
    {
      $customers = Customer::all();
      if (!$customers->isEmpty())
      {
        $first_customer = $customers->first();
        $first_customer->status = 'in-progress';
        $first_customer->save();
      }
      return view('welcome', compact('customers'));
    }

    public function create(Request $request)
    {
      if (Auth::check() && isset($_POST['complete']))
      {
        $customer = Customer::first();
        $customer->delete();
        return redirect('/');
      }
      $validatedDate = $request->validate([
        'name' => 'required|max:140',
      ]);

      $customer = new Customer();
      $customer->name = $request->name;
      $customer->type = $request->type;
      $customer->user_id = 0;

      $customer->save();

      return redirect('/');
    }

}
