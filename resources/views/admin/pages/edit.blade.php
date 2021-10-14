@extends('layouts.app')

@section('content')
<main class="c-main">
<div class="c-body">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">

                @if( $errors->any())
                    <div class="alert alert-danger">
                        <ul class="list-group" style="list-style: none">
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(session('message'))
                    <div class="alert alert-success">{{session('message')}}</div>
                @endif

                <div class="card mt-3">
                    <div class="card-header"><strong>{{ __('Edit Pages') }}</strong></div>
                    <div class="card-body">
                        <form action="{{ route('admin.pages.update', $page)}}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="title">Name</label>
                                <input class="form-control" name="title" type="text" placeholder="Title" value="{{ $page->title }}"/>
                            </div>
                            <div class="form-group">
                                <label for="content">Description</label>
                                <textarea class="form-control" id="editor" name="content" rows="5" placeholder="Content" >{{$page->content}}</textarea>
                            </div>
                    </div>
                            <div class="card-footer">
                                <button class="btn btn-md btn-primary" type="submit">Save</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
@endsection

@section('scripts')
@include('ckeditor')
@endsection