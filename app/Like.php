<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\Relation;

Relation::morphMap([
	'post' => 'App\Post'
]);

class Like extends Model {

	use SoftDeletes;

	protected $fillable = [
		'user_id',
		'content_id',
		'content_type'
	];
	protected $dates = ['deleted_at'];

	public function contentTypes() {
		return $this->morphedTo();
	}
}
