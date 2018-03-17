<?php

namespace App\Http\Controllers;

use App\Models\Match;
use Illuminate\Http\Request;
use Auth;

class MatchesController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
	public function show(Match $match)
	{
		if (count(auth()->user()->mToday())) {
           $user = auth()->user();
            $messages = Match::with(['location'])->whereDate('created_at', today())
                        ->where('user_id', $user->id)->get();
            return response()->json($messages,200);
        }
        return;
	}

	public function delete(Match $match)
	{
		if ($match->user() === auth()->user()) {
			$match->delete();
			return true;
		}
		return false;
	}

	public function unmatch(Request $request)
	{	
		$user = Auth::user();
		$match = $user->mToday();
		$match->delete();
		return response()->json(true,200);
	}

}
