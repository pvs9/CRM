<?php

namespace App\Http\Controllers;


use App\Event;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ExcelController extends Controller
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

	public function load(Request $request)
	{
		$path = Storage::putFileAs(
			'tables', $request->file('excel'), $request->user()->id
		);
		return $path;
	}

	public function analize(Request $request)
	{
		app()->make('excel')->load('/storage/app/tables/'.$request->user()->id, function($reader) {

			$results = $reader->get();
			echo $results;
		});
	}

}