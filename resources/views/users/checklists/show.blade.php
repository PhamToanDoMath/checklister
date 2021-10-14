@extends('layouts.app')

@section('content')
<main class="c-main">
    <div class="c-body">
        <div class="container">
            @livewire('header-totals-count',['checklist_group_id' => $checklist->checklist_group_id])
            @livewire('checklist-show',['checklist' => $checklist])
        </div>
    </div>
</main>
@endsection