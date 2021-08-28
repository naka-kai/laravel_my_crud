@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Index</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <div>
                        <table>
                            <thead>
                                <tr>
                                    <th>{{ __('User_id') }}</th>
                                    <th>{{ __('Title') }}</th>
                                    <th>{{ __('Content') }}</th>
                                    <th>{{ __('Created_at') }}</th>
                                    <th>{{ __('Updated_at') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ()

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
