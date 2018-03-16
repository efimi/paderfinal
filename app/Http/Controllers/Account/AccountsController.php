<?php

namespace App\Http\Controllers\Account;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountsController extends Controller
{
	public function subscribeToNotifications(Request $request)
	{
		$user = Auth::user();
		if ($request->subscribe === true) {
			$user->email = $request->email;
			$user->subscribed = 1;
		}
		else{
			$user->subscribed = 0;
		}
			$user->save();
			return response()->json($user, 200);
	}
}
