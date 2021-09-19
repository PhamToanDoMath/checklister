@extends('layouts.app')

@section('content')
<main class="c-main">
<div class="c-body">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @if( $errors->any())
                    <div class="alert alert-danger">
                        <ul class="list-group" style="list-style: none">
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card">
                    <form action="{{ route('admin.checklist_groups.checklists.update', [$checklistGroup, $checklist])}}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="card-header"><strong>{{ __('Edit Checklist Group') }}</strong></div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="company">Name</label>
                                <input class="form-control" name="name" type="text" value="{{$checklist->name}}" />
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-md btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
                <form class="ml-3" action="{{ route('admin.checklist_groups.checklists.destroy', [$checklistGroup, $checklist])}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-md btn-danger " type="submit" onclick="return confirm('Are you sure you want to delete this?');">Delete this checklist</button>
                </form>
            </div>
        </div>
    </div>
</div>
</main>
@endsection
