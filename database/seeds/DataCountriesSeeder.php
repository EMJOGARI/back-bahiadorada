<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataCountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->truncate();

            $json = File::get("database/data/countries.json");           
            $response = json_decode($json);  
            $data = (array) $response; 
            //dd($data);
            foreach ($data['countries'] as $obj){
                DB::table('countries')->insert([
                    'id' => $obj->id,
                    'name' => $obj->name,
                    'sortname' => $obj->sortname,
                    'phoneCode' => $obj->phoneCode 
                ]);
            } 
    }
}
