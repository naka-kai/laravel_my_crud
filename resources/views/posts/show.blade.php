@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Posts Show</div>

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
                                        <th class="col" style="width:25%">{{ __('作成日時') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="col" style="width:25%">{{ $post->title }}</td>
                                        <td class="col" style="width:50%">{{ $post->content }}</td>
                                        <td class="col" style="width:25%">{{ $post->created_at }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="d-flex">
                            <form action="{{ route('posts.index') }}">
                                <button type="submit" class="btn btn-primary m-2">戻る</button>
                            </form>

                            @auth
                            <a href="{{ route('posts.edit', $post->id) }}"><button type="button" class="btn btn-primary m-2">編集</button></a>

                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                @csrf
                                <button type="submit" name="delete" class="btn btn-danger m-2" onclick="delete_alert(event); return false;">削除</button>
                            </form>
                        </div>
                        @endauth

            </div>
        </div>
    </div>
</div>

<script type="application/javascript">
    'use strict';

    function delete_alert(e) {
        if(!window.confirm('本当に削除しますか？')) {
            window.alert('キャンセルされました');
            return false;
        }
        document.deleteform.submit();
    }
</script>
@endsection
