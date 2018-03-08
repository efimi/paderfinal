<?php

namespace App\Models;

use App\Models\Location;
use App\Models\Match;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
	public function matches()
	{
		return $this->hasMany(Match::class);
	}
 	public function usedPlaces()
 	{
 		return Match::mToday()->where('location_id', $this->id)->count();
 	}
	public static function getLocation()
	{
		if (!empty(self::getLocationWithFreeSpace())) {
			return self::getLocationWithFreeSpace();
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
 	public static function getLocationWithFreeSpace() {
 		$locationsWithLessThen5 = self::allUsedToday()->filter(function($loc){
 			return $loc->usedPlaces() < 5;
 		});
 		return $locationsWithLessThen5->first();
 	}

	public static function getNewRandom() {
		$all = Location::all();
		$locationsToday = self::allUsedToday();
		return $all->diff($locationsToday)->random();
 	}
 	public static function allUsedToday(){
 		
 		$uniqueMatches = Match::mToday()->get()->unique('location_id');
 		$locations = collect([]);
 		foreach ($uniqueMatches as $m) {
 			$locations->push($m->location);
 		}
 		return $locations;
 	}


}
