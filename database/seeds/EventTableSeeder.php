<?php

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventTableSeeder extends Seeder
{
    public function run()
    {
        Event::create(['name' => 'name', 'description' => '...', 'user_id' => 1, 'school_id' => 1]);
    }
}