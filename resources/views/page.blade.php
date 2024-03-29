@extends('layouts.app')

@section('content')
<main class="c-main">
<div class="c-body">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">{{ $page->title }}</div>
                    <div class="card-body">
                        {!! $page->content !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
@endsection
