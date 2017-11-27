<?php

namespace App\Http\Controllers;

use App\Event;
use App\User;
use App\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EventController extends Controller
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

		$events = User::find(Auth::id())->leftJoin('clients', 'users.id', '=', 'clients.user_id')
			->leftJoin('events', 'clients.id', '=', 'events.client_id')
			->select('clients.*', 'events.*')
			->get();
		if(isset($id) && $id != null) {
			try {
				$client = Client::findOrFail($id);
				$cl_events = Event::withTrashed()->where('client_id', $id)->orderBy('id', 'desc')->get();
				$events = Event::where('client_id', $id)->orderBy('id', 'desc')->get();
				$next = $events->min('id');
				$nst_event = Event::find($next);
				return view('events', ['events' => $events, 'client_side' => $client, 'cl_events' => $cl_events, 'nst_event' => $nst_event]);
			} catch(\Exception $e)
			{
				unset($id);
				return view('events', ['events' => $events]);
			}
		}
		else return view('events', ['events' => $events]);
	}
}