<?php

namespace App\Models;

use App\Models\Chat\Message;
use App\Models\Feedback;
use App\Models\Location;
use App\Models\Match;
use App\Models\Rating;
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

    protected $appends = [
        'score',
    ];

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
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    

    public function getScoreAttribute()
    {
        // every Match 100
        $score_matches = $this->matches()->count() * 100;
        $score_messages = $this->messages()->count();
        $score_subscribtion = $this->subscribed * 200;
        return $score_messages + $score_matches + $score_subscribtion;
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
            return count($user->mToday()) === 1 ;
        });
        return $filtered;
    }
  
}
