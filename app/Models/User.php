<?php

namespace App\Models;

use App\Models\Chat\Message;
use App\Models\Feedback;
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
        'name', 'email', 'password', 'subscribed', 'one_signal_player_id', 'token'
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
    public function messages()
    {
        return $this->hasMany(Message::class);
    }
    public function feedback()
    {
        return $this->hasMany(Feedback::class);
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
    // Today
    public function matchPosition()
    {
        if (count($match = $this->mToday())) {
         $participants = $match->users();
            foreach ($participants as $position => $user) {
                if ($this->id == $user->id) {
                    return $position + 1;
                }
            }
        }
        return null;
    }
    
    /**
     * Notifications
     */
    public function routeNotificationForOneSignal()
    {
        return $this->one_signal_player_id;
    }
    
    public static function allUnmatchedToday()
    {
        $all = User::all();
        $filtered = $all->reject(function ($user, $key) {
            return count($user->mToday) === 1 ;
        });
        return $filtered;
    }
  
}
