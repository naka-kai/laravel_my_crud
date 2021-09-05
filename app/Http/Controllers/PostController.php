<?php

namespace App\Http\Controllers;

use App\Calendar\CalendarView;
use App\Calendar\CalendarWeek;
use App\Post;
use Illuminate\Foundation\Console\Presets\React;
use Illuminate\Http\Request;
// use Request;
use App\Http\Requests\PostRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Symfony\Component\VarDumper\Cloner\Data;

// use App\Calendar\CalenderView;

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


    public function new_confirm(PostRequest $request)
    {

        $title = $request->title;
        $content = $request->content;

        $start_date = $request->start_date;
        $start_time = $request->start_time;
        $end_date = $request->end_date;
        $end_time = $request->end_time;

        $place = $request->place;
        $place_url = $request->place_url;
        $price = $request->price;

        $parking = $request->parking;
        $parkingArray = [
            0 => '無し',
            1 => '有り',
            2 => '不明',
        ];

        $other = $request->other;
        $data = [
            'title' => $title,
            'content' => $content,
            'start_date' => $start_date,
            'start_time' => $start_time,
            'end_date' => $end_date,
            'end_time' => $end_time,
            'place' => $place,
            'place_url' => $place_url,
            'price' => $price,
            'parking' => $parking,
            'other' => $other,
            'parkingArray' => $parkingArray,
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
        if ($request->get('back')) {
            return redirect('posts/create')->withInput();
        }
        if (!$request->isMethod('post')) {
            return redirect('posts/create');
        }

        $post = new Post;

        $post->start_date = $request->start_date;
        $post->start_time = $request->start_time;
        $post->end_date = $request->end_date;
        $post->end_time = $request->end_time;

        $post->title = $request->title;
        $post->content = $request->content;
        $post->place = $request->place;
        $post->place_url = $request->place_url;
        $post->price = $request->price;
        $post->parking = $request->parking;
        $post->other = $request->other;

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

        if ($post->parking === 1) {
            $post->parking = '有り';
        } elseif ($post->parking === 0) {
            $post->parking = '無し';
        } elseif ($post->parking === 2) {
            $post->parking = '不明';
        }

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

    public function edit_confirm(PostRequest $request)
    {

        dd($request->get('back'));
        $id = $request->id;

        if (!$request->isMethod('post')) {
            return redirect('/');
        }

        if ($request->submit == '戻る') {
            // dd($request->get('back'));
            return redirect()->route('posts.show', ['id' => $id]);
        }

        $title = $request->title;
        $content = $request->content;

        $start_date = $request->start_date;
        $start_time = $request->start_time;
        $end_date = $request->end_date;
        $end_time = $request->end_time;

        $place = $request->place;
        $place_url = $request->place_url;
        $price = $request->price;

        $parking = $request->parking;
        $parkingArray = [
            0 => '無し',
            1 => '有り',
            2 => '不明',
        ];

        $other = $request->other;
        $data = [
            'id' => $id,
            'title' => $title,
            'content' => $content,
            'start_date' => $start_date,
            'start_time' => $start_time,
            'end_date' => $end_date,
            'end_time' => $end_time,
            'place' => $place,
            'place_url' => $place_url,
            'price' => $price,
            'parking' => $parking,
            'other' => $other,
            'parkingArray' => $parkingArray,
        ];
        return view('posts.edit_confirm', $data);
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

        if (!$request->isMethod('post')) {
            return redirect('/');
        }

        if ($request->submit == '戻る') {
            dd($request->submit);
            return redirect()->route('posts.edit', ['id' => $id]);
        }


        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->start_date = $request->input('start_date');
        $post->start_time = $request->input('start_time');
        $post->end_date = $request->input('end_date');
        $post->end_time = $request->input('end_time');
        $post->updated_at = now();

        $post->save();

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        if (!$request->isMethod('post')) {
            return redirect('/');
        }
        $post = Post::find($id);
        $post->delete();

        return view('posts.destroy');
    }


    public function showurl(Request $url)
    {

        //
        $getUrl = $url::all();
        return redirect()->away($getUrl['url']);
    }


}
