<?php

namespace App\Models;

use App\Models\Location;
use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
     protected $fillable = [
        'location_id', 'user_id',
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    public function location()
    {
    	return $this->belongsTo(Location::class);
    }
    public static function mToday()
    {
    	return self::whereDate('created_at', today());
    }
    public static function makeNewMatch(User $user)
    {
    	$location = Location::getLocation();
    	$match = self::create([
	    			'location_id' => $location->id,
	    			'user_id' => $user->id
	    		]);
    	return $match;
    }
}
