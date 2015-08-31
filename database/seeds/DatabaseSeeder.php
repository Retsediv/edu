<?php

use App\Models\Region;
use App\Models\School;
use App\Models\Area;
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
        $this->call(TownAndAreasTableSeeder::class);
        $this->call(SchoolTableSeeder::class);

        Model::reguard();
    }
}

class RegionTableSeeder extends Seeder{
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
}


class TownAndAreasTableSeeder extends Seeder{
    public function run()
    {
        ini_set('max_execution_time', 300); //300 seconds = 5 minutes

        DB::table('areas')->delete();
        DB::table('towns')->delete();

        $regions = api('database.getRegions', [
            'country_id'    =>  2,
        ]);

        foreach($regions['response'] as $region){
            $towns = api('database.getCities', [
                'country_id'    =>  2,
                'region_id' => $region['region_id'],
                'count'     => 1000
            ]);

            foreach($towns['response'] as $town) {

                $area = Area::firstOrCreate([
                    'name' => isset($town['area']) ? $town['area'] : $town['title'],
                    'region_id' => isset(Region::where('name', '=', $town['region'])->first()->id) ? Region::where('name', '=', $town['region'])->first()->id : 0,
                ]);

                Town::create([
                    'name' => $town['title'],
                    'area_id' => $area->id,
                ]);
            }

            sleep(10);
        }

    }
}

class SchoolTableSeeder extends Seeder{
    public function run()
    {
        DB::table('schools')->delete();
        School::create(['name' => 'Вінницька гімназія', 'town_id' => 2]);
        School::create(['name' => 'Дережицька СЗШ', 'town_id' => 1]);
    }
}

function api($method, $params = [])
{
    $url = 'https://api.vk.com/method/' . $method . '?' . http_build_query($params);
    $response = file_get_contents($url);
    return json_decode($response, true);
}