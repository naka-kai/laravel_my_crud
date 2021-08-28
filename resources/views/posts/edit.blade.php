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

                        <form action="{{ route('posts.update', $post->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="title">タイトル</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') ?? $post->title }}">
                            </div>
                            <div class="form-group">
                                <label for="content">内容</label>
                                <textarea class="form-control" name="content" id="content" cols="30" rows="10">{{ old('content') ?? $post->content }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary" name="back" value="true">戻る</button>
                            <button type="submit" class="btn btn-primary" name="submit" value="true">更新</button>
                        </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
