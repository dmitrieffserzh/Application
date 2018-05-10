<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Extensions\Qevix;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Pagination\Paginator;
use Validator;

class PostController extends Controller {

	public function __construct() {
		//$this->middleware('auth');
	}

	public function index(Request $request) {

		$posts = Post::paginate(15);

		if($request->ajax()) {
			return view('posts.partials.item', compact('posts'));
		} else {

			return view('posts.index', compact('posts'));
		}
	}


	// CREATE POST IN LIST
	public function createInList( Request $request ) {

		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		$qevix = new Qevix();

		// Задает список разрешенных тегов
		$qevix->cfgAllowTags( array( 'b', 'i', 'u', 'a', 'img', 'ul', 'li', 'ol', 'p') );

		// Указывает, какие теги считать короткими (<br>, <img>)
		$qevix->cfgSetTagShort( array( 'br', 'img') );

		//  Указывает преформатированные теги, в которых нужно всё заменять на HTML сущности
		//$qevix->cfgSetTagPreformatted( array( 'svg', 'use' ) );

		// Указывает теги, внутри которых не нужна авто-расстановка тегов перевода на новую строку
		$qevix->cfgSetTagNoAutoBr( array( 'ul', 'ol' ) );

		// Указывает теги, которые необходимо вырезать вместе с содержимым
		$qevix->cfgSetTagCutWithContent( array( 'script', 'object', 'iframe', 'style' ) );

		// Указывает теги, после которых не нужно добавлять дополнительный перевод строки. Например, блочные теги
		$qevix->cfgSetTagBlockType( array( 'ol', 'ul') );

		// Добавляет разрешенные параметры для тегов. Значение по умолчанию - шаблон #text. Разрешенные шаблоны #text, #int, #link, #regexp(...) (Например: "#regexp(\d+(%|px))")
		$qevix->cfgAllowTagParams( 'a', array(
			'title',
			'href'     => '#link',
			'rel'      => '#text',
			'target'   => array( '_blank' )
		) );

		$qevix->cfgAllowTagParams( 'img', array(
			'src'    => '#text',
			'alt'    => '#text',
			'title'
		) );

		$qevix->cfgSetAutoLinkMode(false);

		// Добавляет обязательные параметры для тега
		$qevix->cfgSetTagParamsRequired( 'img', 'src' );
		$qevix->cfgSetTagParamsRequired( 'a', 'href' );


		////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		$rules = array(
			'title'   => 'required|min:3',
			'content' => 'required|min:10'
		);

		$messages = array(
			'title' => [
				'required' => 'Заполните подалуйста заголовок!',
				'min' => 'Содержимое не может быть короче 3x символов!',
			],

			'content' => 'Заполните подалуйста содержимое поста!|Содержимое не может быть короче 10 символов!'
		);

		$validator = Validator::make( $request->all(), $rules, $messages);

		$result            = $request->all();
		$result['content'] = $request['content'];
		$result['content'] = $qevix->parse( $result['content'], $errors );
		$result['user_id'] = Auth::id();

		if ( $request->ajax() ) {
			if ( $validator->passes() ) {
				Post::create( $result );

				return response()->json( [ 'success' => 'Запись опубликована!' ] );
			}

			return response()->json( [ 'error' => $validator] );
		}

		return false;

	}

	// IMAGE UPLOADER
	public function upload(Request $request) {
		$path =  '';//public_path()//*.'\uploads\images\\*/;
		echo $path;
		$file = $request->file('file');
		$filename = str_random(20) .'.' . $file->getClientOriginalExtension() ?: 'png';
		$img = Image::make($file);
		$img->save($path . $filename);
		echo '/uploads/'.$filename;
	}
}
