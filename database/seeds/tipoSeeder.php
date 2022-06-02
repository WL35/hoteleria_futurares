<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class tipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo')->insert([
            'tip_nombre'=>'Suit Presidencial',
            'tip_camas'=>'1',
            'tip_precio'=>'95',
            'tem_id'=>'2',
            'created_at'=>date('Y-m-d H:i'),
        ]);
         DB::table('tipo')->insert([
            'tip_nombre'=>'Suit Presidencial',
            'tip_camas'=>'2',
            'tip_precio'=>'105',
            'tem_id'=>'2',
            'created_at'=>date('Y-m-d H:i'),
        ]);
          DB::table('tipo')->insert([
            'tip_nombre'=>'Suit Presidencial',
            'tip_camas'=>'3',
            'tip_precio'=>'95',
            'tem_id'=>'2',
            'created_at'=>date('Y-m-d H:i'),
        ]);
           DB::table('tipo')->insert([
            'tip_nombre'=>'Habitacion Normal',
            'tip_camas'=>'1',
            'tip_precio'=>'95',
            'tem_id'=>'2',
            'created_at'=>date('Y-m-d H:i'),
        ]);
           DB::table('tipo')->insert([
            'tip_nombre'=>'Habitacion Normal',
            'tip_camas'=>'2',
            'tip_precio'=>'95',
            'tem_id'=>'2',
            'created_at'=>date('Y-m-d H:i'),
        ]);

        DB::table('tipo')->insert([
            'tip_nombre'=>'Matrimonial',
            'tip_camas'=>'1',
            'tip_precio'=>'50',
            'tem_id'=>'2',
            'created_at'=>date('Y-m-d H:i'),
        ]);
    }
}
