<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;

use Illuminate\Http\Request;

class PostController extends Controller {



    public function index() {

        $posts = Post::paginate(15);
        return view('posts.index', compact('posts'));
    }


    public function create() {
        return view('posts.create');
    }


    public function store(Request $request) {
        request()->validate([
            'title' => 'required',
            'body' => 'required',
        ]);
        Post::create($request->all());
        return redirect()->route('articles.index')
            ->with('success','Article created successfully');
    }


    public function show(Request $request, $id) {

        $post = Post::find($id);
        Event::fire('posts.view', $post);

        return view('posts.view',compact('post'));
    }


    public function edit($id) {
        $article = Article::find($id);
        return view('articles.edit',compact('article'));
    }


    public function update(Request $request, $id) {
        request()->validate([
            'title' => 'required',
            'body' => 'required',
        ]);
        Post::find($id)->update($request->all());
        return redirect()->route('articles.index')
            ->with('success','Article updated successfully');
    }


    public function destroy($id)
    {
        Post::find($id)->delete();
        return redirect()->route('articles.index')
            ->with('success','Article deleted successfully');
    }
}
