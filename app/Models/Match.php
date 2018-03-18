<?php

namespace App\Models;

use App\Models\Location;
use App\Models\User;
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
    public function associatedMatches($date)
    {
        $location = $this->location;

        // location, dann today, this locaiton, user 
        return Match::whereDate('created_at', $date)->where('location_id', $location->id)->get();
    }
    public function users()
    {   
        // ex:created_at = "2018-03-12 09:19:35"
        $date = explode(" ", $this->created_at)[0];
        $match = $this->associatedMatches($date);
        $users = collect([]);
        foreach ($match as $m) {
            $users->push($m->user);
        }
        return $users;
    }
    public function unmatch(User $user)
    {
        $match = $user->mToday();
        if(count($match)){
            $match->delete();
        }
    }
}
