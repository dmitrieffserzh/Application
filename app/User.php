<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable {
	use Notifiable;
	use SoftDeletes;

	protected $fillable = [
		'nickname',
		'email',
		'password',
	];

	protected $hidden = [
		'password',
		'remember_token',
	];


	public function liked() {
		return $this->morphedByMany( 'App\Post', 'content_id' )->whereDeletedAt( null );
	}

	public function profile() {
		return $this->hasOne( 'App\Profile' );
	}

	public function isOnline() {
		return Cache::has( 'user-is-online-' . $this->id );
	}

//	public function getLikedAttribute() {
//		$like = $this->like()->where('user_id', Auth::id())->first();
//		return !is_null($like);
//	}


	public function followers() {
		return $this->belongsToMany( User::class, 'follows', 'user_id', 'follower_id' )->withTimestamps();
	}

	public function followings() {
		return $this->belongsToMany( User::class, 'follows', 'follower_id', 'user_id' )->withTimestamps();
	}
}
