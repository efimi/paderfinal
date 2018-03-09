<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OpeningHour extends Model
{
	
    public function location()
    {
    	return $this->belongsTo(Location::class);
    }
    public static function allOpenToday($time = 2000)
    {
    	$thisDay = today()->dayOfWeek + 1;
        $nextDay = today()->addDay(1)->dayOfWeek + 1;
    	$open = OpeningHour::where('day_id', $thisDay)->where('opened','<', $time)->where('closed','>', $time)
                            ->orWhere('day_id', $thisDay)->where('opened','<', $time)->where('closed', "")
    						->orWhere('day_id', $nextDay)->where('opened',"")->where('closed', '<', $time)
    						->get();
    	return $open;
    }
}
