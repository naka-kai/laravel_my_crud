@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Posts New Confirm</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('posts.store') }}" method="POST">
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
                        <div class="d-flex">
                            <button type="submit" class="btn btn-primary m-2" name="back" value="true">戻る</button>
                            <button type="submit" class="btn btn-primary m-2" name="store" value="true">作成</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
