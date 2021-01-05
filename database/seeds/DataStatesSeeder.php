<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataStatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->truncate();

            $json = File::get("database/data/states.json");           
            $response = json_decode($json);  
            $data = (array) $response; 
           //dd($array1);
            foreach ($data['states'] as $obj){
                DB::table('states')->insert([
                    'id' => $obj->id,
                    'name' => $obj->name,
                    'id_country' => $obj->country_id,
                ]);
            } 
    }
}
