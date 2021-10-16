<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Task;

class ChecklistShow extends Component
{
    public $checklist;
    public $opened_tasks = [];
    public $completed_tasks = [];
    public $current_task;

    public function mount(){
        $this->current_task = NULL;
        $this->completed_tasks = Task::where('checklist_id', $this->checklist->id)
        ->where('user_id', auth()->id())
        ->whereNotNull('completed_at')
        ->pluck('task_id')
        ->toArray();

    }

    public function render()
    {
        return view('livewire.checklist-show',['current_task'=> $this->current_task]);
    }

    public function toggle_task($id){
        if(in_array($id, $this->opened_tasks)){
            $this->opened_tasks = array_diff($this->opened_tasks, [$id]);
            $this->current_task = NULL;
        }else{
            $this->opened_tasks[] = $id;
            $this->current_task = Task::where('user_id',auth()->id())
                ->where('task_id',$id)->first();
            if(!$this->current_task){
                $task = Task::find($id);
                $this->current_task = $task->replicate();
                $this->current_task['user_id'] = auth()->id();
                $this->current_task['task_id'] = $id;
                $this->current_task->save();
            }
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
                    $user_task->update(['completed_at' => NULL]);
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

    public function add_to_my_day($task_id)
    {
        $user_task = Task::where('user_id', auth()->id())
            ->where('id', $task_id)
            ->first();
        if ($user_task) {
            if (is_null($user_task->added_my_day_at)) {
                $user_task->update(['added_my_day_at' => now()]);
                $this->emit('user_tasks_counter_change', 'my_day');
            } else {
                $user_task->update(['added_my_day_at' => NULL]);
                $this->emit('user_tasks_counter_change', 'my_day', -1);
            }
        } else {
            $task = Task::find($task_id);
            $user_task = $task->replicate();
            $user_task['user_id'] = auth()->id();
            $user_task['task_id'] = $task_id;
            $user_task['added_to_my_day_at'] = now();
            $user_task->save();
            $this->emit('user_tasks_counter_change', 'my_day');
        }
        $this->current_task = $user_task;
    }

    public function add_to_important($task_id)
    {
        $user_task = Task::where('user_id', auth()->id())
            ->where('id', $task_id)
            ->first();
        if ($user_task) {
            if ($user_task->is_important) {
                $user_task->update(['is_important' => FALSE]);
                $this->emit('user_tasks_counter_change', 'important',-1);
            }else{
                $user_task->update(['is_important' => TRUE]);
                $this->emit('user_tasks_counter_change', 'important');
            }
        } else {
            $task = Task::find($task_id);
            $user_task = $task->replicate();
            $user_task['user_id'] = auth()->id();
            $user_task['task_id'] = $task_id;
            $user_task['important'] = TRUE;
            $user_task->save();
            $this->emit('user_tasks_counter_change', 'important');
        }
        $this->current_task = $user_task;
    }

    public function set_due_date($task_id){
        //
    }

}
