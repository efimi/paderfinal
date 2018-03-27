<?php

namespace App\Models;

use App\Models\Match;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    public function match()
    {
    	return $this->belongsTo(Match::class);
    }
}
