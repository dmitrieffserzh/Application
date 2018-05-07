<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Cache;

class User extends Authenticatable {
    use Notifiable;

    protected $fillable = [
        'nickname', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

	public function liked() {
		return $this->morphedByMany('App\Post', 'content_id')->whereDeletedAt(null);
	}

    public function profile() {
        return $this->hasOne('App\Profile');
    }

    public function isOnline() {
        return Cache::has('user-is-online-' . $this->id);
    }

}
