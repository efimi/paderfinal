<?php

namespace App\Models;

use App\Models\Location;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Match extends Model 
{
    use SoftDeletes;

     protected $fillable = [
        'location_id', 'user_id',
    ];
    protected $appends = [
        'averageRating'
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    public function location()
    {
    	return $this->belongsTo(Location::class);
    }
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
    public function setAverageRatingAttribute()
    {   
        if($this->ratings()->count() === 0){
            // $divisor = 1;
            return null;
        }
        else{
            $divisor = $this->ratings()->count();
        }
        return $this->ratings()->sum('score') / $divisor;
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
    public static function matchToLocationId($user, $locationId)
    {
        $match = new Match;
        $match->location_id = $locationId;
        $match->user_id = $user->id;
        $match->save();
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
