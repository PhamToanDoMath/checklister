@extends('layouts.app')

@section('content')
<main class="c-main">
<div class="c-body">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(isset($success))
                    <div class="alert alert-success">
                        {{ __('Successfully deleted the item')}}
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
@endsection
