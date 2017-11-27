<?php

namespace App\Http\Controllers;

use App\Client;
use App\Event;
use Illuminate\Support\Facades\Auth;
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
		$this->middleware('auth');
	}


	public function getAll($id = null)
	{
		$clients = Client::where('user_id', Auth::id())->orderBy('id', 'asc')->get();
		if(isset($id) && $id != null) {
			try {
				$client = Client::findOrFail($id);
				$cl_events = Event::withTrashed()->where('client_id', $id)->orderBy('id', 'desc')->get();
				$events = Event::where('client_id', $id)->orderBy('id', 'desc')->get();
				$next = $events->min('id');
				$nst_event = Event::find($next);
				return view('clients', ['clients' => $clients, 'client_side' => $client, 'cl_events' => $cl_events, 'nst_event' => $nst_event]);
			} catch(\Exception $e)
			{
				unset($id);
				return view('clients', ['clients' => $clients]);
			}
		}
		else return view('clients', ['clients' => $clients]);
	}
}