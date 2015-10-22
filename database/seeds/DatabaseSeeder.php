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
//        $this->call(RolesTableSeeder::class);
//        $this->call(RoleUserTableSeeder::class);
//        $this->call(TaskTableSeeder::class);
//        $this->call(EventTableSeeder::class);
//        $this->call(TownAndAreasTableSeeder::class);
//        $this->call(SchoolTableSeeder::class);

        Model::reguard();
    }
}


use App\Models\Region;

class RegionTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('regions')->delete();

        $regions = api('database.getRegions', [
            'country_id'    =>  2, // Ukraine
        ]);

        foreach($regions['response'] as $region){
            Region::create(['name' => $region['title']]);
        }
    }

    function api($method, $params = [])
    {
        $url = 'https://api.vk.com/method/' . $method . '?' . http_build_query($params);
        $response = file_get_contents($url);
        return json_decode($response, true);
    }
}