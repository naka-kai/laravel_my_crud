@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">Posts Edit</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <form action="{{ route('posts.edit_confirm') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="title">タイトル</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') ?? $post->title }}">
                            </div>
                            <div class="form-group">
                                <label for="content">内容</label>
                                <textarea class="form-control" name="content" id="content" cols="30" rows="10">{{ old('content') ?? $post->content }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="date">開催開催日時</label>
                                <div class="d-flex">
                                    <input type="date" class="form-control mr-2" name="start_date" value="{{ old('start_date') ?? $post->start_date }}">
                                    <input type="time" class="form-control" name="start_time" value="{{ old('start_time') ?? $post->start_time }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="date">開催終了日時</label>
                                <div class="d-flex">
                                    <input type="date" class="form-control mr-2" name="end_date" value="{{ old('end_date') ?? $post->end_date }}">
                                    <input type="time" class="form-control" name="end_time" value="{{ old('end_time') ?? $post->end_time }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="place">開催場所</label>
                                <input type="text" class="form-control" id="place" name="place" value="{{ old('place') ?? $post->place }}">
                            </div>
                            <div class="form-group">
                                <label for="placeurl">開催場所URL</label>
                                <input type="text" class="form-control" id="placeurl" name="placeurl" value="{{ old('placeurl') ?? $post->placeurl }}">
                            </div>
                            <div class="form-group">
                                <label for="price">出店料金</label>
                                <input type="text" class="form-control" id="price" name="price" value="{{ old('price') ?? $post->price }}">
                            </div>
                            <div class="form-group">
                            <p>駐車場</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="parking" id="parking" value="1" @if (old('parking', $post->parking) === 1)
                                checked
                                @endif>
                                <label class="form-check-label" for="parking">
                                有り
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="parking" id="notparking" value="0" @if (old('parking', $post->parking) === 0)
                                checked
                                @endif>
                                <label class="form-check-label" for="notparking">
                                無し
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="parking" id="notclear" value="2" @if (old('parking', $post->parking) === 2)
                                checked
                                @endif>
                                <label class="form-check-label" for="notclear">
                                不明
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="other">その他</label>
                                <input type="text" class="form-control" id="other" name="other" value="{{ old('other') ?? $post->other }}">
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit" value="back">戻る</button>
                            <button type="submit" class="btn btn-primary" name="submit" value="submit">確認</button>
                        </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
