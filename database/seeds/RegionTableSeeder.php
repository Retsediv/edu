<?php

use App\Models\Region;
use Illuminate\Database\Seeder;

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