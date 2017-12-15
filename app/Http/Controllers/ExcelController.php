<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Client;

class ExcelController extends Controller
{
		public function get()
		{
			return view('file');
		}

		public function importExcel(Request $request)
		{
			if($request->hasFile('excel')) {
				try {
					$path=$request->file('excel')->getRealPath();
					$data=Excel::load($path,function($reader) {
					})->get();
					if (!empty($data) && $data->count()) {
						foreach ($data as $key=>$value) {
							$insert=['user_id'=>NULL,
								'last_name'=>$value->last_name,
								'first_name'=>$value->first_name,
								'given_name'=>$value->given_name,
								'company'=>$value->company,
								'position'=>$value->position,
								'email'=>$value->email,
								'telephone'=>$value->telephone,
								'telephone2'=>$value->telephone2,
								'last_comment'=>$value->last_comment];
							if (!empty($insert)) {
								Client::firstOrCreate($insert);
							}
						}
					}
				} catch(\Exception $e) {
					return view('file')->with('error', $e->getMessage());
				}
				return view('file');
			}
			return view('file')->with('error', 'No file attached!');
		}
}