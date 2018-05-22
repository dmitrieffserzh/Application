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





	public function add_comment(Request $request) {
		if($request->ajax()) {
			$data = $request->all();
			Comment::create([
				'user_id'=>Auth::id(),
				'parent_id'=> $data['item_id'],
				'content_id'=> 1,
				'content'=> $data['content'],
				'content_type'=> $data['content-type'],
			]);

		}
	}



}
