<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatchesController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
	public function show(Match $match)
	{
		return view('match.show', compact('match'));
	}

	public function delete(Match $match)
	{
		if ($match->user() === auth()->user()) {
			$match->delete();
			return ture;
		}
		return false;
	}

}
