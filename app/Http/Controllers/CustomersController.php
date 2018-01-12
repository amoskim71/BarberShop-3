<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Auth;

class CustomersController extends Controller
{
    public function index()
    {
      function calculateTime($customers)
      {
        $clock = 0;
        foreach ($customers as $customer)
        {
          switch ($customer->type)
          {
            case "shave":
            $clock += 10;
            break;
            case "both":
            $clock += 30;
            break;
            default:
            $clock += 20;
          }
        }
        return $clock;
      }

      $customers = Customer::all();
      $clock = calculateTime($customers);
      return view('welcome', compact('customers'), compact('clock'));
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
