<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}


	public function getAll(Request $request)
	{
		$clients = Client::where('user_id', $request->input('user_id'))->orderBy('id', 'asc');
		return view('clients', ['clients' => $clients]);
	}
}