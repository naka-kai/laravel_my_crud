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
                                @foreach ($errors as $error)
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
                        <a href="{{ route('posts.index') }}"><button type="button" class="btn btn-primary">一覧へ戻る</button></a>
                        <button type="submit" class="btn btn-primary">確認</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
