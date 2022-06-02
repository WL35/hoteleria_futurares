<?php

use Illuminate\Database\Seeder;
use illuminate\Support\Facades\DB;
class clientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clientes')->insert([
            'cli_nombre'=>'juan',
            'cli_apellido'=>'perez',
            'cli_cedula'=>'987654321',
            'email'=>'juan@vn.com',
            'cli_direccion'=>'guamani',
            'cli_telefono'=>'123456789',
            'created_at'=>date('Y-m-d H:i'),
        ]);

        DB::table('clientes')->insert([
            'cli_nombre'=>'mario',
            'cli_apellido'=>'silva',
            'cli_cedula'=>'987654421',
            'email'=>'mario@vn.com',
            'cli_direccion'=>'norte',
            'cli_telefono'=>'123456789',
            'created_at'=>date('Y-m-d H:i'),
        ]);
    }
}
