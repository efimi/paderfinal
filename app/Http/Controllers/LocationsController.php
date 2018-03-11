<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class LocationsController extends Controller
{

	public function showPinwall()
	{
		$location = Auth::user()->mToday()->location;
		if ($location === null){
			return redirect()->to('/')->with('message', 'Du hast heute keinen Zugriff mehr auf die Pinwand. Drücke auf den Button und werde neu gematcht.');
		}
		return view('pinwall', compact('location'));
	}
}
