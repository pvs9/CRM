<?php

namespace App\Http\Controllers;

use App\User;
use App\Statistic;
use App\Http\Requests\CreateUser;

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

	public function create(CreateUser $request)
	{
		$user = User::create(['last_name' => $request->input('last_name'), 'first_name' => $request->input('first_name'), 'position' => $request->input('position'), 'email' => $request->input('email'), 'password' => bcrypt($request->input('password')), 'is_admin' => 0]);

		$statistics = Statistic::create(['user_id' => $user->id, 'month' => 'January', 'date' => date("Y"), 'events' => 0, 'events_closed' => 0],
										['user_id' => $user->id, 'month' => 'February', 'date' => date("Y"), 'events' => 0, 'events_closed' => 0],
										['user_id' => $user->id, 'month' => 'March', 'date' => date("Y"), 'events' => 0, 'events_closed' => 0],
										['user_id' => $user->id, 'month' => 'April', 'date' => date("Y"), 'events' => 0, 'events_closed' => 0],
										['user_id' => $user->id, 'month' => 'May', 'date' => date("Y"), 'events' => 0, 'events_closed' => 0],
										['user_id' => $user->id, 'month' => 'June', 'date' => date("Y"), 'events' => 0, 'events_closed' => 0],
										['user_id' => $user->id, 'month' => 'July', 'date' => date("Y"), 'events' => 0, 'events_closed' => 0],
										['user_id' => $user->id, 'month' => 'August', 'date' => date("Y"), 'events' => 0, 'events_closed' => 0],
										['user_id' => $user->id, 'month' => 'September', 'date' => date("Y"), 'events' => 0, 'events_closed' => 0],
										['user_id' => $user->id, 'month' => 'October', 'date' => date("Y"), 'events' => 0, 'events_closed' => 0],
										['user_id' => $user->id, 'month' => 'November', 'date' => date("Y"), 'events' => 0, 'events_closed' => 0],
										['user_id' => $user->id, 'month' => 'December', 'date' => date("Y"), 'events' => 0, 'events_closed' => 0]
		);

		return redirect()->intended('profile');
	}
}