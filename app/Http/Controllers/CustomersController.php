<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomersController extends Controller
{
    public function create(Request $request)
    {
      $validatedDate = $request->validate([
        'name' => 'required|max:140'
      ]);

      $customer = new Customer();
      $customer->name = $request->name;
      $customer->user_id = 0;
      $customer->save();

      return redirect('/');
    }

}
