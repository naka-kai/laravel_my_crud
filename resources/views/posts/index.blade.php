@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">Posts Index</div>

                @auth
                <form action="{{ route('posts.create') }}">
                    <button class="btn btn-primary m-3">新規作成</button>
                </form>
                @endauth

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="col" style="width:25%">{{ __('タイトル') }}</th>
                                    <th class="col" style="width:50%">{{ __('内容') }}</th>
                                    <th class="col" style="width:25%">{{ __('詳細') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($posts))
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td class="col" style="width:25%">{{ $post->title }}</td>
                                            <td class="textOverflow col" style="width:50%">{{ $post->content }}</td>
                                            <td class="col" style="width:25%">
                                                <a href="/posts/show/{{ $post->id }}">詳細を見る</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
