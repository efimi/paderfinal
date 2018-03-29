<?php

namespace App\Models;

use App\Models\Chat\Message;
use App\Models\Location;
use App\Models\Match;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
	public function matches()
	{
		return $this->hasMany(Match::class);
	}
	public function openinghours()
	{
		return $this->hasMany(OpeningHour::class);
	}
	public function photos()
	{
		return $this->hasMany(Photo::class);
	}
	public function messages()
    {
        return $this->hasMany(Message::class);
    }
	public function closingTime()
	{	
		$thisDayId = today()->dayOfWeek + 1;
		switch (count($this->openinghours())) {
			case 2:
				$nextDayId = today()->add(1)->dayOfWeek + 1;
				return $this->openinghours()->where('day_id', $nextDayId)->first();
				break;
			case 1:
				return $this->openinghours()->where('day_id', $thisDayId);
				break;
			default:
				return null;
				break;
		}
	}
	public function isFilledUp()
	{
		return $this->usedPlaces() >= 5;
	}
	public static function openLocationsTodayAt($time = 2000)
	{	
		$openhours = OpeningHour::allOpenToday($time);

		return self::extractLocationsHelper($openhours); 

	}
 	public function usedPlaces()
 	{
 		return Match::mToday()->where('location_id', $this->id)->count();
 	}
	public static function getLocation()
	{
		if (!empty(self::getFillableLocation())) {
			return self::getFillableLocation();
		}
		elseif (!empty(self::getNewRandom())) {
			return self::getNewRandom();
		}
		else{
			return self::allUsedToday()->sortBy(function($loc){
				return $loc->usedPlaces();
			})->first();
		}
	}
 	public static function getFillableLocation() {
 		return self::getFillableLocations()->first();
 	}
 	public static function getFillableLocations()
 	{
 		$locationsWithLessThen5 = self::allUsedToday()->filter(function($loc, $key){
 			return $loc->usedPlaces() < 5;
 		});
 		return $locationsWithLessThen5;
 	}
 	public static function chooseableLocations(){
 		$number = 3;
 		$fillable = self::getFillableLocations()->take($number);
 		if ($fillable->count() === $number){
 			return $fillable;
 		}
 		else{
 			$locations = $fillable;
 			$addedAmout = $number - $fillable->count();
 			for ($i=0; $i < $addedAmout; $i++) { 
 				$exclude = $locations;
 				$locations->push(self::getNewRandomForChooseable($exclude))->values();
 			}
 			$choosable = collect($locations);
 			return $choosable;
 		}
 	}

	public static function getNewRandom() {
		$all = Location::openLocationsTodayAt(2000);
		$filtered = $all->reject(function ($location, $key) {
		    return $location->exclude === 1 ;
		});
		
		$locationsToday = self::allUsedToday();
		return $filtered->diff($locationsToday)->shuffle()->first();

 	}
	public static function getNewRandomForChooseable($exclude) {
		$all = Location::openLocationsTodayAt(2000);
		$filtered = $all->reject(function ($location, $key) {
		    return $location->exclude === 1 ;
		});
		
		$locationsToday = self::allUsedToday();
		return $filtered->diff($locationsToday)->diff($exclude)->shuffle()->first();

 	}
 	public static function allUsedToday(){
 		
 		$uniqueMatches = Match::mToday()->get()->unique('location_id');
 		return self::extractLocationsHelper($uniqueMatches);
 	}

 	public static function extractLocationsHelper($input)
 	{
 		$locations = collect([]);
 		foreach ($input as $i) {
 			$locations->push($i->location);
 		}
 		return $locations;
 	}


}
