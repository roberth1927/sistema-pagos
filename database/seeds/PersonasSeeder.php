<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonasSeeder extends Seeder
{
 
    public function run()
    {
        DB::table('personas')->insert([
            'nombre' =>  str_random(10),
            'tipo_documento' => str_random(10),
            'num_documento' =>  str_random(10),
            'direccion' =>  str_random(10),
            'telefono' =>  str_random(10),
            'email' =>  str_random(10).'@gmail.com',
        ]);
    }
}
