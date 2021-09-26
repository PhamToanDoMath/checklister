<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::create(['title' => 'Welcome', 'content' => 'Welcome']);
        Page::create(['title' => 'Get content', 'content' => 'Consulation']);
    }
}
