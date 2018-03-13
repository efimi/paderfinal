<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class LocationsController extends Controller
{

	public function showPinwall()
	{	
		if(count(Auth::user()->mToday())){
		$location = Auth::user()->mToday()->location;
			return view('pinwall', compact('location'));
		}
		return redirect()->to('/')->with('message', 'Du hast heute keinen Zugriff mehr auf die Pinwand. Drücke auf den Button und werde neu gematcht.');
	}
}
