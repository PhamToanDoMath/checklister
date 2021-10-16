<?php

namespace App\Services;

use App\Models\Task;
use App\Models\ChecklistGroup;

class MenuService {

    public function get_menu() : array
    {
        $menu = \App\Models\ChecklistGroup::with([
            'checklists' => function($query){
                $query->whereNull('user_id');
            },
            'checklists.tasks' => function($query){
                $query->whereNull('tasks.user_id');
            },
            'checklists.user_tasks' => function ($query){
                $query->whereNotNull('tasks.completed_at');
            }
        ])->get()->toArray();
        
        $groups = [];
        foreach($menu as $group){
            $group['is_new'] = FALSE;
            $group['is_updated'] = FALSE;
            foreach($group['checklists'] as &$checklist){
                $checklist['is_new'] = FALSE;
                $checklist['is_updated'] = FALSE;
            }

            $groups[] = $group;
        }

        $user_tasks_menu = [];
        if (!auth()->user()->is_admin){
            $user_task = Task::where('user_id',auth()->id())->get();
            $user_tasks_menu = [
                'my_day'=> [
                    'name' => __('My day'),
                    'icon' => 'sun',
                    'task_count' => $user_task->whereNotNull('added_my_day_at')->count()
                ],
                'important' => [
                    'name' => __('Important'),
                    'icon' => 'star',
                    'task_count' => $user_task->where('is_important',TRUE)->count()
                ],
                // 'planned' =>[
                //     'name' => __('Planned'),
                //     'icon' => 'calendar',
                //     'task_count' => $user_task->whereNotNull('added_my_day_at')->count()
                // ]
                ];
        }



        return [
            'admin_menu' => $menu,
            'user_menu' => $groups,
            'user_tasks_menu' => $user_tasks_menu
        ];
    }

}