<table class="table table-responsive-sm">
    <tbody>
        @foreach($tasks->whereNull('user_id') as $task)
            <tr wire:sortable.item="{{$task->id}}" wire:key="task-{{$task->id}}">
                <td>
                    @if ($task->position > 0)
                        <a href="#" wire:click.prevent="task_up({{$task->id}})" style="font-size:20px">&uarr;</a>
                    @endif
                    @if ($tasks->max('position') > $task->position)
                    <a href="#" wire:click.prevent="task_down({{$task->id}})" style="font-size:20px">&darr;</a>
                    @endif
                </td>
                <td>{{$task->name}}</td>
                <td>{{$task->description}}</td>
                <td>
                    <a class="d-inline btn btn-sm btn-primary" href="{{ route('admin.checklists.tasks.edit', [$checklist, $task])}}">Edit</a>
                    <form class="d-inline" action="{{ route('admin.checklists.tasks.destroy', [$checklist, $task])}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-sm btn-danger inline-block" type="submit" onclick="return confirm('Are you sure you want to delete this?');">Delete</button>
                    </form>
                <td>
            </tr>
        @endforeach
    </tbody>
</table>
