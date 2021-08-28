<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Foundation\Console\Presets\React;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class PostController extends Controller
{

    private $formItems = ['title', 'content'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = \App\Post::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    }


    public function new_confirm(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:posts',
            'content' => 'required',
        ]);

        $title = $request->title;
        $content = $request->content;
        $data = [
            'title' => $title,
            'content' => $content
        ];
        return view('posts.new_confirm', $data);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if($request->get('back')) {
            return redirect('posts/create')->withInput();
        }

        $post = new Post;
        $post->user_id = 1;
        $post->title = $request->title;
        $post->content = $request->content;

        $post->save();

        return view('posts.store');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::find($id);
        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $post = Post::find($id);

        if ($request->get('back')) {
            return redirect()->route('posts.show', ['id' => $id]);
        }

        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->updated_at = now();

        $post->save();

        return redirect('/home');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::find($id);
        $post->delete();

        return view('posts.destroy');
    }
}
