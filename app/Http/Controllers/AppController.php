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
        		'name' => 'Gast'
        	]);
    	   Auth::login($user, true);
        }
    	return view('welcome');
    }
    public function makeMatch()
    {	
        $user = Auth::user();
        if (!empty($user->mToday())) {
            $match = $user->mToday();
        }else{
    	   $match = Match::makeNewMatch($user);
        }
    	return view('match', compact('match'));
    }
}
