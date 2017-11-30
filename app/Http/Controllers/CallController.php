<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CallController extends Controller
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

	public function call(Request $request)
	{
		$strHost = env('ASTERISK_HOST');
		$strUser = env('ASTERISK_USER');
		$strSecret = env('ASTERISK_PASS');
		$strChannel = "Local/s@from-script-n";
		$strContext = "from-script";
		$strWaitTime = "60000";
		$strPriority = "1";
		$strExten = $request->input('phone');
		$strCallerId = "n <$strExten>";
		$length = strlen($strExten);

		if ($length == 11 && is_numeric($strExten)) {
			$oSocket=fsockopen($strHost,5038,$errnum,$errdesc) or
			die("Connection to host failed");
			fputs($oSocket,"Action: login\r\n");
			fputs($oSocket,"Events: off\r\n");
			fputs($oSocket,"Username: $strUser\r\n");
			fputs($oSocket,"Secret: $strSecret\r\n\r\n");
			fputs($oSocket,"Action: originate\r\n");
			fputs($oSocket,"Channel: $strChannel\r\n");
			fputs($oSocket,"Timeout: $strWaitTime\r\n");
			fputs($oSocket,"CallerId: $strCallerId\r\n");
			fputs($oSocket,"Exten: $strExten\r\n");
			fputs($oSocket,"Context: $strContext\r\n");
			fputs($oSocket,"Priority: $strPriority\r\n\r\n");
			fputs($oSocket,"Action: Logoff\r\n\r\n");
			sleep(1);
			fclose($oSocket,128);
		}
		return redirect()->intended('events');
	}
}