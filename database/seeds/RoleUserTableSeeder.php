<?php

use App\Models\RoleUser;
use Illuminate\Database\Seeder;

class RoleUserTableSeeder extends Seeder {
    public function run()
    {
        RoleUser::create(['user_id' => 1, 'role_id' => 1]);
    }
}