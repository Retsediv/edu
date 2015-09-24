<?php

use App\Models\Region;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\School;
use App\Models\Area;
use App\Models\Task;
use App\Models\Town;
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

        $this->call(RegionTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(RoleUserTableSeeder::class);
        $this->call(TaskTableSeeder::class);
        $this->call(EventTableSeeder::class);
        $this->call(TownAndAreasTableSeeder::class);
        $this->call(SchoolTableSeeder::class);

        Model::reguard();
    }
}


