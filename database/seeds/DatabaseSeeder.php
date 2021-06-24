<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('filepdf');
        Storage::makeDirectory('filepdf');
        $this->call(RolesAndPermissionsSeeder::class);
        //$this->call(DataColombiaSeeder::class); 
    }
}