<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Task::create([
            'name' => 'task 1',
            'checklist_id' => 1,
            'description' => 'description required'
        ]);
        Task::create([
            'name' => 'task 1',
            'checklist_id' => 2,
            'description' => 'description required'
        ]);  
        Task::create([
            'name' => 'task 1',
            'checklist_id' => 2,
            'description' => 'description required'
        ]);  
        Task::create([
            'name' => 'task 1',
            'checklist_id' => 3,
            'description' => 'description required'
        ]);          
    }
}
