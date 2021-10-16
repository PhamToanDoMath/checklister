<div class="row">
<div class="col-md-8">
    <div class="card">
        <div class="card-header"><h4><strong>{{$checklist->name}}</strong></h4></div>
        <div class="card-body">
            <table class="table">
                @foreach ($checklist->tasks->where('user_id',NULL) as $task)
                <tr>
                    <td width="5%">
                        <input wire:click="complete_task({{$task->id}})" type="checkbox"
                            @if(in_array($task->id,$completed_tasks)) checked="checked" @endif/>
                    </td>
                    <td width="90%"><a href="#" wire:click.prevent="toggle_task({{$task->id}})"> {{$task->name}}</a></td>
                    <td width="5%" wire:click="toggle_task({{$task->id}})">
                        @if(in_array($task->id,$opened_tasks))
                        <svg class="c-sidebar-nav-icon">
                            <use
                                xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-chevron-circle-up-alt') }}">
                            </use>
                        </svg>
                        @else
                        <svg class="c-sidebar-nav-icon">
                            <use
                                xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-chevron-circle-down-alt') }}">
                            </use>
                        </svg>
                        @endif
                    </td>

                </tr>
                @if (in_array($task->id,$opened_tasks))
                <tr">
                    <td></td>
                    <td colspan="2">{!!$task->description !!}</td>
                    </tr>
                    @endif
                    @endforeach
            </table>
        </div>
    </div>
</div>


@if(!is_null($current_task))
    <div class="col-md-4">
        <div class="card">
            <div class="card-header"><h4><strong>{{$current_task->name}}</strong></h4></div>
        </div>
        <div class="card">
            <div class="card-body">
                @if(is_null($current_task->added_my_day_at))
                    <a wire:click.prevent="add_to_my_day({{$current_task->id}})" href="#">Add to My Day</a>
                @else
                    <a wire:click.prevent="add_to_my_day({{$current_task->id}})" href="#">Remove from My Day</a>
                @endif
                </br>
                @if(!$current_task->is_important)
                    <a wire:click.prevent="mark_as_important({{$current_task->id}})" href="#">Add to Important Note</a>
                @else
                    <a wire:click.prevent="mark_as_important({{$current_task->id}})" href="#">Remove from Important Note</a>
                @endif
            </div>
        </div>
    </div>
@endif
</div>
