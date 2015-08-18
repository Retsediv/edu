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

        $this->call(RegionTableSeeder::class);
        $this->call(TownTableSeeder::class);
        $this->call(SchoolTableSeeder::class);

        Model::reguard();
    }
}

class RegionTableSeeder extends Seeder{
    public function run(){
        \App\Models\Region::create(['name' => 'Львівська область']);
        \App\Models\Region::create(['name' => 'Вінницька область']);
        \App\Models\Region::create(['name' => 'Івано-Франківська область']);
    }
}

class TownTableSeeder extends Seeder{
    public function run(){
        \App\Models\Town::create(['name' => 'Дрогобич', 'region_id' => 1]);
        \App\Models\Town::create(['name' => 'Вінниця', 'region_id' => 2]);
        \App\Models\Town::create(['name' => 'Добромиль', 'region_id' => 1]);
    }
}

class SchoolTableSeeder extends Seeder{
    public function run(){
        \App\Models\School::create(['name' => 'Дрогобицький пед ліцей', 'town_id' => 1]);
        \App\Models\School::create(['name' => 'Вінницька гімназія', 'town_id' => 2]);
        \App\Models\School::create(['name' => 'Дережицька СЗШ', 'town_id' => 1]);
    }
}