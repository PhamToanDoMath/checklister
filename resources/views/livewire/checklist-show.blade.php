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
                        {{-- @if(in_array($task->id,$opened_tasks))
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
                        @endif --}}
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
            <div class="card-body">
                <div class="float-right">
                    @if ($current_task->is_important)
                        <a style="font-size:20px" wire:click.prevent="mark_as_important({{ $current_task->id }})" href="#">&starf;</a>
                    @else
                        <a style="font-size:20px" wire:click.prevent="mark_as_important({{ $current_task->id }})" href="#">&star;</a>
                    @endif
                </div>
                <h4><strong>{{$current_task->name}}</strong></h4>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                &#9993;
                &nbsp;
                @if ($current_task->reminder_date)
                    {{ __('Reminder to be sent at') }} {{ $current_task->reminder_date->format('M j, Y H:i') }}
                    &nbsp;&nbsp;
                    <a wire:click.prevent="set_reminder({{ $current_task->id }})" href="#">{{ __('Remove') }}</a>
                @else
                    <a wire:click.prevent="toggle_reminder" href="#">{{ __('Remind me') }}</a>
                    @if ($reminder_opened)
                        <ul>
                            <li>
                                <a wire:click.prevent="set_reminder({{ $current_task->id }}, '{{ today()->addDay()->toDateString() }}')"
                                   href="#">{{ __('Tomorrow') }} {{ date('H') }}:00</a>
                            </li>
                            <li>
                                <a wire:click.prevent="set_reminder({{ $current_task->id }}, '{{ today()->addWeek()->startOfWeek()->toDateString() }}')"
                                   href="#">{{ __('Next Monday') }} {{ date('H') }}:00</a>
                            </li>
                            <li>
                                {{ __('Or pick a date & time') }}
                                <div class="row mt-1">
                                    <div class="col-md-6">
                                        <input wire:model="reminder_date" class="form-control" type="date"/>
                                    </div>
                                    <div class="col-md-4">
                                        <select wire:model="reminder_hour" class="form-control">
                                            @foreach (range(0,23) as $hour)
                                                <option value="{{ $hour }}">{{ $hour }}:00</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mt-1">
                                    <button wire:click.prevent="set_reminder({{ $current_task->id }}, 'custom')"
                                            class="btn btn-primary">{{ __('Save') }}</button>
                                </div>
                            </li>
                        </ul>
                    @endif
                @endif
                <hr/>
                &#9745;
                @if(is_null($current_task->added_my_day_at))
                    <a wire:click.prevent="add_to_my_day({{$current_task->id}})" href="#">Add to My Day</a>
                @else
                    <a wire:click.prevent="add_to_my_day({{$current_task->id}})" href="#">Remove from My Day</a>
                @endif
                <hr>
                @if(!$current_task->is_important)
                    <a wire:click.prevent="mark_as_important({{$current_task->id}})" href="#">Add to Important Note</a>
                @else
                    <a wire:click.prevent="mark_as_important({{$current_task->id}})" href="#">Remove from Important Note</a>
                @endif
                <hr>
                @if ($current_task->due_date)
                    Due to {{ date('d-m-Y', strtotime($current_task->due_date));
                }}
                    &nbsp;&nbsp;
                    <a wire:click.prevent="set_due_date({{ $current_task->id }})" href="#">{{ __('Remove') }}</a>
                @else
                    <a wire:click.prevent="toggle_due_date({{$current_task->id}})" href="#">{{__('Pick the due date')}}</a>
                    @if ($due_date_opened)
                        <ul>
                            <li>
                                <a wire:click.prevent="set_due_date({{ $current_task->id }}, '{{ today()->toDateString() }}')"
                                    href="#">{{ __('Today') }}</a>
                            </li>
                            <li>
                                <a wire:click.prevent="set_due_date({{ $current_task->id }}, '{{ today()->addDay()->toDateString() }}')"
                                    href="#">{{ __('Tomorrow') }}</a>
                            </li>
                            <li>
                                <a wire:click.prevent="set_due_date({{ $current_task->id }}, '{{ today()->addWeek()->startOfWeek()->toDateString() }}')"
                                    href="#">{{ __('Next week') }}</a>
                            </li>
                            <li>
                                {{ __('Or pick a date') }}
                                <br/>
                                <input wire:model="due_date" type="date"/>
                            </li>
                        </ul>
                    @endif
                @endif
            </div>
        </div>
    </div>
@endif
</div>
