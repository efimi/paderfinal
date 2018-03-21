<?php

namespace App\Http\Controllers;

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
}
