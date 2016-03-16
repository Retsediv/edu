<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

//        $this->call(RolesTableSeeder::class);
//        $this->call(RoleUserTableSeeder::class);
//        $this->call(TaskTableSeeder::class);
//        $this->call(EventTableSeeder::class);
       
        $this->call(RegionTableSeeder::class);
        $this->call(TownAndAreasTableSeeder::class);
       // $this->call(SchoolTableSeeder::class);

        Model::reguard();
    }
}