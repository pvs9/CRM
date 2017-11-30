<?php

namespace App\Http\Controllers;

use App\Statistic;
use App\User;
use App\Client;
use App\Events\EventCompleted;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class StatisticController extends Controller
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

	public function getUser(Request $request)
	{
		$january = Statistic::where(['user_id' => Auth::id(), 'month' => 'January', 'year' => date("Y")])->get();
		$february = Statistic::where(['user_id' => Auth::id(), 'month' => 'February', 'year' => date("Y")])->get();
		$march = Statistic::where(['user_id' => Auth::id(), 'month' => 'March', 'year' => date("Y")])->get();
		$april = Statistic::where(['user_id' => Auth::id(), 'month' => 'April', 'year' => date("Y")])->get();
		$may = Statistic::where(['user_id' => Auth::id(), 'month' => 'May', 'year' => date("Y")])->get();
		$june = Statistic::where(['user_id' => Auth::id(), 'month' => 'June', 'year' => date("Y")])->get();
		$july = Statistic::where(['user_id' => Auth::id(), 'month' => 'July', 'year' => date("Y")])->get();
		$august = Statistic::where(['user_id' => Auth::id(), 'month' => 'August', 'year' => date("Y")])->get();
		$september = Statistic::where(['user_id' => Auth::id(), 'month' => 'September', 'year' => date("Y")])->get();
		$october = Statistic::where(['user_id' => Auth::id(), 'month' => 'October', 'year' => date("Y")])->get();
		$november = Statistic::where(['user_id' => Auth::id(), 'month' => 'November', 'year' => date("Y")])->get();
		$december = Statistic::where(['user_id' => Auth::id(), 'month' => 'December', 'year' => date("Y")])->get();

		if($january == NULL) {
			$january->events = 0;
			$january->events_closed = 0;
		}

		if($february == NULL) {
			$february->events = 0;
			$february->events_closed = 0;
		}

		if($march == NULL) {
			$march->events = 0;
			$march->events_closed = 0;
		}

		if($april == NULL) {
			$april->events = 0;
			$april->events_closed = 0;
		}

		if($may == NULL) {
			$may->events = 0;
			$may->events_closed = 0;
		}

		if($june == NULL) {
			$june->events = 0;
			$june->events_closed = 0;
		}

		if($july == NULL) {
			$july->events = 0;
			$july->events_closed = 0;
		}

		if($august == NULL) {
			$august->events = 0;
			$august->events_closed = 0;
		}

		if($september == NULL) {
			$september->events = 0;
			$september->events_closed = 0;
		}

		if($october == NULL) {
			$october->events = 0;
			$october->events_closed = 0;
		}

		if($november == NULL) {
			$november->events = 0;
			$november->events_closed = 0;
		}

		if($december == NULL) {
			$december->events = 0;
			$december->events_closed = 0;
		}
		$statistic = app()->chartjs
			->name('lineChartTest')
			->type('line')
			->size(['width' => 400, 'height' => 200])
			->labels(['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'])
			->datasets([
				[
					"label" => "Созданные события",
					'backgroundColor' => "rgba(38, 185, 154, 0.31)",
					'borderColor' => "rgba(38, 185, 154, 0.7)",
					"pointBorderColor" => "rgba(38, 185, 154, 0.7)",
					"pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
					"pointHoverBackgroundColor" => "#fff",
					"pointHoverBorderColor" => "rgba(220,220,220,1)",
					'data' => [$january->events, $february->events, $march->events, $april->events, $may->events, $june->events, $july->events, $august->events, $september->events, $october->events, $november->events, $december->events],
				],
				[
					"label" => "Закрытые сделки",
					'backgroundColor' => "rgba(38, 185, 154, 0.31)",
					'borderColor' => "rgba(38, 185, 154, 0.7)",
					"pointBorderColor" => "rgba(38, 185, 154, 0.7)",
					"pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
					"pointHoverBackgroundColor" => "#fff",
					"pointHoverBorderColor" => "rgba(220,220,220,1)",
					'data' => [$january->events_closed, $february->events_closed, $march->events_closed, $april->events_closed, $may->events_closed, $june->events_closed, $july->events_closed, $august->events_closed, $september->events_closed, $october->events_closed, $november->events_closed, $december->events_closed ],
				]
			])
			->options([]);
		return view('profile',compact('statistic'),compact('calls'));
	}
}