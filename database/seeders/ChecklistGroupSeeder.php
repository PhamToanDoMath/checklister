<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ChecklistGroup;
class ChecklistGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        ChecklistGroup::create([
            'name' =>'Checklist 1' 
        ]);
        ChecklistGroup::create([
            'name' =>'Checklist 2' 
        ]);
        ChecklistGroup::create([
            'name' =>'Checklist 3' 
        ]);
    }
}
