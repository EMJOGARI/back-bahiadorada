<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataColombiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        DB::table('countries')->insert([
            'id' => 1,
            'name' => 'COLOMBIA',
            'sortname' => 'CO',
            'phoneCode' => 57 
        ]); 

        DB::table('states')->truncate();

        $json = File::get("database/data/colombia/states.json");           
        $response = json_decode($json);  
        $data = (array) $response; 
        //dd($data);
        foreach ($data['states'] as $obj){
            DB::table('states')->insert([
                'id' => $obj->id_departamento,
                'name' => $obj->departamento,
                'id_country' => 1,
            ]);
        }
        
        DB::table('cities')->truncate();
        $json2 = File::get("database/data/colombia/city.json");           
        $response2 = json_decode($json2);  
        $data2 = (array) $response2; 
        //dd($data);
        foreach ($data2['cities'] as $obj2){
            DB::table('cities')->insert([
                'id' => $obj2->id_municipio,
                'name' => $obj2->municipio,
                'id_state' => $obj2->departamento_id,
            ]);
        } 
    }
}
