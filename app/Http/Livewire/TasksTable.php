<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TasksTable extends Component
{

    public $checklist;
    public function updateTaskOrder($tasks){
        dd($tasks);
        foreach ($tasks as $task){
            \App\Models\Task::find($task['value'])->update(['position' => $task['order']]);
        }
    }

    public function render()
    {
        $tasks = $this->checklist->tasks()->orderBy('position')->get();
        return view('livewire.tasks-table',compact('tasks'));
    }
}
