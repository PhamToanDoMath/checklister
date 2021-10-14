<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CompletedTaskCounter extends Component
{
    public $completed_tasks_count;
    public $tasks_count;
    public $checklist_id;
    protected $listeners = ['task_complete'=> 'recalculate_tasks'];

    public function render()
    {
        return view('livewire.completed-task-counter');
    }

    public function recalculate_tasks( $checklist_id, $count_change = 1){
        if ($checklist_id === $this->checklist_id){
            $this->completed_tasks_count+= $count_change;
        }
    }
}
