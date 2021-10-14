<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\ChecklistGroup;
use Tests\TestCase;
use App\Models\User;
use App\Services\MenuService;

class AdminChecklistsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_crud_on_checklistGroup()
    {

        $admin = User::factory()->create(['is_admin' => 1]);
        $response = $this->actingAs($admin)->post('admin/checklist_groups',[
            'name' => 'First group',
        ]);
        $response->assertRedirect('welcome');

        $group = ChecklistGroup::where('name', 'First group')->first();
        $this->assertNotNull($group);

        $response = $this->actingAs($admin)->get('admin/checklist_groups/'. $group->id);

        $response = $this->actingAs($admin)->put('admin/checklist_groups/'. $group->id,[
            'name' => 'Updated First group',
        ]);
        $response->assertRedirect('welcome');

        $group = ChecklistGroup::where('name', 'Updated First group')->first();
        $this->assertNotNull($group);

        $menu = (new MenuService())->get_menu();
        // dd($menu);
    }
}
