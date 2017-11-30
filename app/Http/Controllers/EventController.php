<?php

namespace App\Http\Controllers;

use App\Event;
use App\User;
use App\Client;
use App\Events\EventCompleted;
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
			->where('events.deleted_at', NULL)
			->where('clients.id', '>=', 1)
			->where('events.id', '>=', 1)
			->get();
		if(isset($id) && $id != null) {
			try {
				$client = Client::findOrFail($id);
				$cl_events = Event::withTrashed()->where('client_id', $id)->orderBy('date', 'asc')->get();
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

	public function complete(Request $request, $id)
	{
		try {
			Event::find($id)
				->update(['comment' => $request->input('comment')]);
			event(new EventCompleted(Event::find($id)));
			Event::destroy($id);
		} catch(\Exception $e)
		{
			return redirect()->intended('events');
		}
		return redirect()->intended('events');
	}

	public function create(Request $request)
	{
		try {
			if($request->input('old_id') != null) {
				$old_event=Event::find($request->input('old_id'));
				$old_event->forceDelete();
			}

			$event = new Event;
			$event->client_id = $request->input('client_id');
			$event->type = $request->input('type');
			$event->date = $request->input('date');
			$event->address = $request->input('address');
			$event->comment = '';
			$event->save();
		} catch(\Exception $e)
		{
			return redirect()->intended('events');
		}
		return redirect()->intended('events');
	}

	public function transfer(Request $request)
	{
		try {
			$event = Event::find($request->input('id'));
			$event->date = $request->input('date');
			$event->save();
		} catch(\Exception $e)
		{
			return redirect()->intended('events');
		}
		return redirect()->intended('events');
	}
}