<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UsersSeeder extends Seeder
{
    
    public function run()
    {
        DB::table('users')->insert([
            'id' =>  1,
            'usuario' =>  'sistema',
            'password' => bcrypt(123),
            'condicion' => 1,
            'idrol' =>  1,
        ]);
    }
}
