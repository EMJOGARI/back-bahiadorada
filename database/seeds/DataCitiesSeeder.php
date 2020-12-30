<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DataCitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->truncate();

            $json = File::get("database/data/cities.json");           
            $response = json_decode($json);  
            $data = (array) $response; 
           //dd($data);
            foreach ($data['cities'] as $obj){
                DB::table('cities')->insert([
                    'id' => $obj->id,
                    'name' => $obj->name,
                    'id_state' => $obj->state_id,
                ]);
            } //
    }
}
