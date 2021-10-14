<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Checklist;

class ChecklistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Checklist::create([
            'checklist_group_id' => 1,
            'name' =>'Sub-Checklist 1' 
        ]);
        Checklist::create([
            'checklist_group_id' => 1,
            'name' =>'Sub-Checklist 1' 
        ]);
        Checklist::create([
            'checklist_group_id' => 1,
            'name' =>'Sub-Checklist 1' 
        ]);
        Checklist::create([
            'checklist_group_id' => 2,
            'name' =>'Sub-Checklist 2' 
        ]);
        Checklist::create([
            'checklist_group_id' => 2,
            'name' =>'Sub-Checklist 2' 
        ]);
        Checklist::create([
            'checklist_group_id' => 2,
            'name' =>'Sub-Checklist 2' 
        ]);
        Checklist::create([
            'checklist_group_id' => 3,
            'name' =>'Sub-Checklist 3' 
        ]);
    }
}
