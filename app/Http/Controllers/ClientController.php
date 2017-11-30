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
		if(Auth::user()->is_admin == 1){
			$clients = Client::all();
		}
		else {
			$clients = Client::where('user_id', Auth::id())->orderBy('id', 'asc')->get();
		}
		if(isset($id) && $id != null) {
			try {
				$client = Client::findOrFail($id);
				$cl_events = Event::withTrashed()->where('client_id', $id)->orderBy('id', 'desc')->get();
				$events = Event::where('client_id', $id)->orderBy('id', 'desc')->get();
				if(count($events) == 0) {
					unset($nst_event);
					return view('clients', ['clients' => $clients, 'client_side' => $client, 'cl_events' => $cl_events]);
				}
				else {
					$next=$events->min('id');
					$nst_event=Event::findOrFail($next);
					return view('clients',['clients'=>$clients,'client_side'=>$client,
						'cl_events'=>$cl_events,'nst_event'=>$nst_event]);
				}
			} catch(\Exception $e)
			{
				unset($id);
				return view('clients', ['clients' => $clients]);
			}
		}
		else return view('clients', ['clients' => $clients]);
	}

	public function getDesk($id = null)
	{
		$clients = Client::where('user_id', NULL)->orderBy('id', 'asc')->get();
		if(isset($id) && $id != null) {
			try {
				$client = Client::findOrFail($id);
				$cl_events = Event::withTrashed()->where('client_id', $id)->orderBy('id', 'desc')->get();
				$events = Event::where('client_id', $id)->orderBy('id', 'desc')->get();
				if(count($events) == 0) {
					unset($nst_event);
					return view('desk', ['clients' => $clients, 'client_side' => $client, 'cl_events' => $cl_events]);
				}
				else {
					$next=$events->min('id');
					$nst_event=Event::findOrFail($next);
					return view('desk',['clients'=>$clients,'client_side'=>$client,
						'cl_events'=>$cl_events,'nst_event'=>$nst_event]);
				}
			} catch(\Exception $e)
			{
				unset($id);
				return view('desk', ['clients' => $clients]);
			}
		}
		else return view('desk', ['clients' => $clients]);
	}

	public function create(Request $request)
	{
		$client = new Client;
		$client->user_id = Auth::id();
		$client->last_name = $request->input('last_name');
		$client->first_name = $request->input('first_name');
		$client->given_name = $request->input('given_name');
		$client->company = $request->input('company');
		$client->position = $request->input('position');
		$client->email = $request->input('email');
		$client->telephone = $request->input('telephone');
		$client->telephone2 = $request->input('telephone2');
		$client->save();

		return redirect()->intended('clients');
	}

	public function take($id)
	{
		$client = Client::find($id);
		$client->user_id = Auth::id();
		$client->save();

		return redirect()->intended('desk');
	}

	public function transfer($id)
	{
		$client = Client::find($id);
		$client->user_id = null;
		$client->save();

		return redirect()->intended('clients');
	}

	public function import()
	{
		return view('file');
	}
}