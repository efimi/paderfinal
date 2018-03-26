<?php

namespace App\Http\Controllers;

use App\Models\Choice;
use App\Models\Location;
use App\Models\Match;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class AppController extends Controller
{   

    public function start()
    {   
        if(!Auth::check()){
        	$user = User::create([
        		'name' => 'Gast',
                'email' => null,
                'password' => null,
                'token' => str_random(100),
                'subscribed' => 0,
        	]);
    	   Auth::login($user, true);
           return view('intro');
        }
        if(count(Auth::user()->mToday())){
            return redirect()->route('match');
        }
        else{
        	return view('welcome');
        }
    }
    public function showMatch()
    {

        $match = Auth::user()->mToday();
        if (count($match)) {
            return view('match', compact('match'));
        }
        else{
            return redirect('/');
        }

    }
    public function makeMatch()
    {	
        if (Auth::check()){
            $user = Auth::user();
            if (count($user->mToday())) {
                $match = $user->mToday();
            }else{
        	   $match = Match::makeNewMatch($user);
            }
        	return view('match', compact('match'));
        }
        else {
            return redirect()->to('/');
        }
    }
    public function chooseLocations()
    {   
        $user = Auth::user();
        if(count($user)){
            if (count($user->mToday())) {
                return redirect('showmatch');
            }
            $locations = Location::chooseableLocations();
            
            Choice::saveChoices($user, $locations->get(0), $locations->get(1), $locations->get(2));

            return view('choose', compact('locations'));
        }
        else
        {
            return redirect('/');
        }
    }
    public function matchById(Request $request)
    {   
        $user = Auth::user();
        Choice::chooseById($user->id, $request->input('LocId'), today());
        $match = Match::matchToLocationId($user, $request->input('LocId'));
        return view('match', compact('match'));
    }
}
