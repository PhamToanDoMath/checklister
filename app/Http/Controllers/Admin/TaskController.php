<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Checklist;
use App\Models\Task;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreTaskRequest;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('')
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaskRequest $request, Checklist $checklist)
    {
        $position = $checklist->tasks()->whereNull('user_id')->max('position') +1;
        $checklist->tasks()->create($request->validated() + ['position' => $position]);
        return redirect()->route('admin.checklist_groups.checklists.edit', [$checklist->checklist_group_id, $checklist]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Checklist $checklist,Task $task)
    {
        return view('admin.tasks.edit',compact('checklist', 'task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTaskRequest $request,Checklist $checklist, Task $task)
    {
        $task->update($request->validated());
        return redirect()->route('admin.checklist_groups.checklists.edit', [$checklist->checklist_group_id, $checklist]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Checklist $checklist, Task $task)
    {
        $checklist->tasks()->whereNull('user_id')->where('position','>',$task->position)->update(
            ['position'=>DB::raw('position-1')]
        );
        Task::where('task_id',$task->id)->delete();
        $task->delete();
    
        return redirect()->route('admin.checklist_groups.checklists.edit', [$checklist->checklist_group_id, $checklist]);
    }
}
