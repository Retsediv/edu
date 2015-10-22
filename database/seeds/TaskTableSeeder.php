<?php

use App\Models\Task;
use Illuminate\Database\Seeder;

class TaskTableSeeder extends Seeder {
    public function run()
    {
        Task::create(['name' => 'Task example', 'deadline' => date("H:i:s"), 'progress' => false]);
    }
}
