<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
	/**
	 * Handle an authentication attempt.
	 *
	 * @return Response
	 */
	public function authenticate(Request $request)
	{
		if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
			// Authentication passed...
			return redirect()->intended('home');
		}
		else return redirect()->intended('login');
	}

	public function logIn()
	{
		return view('login');
	}

	public function logOut()
	{
		Auth::logout();
		return redirect()->intended('login');
	}
}