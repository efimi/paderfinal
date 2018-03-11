<?php

namespace App\Models;

use App\Models\Location;
use App\Models\Match;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

     public function history()
    {
        return $this->hasMany(History::class);
    }
    public function matches()
    {
        return $this->hasMany(Match::class);
    }

    public function mToday()
    {
        return $this->matches()->whereDate('created_at', today())->first();
    }
    public function mLocationId()
    {
        if(count($this->mToday())){
            return $this->mToday()->location->id;
        }
        return null;
    }
    
}
