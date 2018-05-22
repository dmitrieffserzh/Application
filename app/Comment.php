<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\Relation;

Relation::morphMap([
	'post' => 'App\Post'
]);

class Comment extends Model {

	use SoftDeletes;

	protected $fillable = [
		'user_id',
		'parent_id',
		'content',
		'content_id',
		'content_type'
	];

	protected $dates = ['deleted_at'];


	public function contentTypes() {
		return $this->morphedTo();
	}

	public function author() {
		return $this->belongsTo(User::class, 'user_id','id');
	}

	public function replies() {
		return $this->hasMany(Comment::class,'id','parent_id');
	}

	public function children() {
		return $this->hasMany(Comment::class,'parent_id');
	}

}