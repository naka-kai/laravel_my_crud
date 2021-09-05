@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Posts Edit Confirm</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('posts.update', $post->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">タイトル</label>
                            <div>{{ $title }}</div>
                            <input type="hidden" name="title" value="{{ $title }}">
                        </div>
                        <div class="form-group">
                            <label for="content">内容</label>
                            <div>{{ $content }}</div>
                            <input type="hidden" name="content" value="{{ $content }}">
                        </div>
                        <div class="form-group">
                            <label for="date">開催日時</label>
                            <span>{{ \Carbon\Carbon::parse($start_date)->format('Y年m月d日') . ' ' }}</span>
                            <input type="hidden" name="start_date" value="{{ $start_date }}">
                            <span>{{ $start_time . ' ' }}</span>
                            <input type="hidden" name="start_time" value="{{ $start_time }}">
                            <span> 〜 </span>
                            <span>{{ \Carbon\Carbon::parse($end_date)->format('Y年m月d日') . ' ' }}</span>
                            <input type="hidden" name="end_date" value="{{ $end_date }}">
                            <span>{{ $end_time }}</span>
                            <input type="hidden" name="end_time" value="{{ $end_time }}">

                        </div>
                        <div class="form-group">
                            <label for="place">開催場所</label>
                            <div>{{ $place }}</div>
                            <input type="hidden" name="place" value="{{ $place }}">
                        </div>
                        @if (isset($placeurl))
                        <div class="form-group">
                            <label for="placeurl">開催場所URL</label>
                            <div>{{ $placeurl }}</div>
                            <input type="hidden" name="placeurl" value="{{ $placeurl }}">
                        </div>
                        @endif
                        <div class="form-group">
                            <label for="price">出店料金</label>
                            <div>{{ number_format($price).'円' }}</div>
                            <input type="hidden" name="price" value="{{ $price }}">
                        </div>
                        <div class="form-group">
                            <label for="parking">駐車場</label>
                            <div>{{ $parkingArray[$parking] }}</div>
                            <input type="hidden" name="parking" value="{{ $parking }}">
                        </div>
                        @if (isset($other))
                        <div class="form-group">
                            <label for="other">その他</label>
                            <div>{{ $other }}</div>
                            <input type="hidden" name="other" value="{{ $other }}">
                        </div>
                        @endif
                        <div class="d-flex">
                            <button type="submit" class="btn btn-primary m-2" name="back" value="back">戻る</button>
                            <button type="submit" class="btn btn-primary m-2" name="submit" value="submit">変更</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
