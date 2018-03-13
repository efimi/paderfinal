<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = [
		'body', 'location_id'
	];

	public function user()
    {
    	return $this->belongsTo(User::class);
    }
    public function location()
    {
    	return $this->belongsTo(Location::class);
    }
}
