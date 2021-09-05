@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Url</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- <p>{{ $url }}</p> --}}

                    <form action="showurl" method="get">
                        @csrf
                        <input type="text" name="url">
                        <input type="submit">
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
