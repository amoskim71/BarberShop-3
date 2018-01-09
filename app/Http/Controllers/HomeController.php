<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Flash;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function edit()
    {
        return view('auth/edit');
    }

    public function update(Request $request)
    {
      $validatedDate = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,'.Auth::user()->id,
        'bio' => 'required|string|max:255',
      ]);

      $user = Auth::user();
      $user->name = $request->name;
      $user->email = $request->email;
      $user->bio = $request->bio;
      $user->save();

      \Session::flash('flash_message', 'Your account has been updated!');
      return redirect('/home');
    }
}
