<?php

use App\Models\Area;
use App\Models\Town;

class TownAndAreasTableSeeder extends Seeder
{

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

    function api($method, $params = [])
    {
        $url = 'https://api.vk.com/method/' . $method . '?' . http_build_query($params);
        $response = file_get_contents($url);
        return json_decode($response, true);
    }
}