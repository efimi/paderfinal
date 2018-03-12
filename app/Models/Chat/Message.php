<?php

namespace App\Models\Chat;

use App\Models\Location;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
	protected $fillable = [
		'body', 'location_id'
	];

	protected $appends = [
		'selfOwned',
		'pinwallId',
		'matchPosition'
	];

	public function getSelfOwnedAttribute()
	{
		return $this->user_id === auth()->user()->id;
	}
	public function getPinwallIdAttribute()
	{
	return $this->user->mLocationId();
	}
	public function getMatchPositionAttribute()
	{
	return $this->user->matchPosition();
	}

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    public function location()
    {
    	return $this->belongsTo(Location::class);
    }
}
