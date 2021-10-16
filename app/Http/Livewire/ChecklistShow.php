<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Task;
use Carbon\Carbon;
class ChecklistShow extends Component
{
    public $checklist;
    public $opened_tasks = [];
    public $completed_tasks = [];

    public ?Task $current_task;
    public $due_date_opened = FALSE;
    public $due_date;

    public $reminder_opened = FALSE;
    public $reminder_date;
    public $reminder_hour;

    public function mount(){
        $this->reminder_date = now()->addDay()->toDateString();
        $this->reminder_hour = now()->hour;
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

    public function mark_as_important($task_id)
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


    public function toggle_due_date($task_id){
        $this->due_date_opened = !$this->due_date_opened;
    }

    public function set_due_date($task_id, $due_date = NULL){
        $user_task = Task::where('user_id', auth()->id())
            ->where(function ($query) use ($task_id) {
                $query->where('id', $task_id)
                    ->orWhere('task_id', $task_id);
            })
            ->first();
        if ($user_task) {
            if (is_null($due_date)) {
                $user_task->update(['due_date' => NULL]);
                $this->emit('user_tasks_counter_change', 'planned', -1);
            } else {
                $user_task->update(['due_date' => $due_date]);
                $this->emit('user_tasks_counter_change', 'planned');
            }
        } else {
            $task = Task::find($task_id);
            $user_task = $task->replicate();
            $user_task['user_id'] = auth()->id();
            $user_task['task_id'] = $task_id;
            $user_task['due_date'] = $due_date;
            $user_task->save();
            $this->emit('user_tasks_counter_change', 'planned');
        }
        $this->current_task = $user_task;
    }

    public function updatedDueDate($value)
    {
        $this->set_due_date($this->current_task->id, $value);
    }

    public function toggle_reminder()
    {
        $this->reminder_opened = !$this->reminder_opened;
    }

    public function set_reminder($task_id, $reminder_date = NULL)
    {
        $user_task = Task::where('user_id', auth()->id())
            ->where('id', $task_id)
            ->first();
        $reminder_at = NULL;
        if ($reminder_date == 'custom') {
            $reminder_at = Carbon::create($this->reminder_date)
                ->setHour($this->reminder_hour)
                ->setMinute(0)
                ->setSecond(0)
                ->toDateTimeString();
        } else if (!is_null($reminder_date)) {
            $reminder_at = Carbon::create($reminder_date)
                ->setHour(now()->hour)
                ->setMinute(0)
                ->setSecond(0)
                ->toDateTimeString();
        }

        if ($user_task) {
            $user_task->update(['reminder_date' => $reminder_at]);
            // dd($user_task);
        } else {
            $task = Task::find($task_id);
            $user_task = $task->replicate();
            $user_task['user_id'] = auth()->id();
            $user_task['task_id'] = $task_id;
            $user_task['reminder_date'] = $reminder_at;
            $user_task->save();
        }
        $this->current_task = $user_task;
    }
}
