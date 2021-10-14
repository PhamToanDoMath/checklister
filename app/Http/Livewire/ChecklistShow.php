<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Task;

class ChecklistShow extends Component
{
    public $checklist;
    public $opened_tasks = [];
    public $completed_tasks = [];

    public function mount(){
        $this->completed_tasks = Task::where('checklist_id', $this->checklist->id)
        ->where('user_id', auth()->id())
        ->whereNotNull('completed_at')
        ->pluck('task_id')
        ->toArray();

    }

    public function render()
    {
        return view('livewire.checklist-show');
    }

    public function toggle_task($id){
        if(in_array($id, $this->opened_tasks)){
            $this->opened_tasks = array_diff($this->opened_tasks, [$id]); 
        }else{
            $this->opened_tasks[] = $id;
        }
    }

    public function complete_task($id){
        $task = Task::find($id);
        if($task){
            $user_task = Task::where('task_id', $task->id)->first();
            if($user_task){
                if (is_null($user_task->completed_at)){
                    $user_task->update(['completed_at' => now()]);
                    $this->completed_tasks[] = $id;
                    $this->emit('task_complete', $task->checklist_id);
                }else{
                    $user_task->delete();
                    $this->emit('task_complete', $task->checklist_id, -1);
                }
            }else{
                $user_task = $task->replicate();
                $user_task->user_id = auth()->id();
                $user_task->task_id = $id; 
                $user_task->completed_at = now();
                $user_task->save();
                $this->completed_tasks[] = $id;
                $this->emit('task_complete', $task->checklist_id);
            }   
        }
    }

}
