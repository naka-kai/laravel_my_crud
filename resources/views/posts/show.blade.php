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
                                    <tr class="tr">
                                        <th class="th">{{ __('タイトル') }}</th>
                                        <td class="td">{{ $post->title }}</td>
                                    </tr>
                                    <tr class="tr">
                                        <th class="th">{{ __('内容') }}</th>
                                        <td class="td">{{ $post->content }}</td>
                                    </tr>
                                    <tr class="tr">
                                        <th class="th">{{ __('開催日時') }}</th>
                                        <td class="td">{{ \Carbon\Carbon::parse($post->start_date)->format('Y年m月d日') . ' ' . $post->start_time . ' 〜 ' . \Carbon\Carbon::parse($post->end_date)->format('Y年m月d日') . ' ' . $post->end_time }}</td>
                                    </tr>
                                    <tr class="tr">
                                        <th class="th">{{ __('開催場所') }}</th>
                                        <td class="td">{{ $post->place }}</td>
                                    </tr>
                                    @if (isset($post->placeurl))
                                    <tr class="tr">
                                        <th class="th">{{ __('開催場所URL') }}</th>
                                        <td class="td">{{ $post->placeurl }}</td>
                                    </tr>
                                    @endif
                                    <tr class="tr">
                                        <th class="th">{{ __('出店料金') }}</th>
                                        <td class="td">{{ number_format($post->price).'円' }}</td>
                                    </tr>
                                    <tr class="tr">
                                        <th class="th">{{ __('駐車場') }}</th>
                                        <td class="td">{{ $post->parking }}</td>
                                    </tr>
                                    @if (isset($post->other))
                                    <tr class="tr">
                                        <th class="th">{{ __('その他') }}</th>
                                        <td class="td">{{ $post->other }}</td>
                                    </tr>
                                    @endif
                            </table>
                        </div>

                        <div class="d-flex">
                            <form action="{{ route('posts.index') }}">
                                <button type="submit" class="btn btn-primary m-2">戻る</button>
                            </form>

                            @auth
                            <a href="{{ route('posts.edit', $post->id) }}"><button type="button" class="btn btn-primary m-2">編集</button></a>

                            {{-- <form action="{{ route('posts.edit', $post->id) }}" method="POST">
                                @csrf
                                <button type="submit" name="edit" class="btn btn-danger m-2">編集</button>
                            </form> --}}

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
