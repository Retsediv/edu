<?php

use App\Models\Task;

class TaskTableSeeder extends Seeder {
    public function run()
    {
        Task::create(['name' => 'Task example', 'deadline' => date("H:i:s"), 'progress' => false]);
    }
}
