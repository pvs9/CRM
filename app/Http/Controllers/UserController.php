<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
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


	public function get()
	{
		return view('profile',compact('events'),compact('calls'));
	}

	public function create(Request $request)
	{
		$user = new User;
		$user->last_name = $request->input('last_name');
		$user->first_name = $request->input('first_name');
		$user->position = $request->input('position');
		$user->email = $request->input('email');
		$user->password = bcrypt($request->input('password'));
		$user->is_admin = 0;
		$user->save();

		return redirect()->intended('profile');
	}
}