<?php

namespace App\Http\Controllers\Auth;

//use App\Profile;
//use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class LoginController extends Controller {
	/*
	|--------------------------------------------------------------------------
	| Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles authenticating users for the application and
	| redirecting them to your home screen. The controller uses a trait
	| to conveniently provide its functionality to your applications.
	|
	*/

	use AuthenticatesUsers;

	/**
	 * Where to redirect users after login.
	 *
	 * @var string
	 */
	protected $redirectTo = '/';

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware( 'guest' )->except( 'logout' );
	}


	// AJAX AUTH
	protected function ajax_auth( Request $request ) {

		$auth        = false;
		$credentials = $request->only( 'email', 'password' );

		if ( Auth::attempt( $credentials, $request->has( 'remember' ) ) ) {
			$auth = true; // Success
		}

		if ( $request->isMethod( 'post' ) && $request->ajax() ) {

			$returnHTML = view( 'auth.ajax_login-form' )->render();
			return response()->json( array( 'success' => true, 'auth' => $auth, 'html' => $returnHTML ) );

		} else {
			return redirect()->intended( URL::previous() );
		}
		//return redirect( URL::route( 'login' ) );
	}


	public function logout() {
		Cache::forget( 'user-is-online-' . Auth::id() );
		Auth::logout();

		return redirect( '' );
	}
}
