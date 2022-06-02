<?php

use Illuminate\Database\Seeder;
use Illuminate\support\facades\DB;

class temporadaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('temporada')->insert([
            'tem_nombre'=>'Alta',
            'tem_valor'=>'10',
            'created_at'=>date('Y-m-d H:i'),
        ]);
        DB::table('temporada')->insert([
            'tem_nombre'=>'Normal',
            'tem_valor'=>'0',
            'created_at'=>date('Y-m-d H:i'),
        ]);
        DB::table('temporada')->insert([
            'tem_nombre'=>'Baja',
            'tem_valor'=>'5',
            'created_at'=>date('Y-m-d H:i'),
        ]);
    }
}
