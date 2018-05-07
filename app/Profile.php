<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model {

    protected $fillable = ['name', 'surname', 'city', 'phone', 'about_user', 'offline'];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
