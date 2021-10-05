<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
   
    public function run()
    {
         //$this->call(UsersTableSeeder::class);
        // $this->call(PersonasSeeder::class);
         $this->call(UsersSeeder::class);
    }
}
