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

		public function getFields(Request $request)
		{
			if($request->hasFile('excel') && $request->file('excel')->isValid()) {
				try {
					$path = '/var/www/crm.averkiev.net/storage/app/'.$request->file('excel')->store('excel');
					//$path=$request->file('excel')->getRealPath();
					$data = Excel::load($path,function($reader) {
					})->first();
					if (!empty($data) && $data->count()){
						foreach ($data as $key=>$value) {
							$fields[] = $key;
						}
						return view('file',['fields' => $fields, 'path' => $path]);
					}
					else return $path;//return view('file')->with('error','File is empty!');
				} catch (\Exception $e) {
					return $path;//view('file')->with('error',$e->getMessage());
				}
			}
			else return view('file')->with('error', 'No file attached!');
		}

		public function importExcel(Request $request)
		{
			try{
				foreach ($request->input('fields') as $key=>$value) {
					$fields[] = $value;
				}
				if (count($fields) < 9) return view('file')->with('error', 'Not enough properties!');

				$fields = array_slice($fields, 0 ,9);

				$data=Excel::load($request->input('path'),function($reader) {
				})->get();

				if (!empty($data) && $data->count()) {
					foreach ($data as $element) {
						$insert=['user_id'=>0,
							'last_name'=>$element[$fields[0]],
							'first_name'=>$element[$fields[1]],
							'given_name'=>$element[$fields[2]],
							'company'=>$element[$fields[3]],
							'position'=>$element[$fields[4]],
							'email'=>$element[$fields[5]],
							'telephone'=>$element[$fields[6]],
							'telephone2'=>$element[$fields[7]],
							'last_comment'=>$element[$fields[8]]];
						if (!empty($insert)) {
							Client::firstOrCreate($insert);
						}
					}
				}
			} catch(\Exception $e) {
				return view('file')->with('error', $e->getMessage());
			}
			return redirect()->action('ClientController@getImported');
		}
}