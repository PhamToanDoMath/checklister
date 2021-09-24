@extends('layouts.app')

@section('content')
<main class="c-main">
<div class="c-body">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">

                @if( $errors->storeTask->any())
                    <div class="alert alert-danger">
                        <ul class="list-group" style="list-style: none">
                            @foreach ($errors->storeTask->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card mt-3">
                    <div class="card-header"><strong>{{ __('Edit Tasks') }}</strong></div>
                    <div class="card-body">
                        <form action="{{ route('admin.checklists.tasks.update', [$checklist,$task])}}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="company">Name</label>
                                <input class="form-control" name="name" type="text" placeholder="Task name" value="{{ $task->name }}"/>
                            </div>
                            <div class="form-group">
                                <label for="company">Description</label>
                                <textarea class="form-control" name="description" rows="5" placeholder="Description" >{{$task->description}}</textarea>
                            </div>
                    </div>
                            <div class="card-footer">
                                <button class="btn btn-md btn-primary" type="submit">Save Task</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
@endsection
