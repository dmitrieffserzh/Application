<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller {

	public function __construct() {
		$this->middleware( 'auth' );
	}

	public function index() {

	}
}
