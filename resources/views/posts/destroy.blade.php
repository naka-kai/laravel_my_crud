@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Posts Store</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>削除しました</p>

                    <a href="{{ route('posts.index') }}"><button class="btn btn-primary">一覧へ戻る</button></a>

            </div>
        </div>
    </div>
</div>
@endsection
