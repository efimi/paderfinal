<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatchesController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
	public function index()
	{
		
	}
	public function delete()
	{
		# code...
	}

}
