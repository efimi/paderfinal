<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    public function locations()
    {
    	return $this->hasMany(Location::class);
    }
    // Choosed Location
    public function cLocation()
    {
    	if ( $this->choosed === null) {
    		return null;
    	}
    	else {
    		return Location::find($this->choosed);
    	}
    }
    public static function saveChoices($user, $loc1, $loc2, $loc3)
    {
    	$choice = new Choice;
    	$choice->user_id = $user->id;
    	$choice->location1_id = $loc1->id;
    	$choice->location2_id = $loc2->id;
    	$choice->location3_id = $loc3->id;
    	$choice->choosed = null;
    	$choice->save();
    }
    public static function chooseById($userId, $locationId, $date)
    {
    	$choice = Choice::where('user_id', $userId)->whereDate('created_at', $date)->first();
    	$choice->choosed = $locationId;
    	$choice->save(); 
    }
}
