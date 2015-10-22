<?php

use App\Models\School;
use Illuminate\Database\Seeder;

class SchoolTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('schools')->delete();
        School::create(['name' => 'Вінницька гімназія', 'town_id' => 2]);
        School::create(['name' => 'Дережицька СЗШ', 'town_id' => 1]);
    }
}