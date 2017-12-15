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
		try {
			$user=User::create(['last_name'=>$request->input('last_name'),
				'first_name'=>$request->input('first_name'),
				'position'=>$request->input('position'),'email'=>$request->input('email'),
				'password'=>bcrypt($request->input('password')),'is_admin'=>0]);

			$statistics=Statistic::create(['user_id'=>$user->id,'month'=>'January',
				'year'=>date("Y"),'events'=>0,'events_closed'=>0]);
			$statistics=Statistic::create(['user_id'=>$user->id,'month'=>'February',
				'year'=>date("Y"),'events'=>0,'events_closed'=>0]);
			$statistics=Statistic::create(['user_id'=>$user->id,'month'=>'March',
				'year'=>date("Y"),'events'=>0,'events_closed'=>0]);
			$statistics=Statistic::create(['user_id'=>$user->id,'month'=>'April',
				'year'=>date("Y"),'events'=>0,'events_closed'=>0]);
			$statistics=
				Statistic::create(['user_id'=>$user->id,'month'=>'May','year'=>date("Y"),
					'events'=>0,'events_closed'=>0]);
			$statistics=
				Statistic::create(['user_id'=>$user->id,'month'=>'June','year'=>date("Y"),
					'events'=>0,'events_closed'=>0]);
			$statistics=
				Statistic::create(['user_id'=>$user->id,'month'=>'July','year'=>date("Y"),
					'events'=>0,'events_closed'=>0]);
			$statistics=Statistic::create(['user_id'=>$user->id,'month'=>'August',
				'year'=>date("Y"),'events'=>0,'events_closed'=>0]);
			$statistics=Statistic::create(['user_id'=>$user->id,'month'=>'September',
				'year'=>date("Y"),'events'=>0,'events_closed'=>0]);
			$statistics=Statistic::create(['user_id'=>$user->id,'month'=>'October',
				'year'=>date("Y"),'events'=>0,'events_closed'=>0]);
			$statistics=Statistic::create(['user_id'=>$user->id,'month'=>'November',
				'year'=>date("Y"),'events'=>0,'events_closed'=>0]);
			$statistics=Statistic::create(['user_id'=>$user->id,'month'=>'December',
				'year'=>date("Y"),'events'=>0,'events_closed'=>0]);
		} catch(\Exception $e)
		{
			return redirect()->back()->with('error', $e->getMessage());
		}
		return redirect()->back();
	}
}