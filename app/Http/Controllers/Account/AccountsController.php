<?php

namespace App\Http\Controllers\Account;

use App\Events\User\UserSubscribedToEmailNotification;
use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class AccountsController extends Controller
{
	public function subscribeToNotifications(Request $request)
	{
		$user = Auth::user();
		if ($request->subscribe === true) {
			$user->email = $request->email;
			$user->save();
			event(new UserSubscribedToEmailNotification($user)); 
		}
		else{
			$user->subscribed = 0;
			$user->save();
		}
			return response()->json($user, 200);
	}
	public function activate(Request $request)
	{

		$user = User::where('email', $request->email)->where('token', $request->token)->firstOrFail();
		$user->subscribed = true;
		$user->save();

	}
	public function loginViaToken(Request $request)
	{
		$user = User::where('id', $request->id)->where('token', $request->token)->firstOrFail();

		Auth::loginUsingId($user->id);
		return redirect()->route('pinwall')->withSuccess('Du hast dich erfolgreich eingeloggt');
	} 

	public function onesignalidAdd(Request $request)
	{
		$user = Auth::user();
		$user->one_signal_player_id = $request->one_signal_player_id;
		$user->save();
		return response()->json($user, 200);
	}
}
