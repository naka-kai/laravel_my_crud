@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Posts Create</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('posts.new_confirm') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">タイトル</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
                        </div>
                        <div class="form-group">
                            <label for="content">内容</label>
                            <textarea class="form-control" name="content" id="content" cols="30" rows="10">{{ old('content') }}</textarea>
                        </div>
                        <div class="d-flex">
                            <span>開催開始日時</span>
                            <div class="form-group mx-2">
                                <input type="date" name="start_date" value="{{ old('start_date') }}">
                            </div>
                            <div class="form-group">
                                <input name="start_time" type="time" value="{{ old('start_time') }}">
                            </div>
                        </div>
                        <div class="d-flex">
                            開催終了日時
                            <div class="form-group mx-2">
                                <input name="end_date" type="date" value="{{ old('end_date') }}">
                            </div>
                            <div class="form-group">
                                <input name="end_time" type="time" value="{{ old('end_time') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="place">開催場所</label>
                            <input type="text" class="form-control" name="place" id="place" value="{{ old('place') }}">
                        </div>
                        <div class="form-group">
                            <label for="placeurl">開催場所URL</label>
                            <input type="url" class="form-control" name="placeurl" id="placeurl" value="{{ old('placeurl') }}">
                        </div>
                        <div class="form-group">
                            <label for="price">出店料金</label>
                            <input type="text" class="form-control" name="price" id="price" value="{{ old('price') }}">
                        </div>
                        <div class="form-group">
                            <p>駐車場</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="parking" id="parking" value="1" {{ old('parking') === '1' ? 'checked' : '' }}>
                                <label class="form-check-label" for="parking">
                                有り
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="parking" id="notparking" value="0" {{ old('parking') === '0' ? 'checked' : '' }}>
                                <label class="form-check-label" for="notparking">
                                無し
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="parking" id="notclear" value="2" {{ old('parking') === '2' ? 'checked' : '' }}>
                                <label class="form-check-label" for="notclear">
                                不明
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="other">その他</label>
                            <textarea class="form-control" name="other" id="other">{{ old('other') }}</textarea>
                        </div>
                        {{-- <div>{!! nl2br($message->body_with_link) !!}</div> --}}
                        <a href="{{ route('posts.index') }}"><button type="button" class="btn btn-primary">一覧へ戻る</button></a>
                        <button type="submit" class="btn btn-primary">確認</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
