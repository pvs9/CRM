<?php

namespace App\Http\Controllers;

use App\Statistic;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class StatisticsController extends Controller
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
		if(Auth::user()->is_admin != 1) {
			$january=Statistic::where(['user_id'=>Auth::id(),'month'=>'January',
				'year'=>date("Y")])->get();
			$february=Statistic::where(['user_id'=>Auth::id(),'month'=>'February',
				'year'=>date("Y")])->get();
			$march=Statistic::where(['user_id'=>Auth::id(),'month'=>'March',
				'year'=>date("Y")])->get();
			$april=Statistic::where(['user_id'=>Auth::id(),'month'=>'April',
				'year'=>date("Y")])->get();
			$may=
				Statistic::where(['user_id'=>Auth::id(),'month'=>'May','year'=>date("Y")])
					->get();
			$june=Statistic::where(['user_id'=>Auth::id(),'month'=>'June',
				'year'=>date("Y")])->get();
			$july=Statistic::where(['user_id'=>Auth::id(),'month'=>'July',
				'year'=>date("Y")])->get();
			$august=Statistic::where(['user_id'=>Auth::id(),'month'=>'August',
				'year'=>date("Y")])->get();
			$september=Statistic::where(['user_id'=>Auth::id(),'month'=>'September',
				'year'=>date("Y")])->get();
			$october=Statistic::where(['user_id'=>Auth::id(),'month'=>'October',
				'year'=>date("Y")])->get();
			$november=Statistic::where(['user_id'=>Auth::id(),'month'=>'November',
				'year'=>date("Y")])->get();
			$december=Statistic::where(['user_id'=>Auth::id(),'month'=>'December',
				'year'=>date("Y")])->get();

			$statistic=app()->chartjs
				->name('lineChartTest')
				->type('line')
				->size(['width'=>400,'height'=>200])
				->labels(['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август',
					'Сентябрь','Октябрь','Ноябрь','Декабрь'])
				->datasets([
					[
						"label"=>"Созданные события",
						'backgroundColor'=>"rgba(38, 185, 154, 0.31)",
						'borderColor'=>"rgba(38, 185, 154, 0.7)",
						"pointBorderColor"=>"rgba(38, 185, 154, 0.7)",
						"pointBackgroundColor"=>"rgba(38, 185, 154, 0.7)",
						"pointHoverBackgroundColor"=>"#fff",
						"pointHoverBorderColor"=>"rgba(220,220,220,1)",
						'data'=>[$january->events,$february->events,$march->events,$april->events,$may->events,$june->events,$july->events,$august->events,$september->events,$october->events,$november->events,$december->events],
					],
					[
						"label"=>"Закрытые сделки",
						'backgroundColor'=>"rgba(38, 185, 154, 0.31)",
						'borderColor'=>"rgba(38, 185, 154, 0.7)",
						"pointBorderColor"=>"rgba(38, 185, 154, 0.7)",
						"pointBackgroundColor"=>"rgba(38, 185, 154, 0.7)",
						"pointHoverBackgroundColor"=>"#fff",
						"pointHoverBorderColor"=>"rgba(220,220,220,1)",
						'data'=>[$january->events_closed,$february->events_closed,$march->events_closed,$april->events_closed,$may->events_closed,$june->events_closed,$july->events_closed,$august->events_closed,$september->events_closed,$october->events_closed,$november->events_closed,$december->events_closed],
					]
				])
				->options([]);
		}

		else {
			$january=Statistic::where(['user_id'=>null,'month'=>'January',
				'year'=>date("Y")])->get();
			$february=Statistic::where(['user_id'=>null,'month'=>'February',
				'year'=>date("Y")])->get();
			$march=Statistic::where(['user_id'=>null,'month'=>'March',
				'year'=>date("Y")])->get();
			$april=Statistic::where(['user_id'=>null,'month'=>'April',
				'year'=>date("Y")])->get();
			$may=
				Statistic::where(['user_id'=>null,'month'=>'May','year'=>date("Y")])
					->get();
			$june=Statistic::where(['user_id'=>null,'month'=>'June',
				'year'=>date("Y")])->get();
			$july=Statistic::where(['user_id'=>null,'month'=>'July',
				'year'=>date("Y")])->get();
			$august=Statistic::where(['user_id'=>null,'month'=>'August',
				'year'=>date("Y")])->get();
			$september=Statistic::where(['user_id'=>null,'month'=>'September',
				'year'=>date("Y")])->get();
			$october=Statistic::where(['user_id'=>null,'month'=>'October',
				'year'=>date("Y")])->get();
			$november=Statistic::where(['user_id'=>null,'month'=>'November',
				'year'=>date("Y")])->get();
			$december=Statistic::where(['user_id'=>null,'month'=>'December',
				'year'=>date("Y")])->get();

			$statistic=app()->chartjs
				->name('lineChartTest')
				->type('line')
				->size(['width'=>400,'height'=>200])
				->labels(['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август',
					'Сентябрь','Октябрь','Ноябрь','Декабрь'])
				->datasets([
					[
						"label"=>"Созданные события",
						'backgroundColor'=>"rgba(38, 185, 154, 0.31)",
						'borderColor'=>"rgba(38, 185, 154, 0.7)",
						"pointBorderColor"=>"rgba(38, 185, 154, 0.7)",
						"pointBackgroundColor"=>"rgba(38, 185, 154, 0.7)",
						"pointHoverBackgroundColor"=>"#fff",
						"pointHoverBorderColor"=>"rgba(220,220,220,1)",
						'data'=>[$january->events,$february->events,$march->events,$april->events,$may->events,$june->events,$july->events,$august->events,$september->events,$october->events,$november->events,$december->events],
					],
					[
						"label"=>"Закрытые сделки",
						'backgroundColor'=>"rgba(38, 185, 154, 0.31)",
						'borderColor'=>"rgba(38, 185, 154, 0.7)",
						"pointBorderColor"=>"rgba(38, 185, 154, 0.7)",
						"pointBackgroundColor"=>"rgba(38, 185, 154, 0.7)",
						"pointHoverBackgroundColor"=>"#fff",
						"pointHoverBorderColor"=>"rgba(220,220,220,1)",
						'data'=>[$january->events_closed,$february->events_closed,$march->events_closed,$april->events_closed,$may->events_closed,$june->events_closed,$july->events_closed,$august->events_closed,$september->events_closed,$october->events_closed,$november->events_closed,$december->events_closed],
					]
				])
				->options([]);
		}
		return view('profile',compact('statistic'));
	}

	public function get(Request $request)
	{
		$january=Statistic::where(['user_id'=>null,'month'=>'January',
			'year'=>date("Y")])->get();
		$february=Statistic::where(['user_id'=>null,'month'=>'February',
			'year'=>date("Y")])->get();
		$march=Statistic::where(['user_id'=>null,'month'=>'March',
			'year'=>date("Y")])->get();
		$april=Statistic::where(['user_id'=>null,'month'=>'April',
			'year'=>date("Y")])->get();
		$may=
			Statistic::where(['user_id'=>null,'month'=>'May','year'=>date("Y")])
				->get();
		$june=Statistic::where(['user_id'=>null,'month'=>'June',
			'year'=>date("Y")])->get();
		$july=Statistic::where(['user_id'=>null,'month'=>'July',
			'year'=>date("Y")])->get();
		$august=Statistic::where(['user_id'=>null,'month'=>'August',
			'year'=>date("Y")])->get();
		$september=Statistic::where(['user_id'=>null,'month'=>'September',
			'year'=>date("Y")])->get();
		$october=Statistic::where(['user_id'=>null,'month'=>'October',
			'year'=>date("Y")])->get();
		$november=Statistic::where(['user_id'=>null,'month'=>'November',
			'year'=>date("Y")])->get();
		$december=Statistic::where(['user_id'=>null,'month'=>'December',
			'year'=>date("Y")])->get();

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
					'data' => [$january->events,$february->events,$march->events,$april->events,$may->events,$june->events,$july->events,$august->events,$september->events,$october->events,$november->events,$december->events],
				],
				[
					"label" => "Закрытые сделки",
					'backgroundColor' => "rgba(38, 185, 154, 0.31)",
					'borderColor' => "rgba(38, 185, 154, 0.7)",
					"pointBorderColor" => "rgba(38, 185, 154, 0.7)",
					"pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
					"pointHoverBackgroundColor" => "#fff",
					"pointHoverBorderColor" => "rgba(220,220,220,1)",
					'data' => [$january->events_closed,$february->events_closed,$march->events_closed,$april->events_closed,$may->events_closed,$june->events_closed,$july->events_closed,$august->events_closed,$september->events_closed,$october->events_closed,$november->events_closed,$december->events_closed],
				]
			])
			->options([]);
		return view('statistics',compact('statistic'));
	}
}