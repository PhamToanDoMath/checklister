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

                    <div class="card">
                        <form
                            action="{{ route('admin.checklist_groups.checklists.update', [$checklistGroup, $checklist])}}"
                            method="POST">
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
                                <button class="btn btn-md btn-primary" type="submit">Save Checklist</button>
                            </div>
                        </form>
                    </div>
                    <form
                        action="{{ route('admin.checklist_groups.checklists.destroy', [$checklistGroup, $checklist])}}"
                        method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-md btn-danger " type="submit"
                            onclick="return confirm('Are you sure you want to delete this?');">Delete this
                            checklist</button>
                    </form>

                    <hr>{{--================================================--}}

                    <div class="card">
                        <div class="card-header"><i
                                class="fa fa-align-justify"></i><strong>{{__('List of Tasks')}}</strong></div>
                        <div class="card-body">
                            @livewire('tasks-table', ['checklist' => $checklist ])
                        </div>
                    </div>

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
                        <div class="card-header"><strong>{{ __('New Tasks') }}</strong></div>
                        <div class="card-body">
                            <form action="{{ route('admin.checklists.tasks.store', $checklist)}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="company">Name</label>
                                    <input class="form-control" name="name" type="text" placeholder="Task name"
                                        value="{{ old('name') }}" />
                                </div>
                                <div class="form-group">
                                    <label for="company">Description</label>
                                    <textarea id="editor" class="form-control" name="description"
                                        placeholder="Description" value="{{ old('description')}}"></textarea>
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
    </div>
</main>
@endsection

@section('scripts')
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection