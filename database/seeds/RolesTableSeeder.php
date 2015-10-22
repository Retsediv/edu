<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder {
    public function run()
    {
        Role::create(['role_name' => 'учень', 'role_slug' => 'student']);
        Role::create(['role_name' => 'вчитель', 'role_slug' => 'teacher']);
        Role::create(['role_name' => 'директор', 'role_slug' => 'director']);
    }
}