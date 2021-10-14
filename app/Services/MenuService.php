<?php

namespace App\Services;

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
            'checklists.user_tasks'
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

        return [
            'admin_menu' => $menu,
            'user_menu' => $groups
        ];
    }

}