<?php

use Illuminate\Database\Seeder;
use illuminate\Support\Facades\DB;
class habitacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('habitaciones')->insert([
            
            'hab_detalle'=>'Wifi',
            'hab_estado'=>'1',
            'tip_id'=>'1',
            'created_at'=>date('Y-m-d H:i'),
        ]);

        DB::table('habitaciones')->insert([
            
            'hab_detalle'=>'Desayuno',
            'hab_estado'=>'1',
            'tip_id'=>'2',
            'created_at'=>date('Y-m-d H:i'),
        ]);


        DB::table('habitaciones')->insert([
            
            'hab_detalle'=>'Desayuno',
            'hab_estado'=>'1',
            'tip_id'=>'2',
            'created_at'=>date('Y-m-d H:i'),
        ]);
        DB::table('habitaciones')->insert([
            
            'hab_detalle'=>'Desayuno',
            'hab_estado'=>'1',
            'tip_id'=>'2',
            'created_at'=>date('Y-m-d H:i'),
        ]);
        DB::table('habitaciones')->insert([
            
            'hab_detalle'=>'Desayuno',
            'hab_estado'=>'1',
            'tip_id'=>'2',
            'created_at'=>date('Y-m-d H:i'),
        ]);
        DB::table('habitaciones')->insert([
            
            'hab_detalle'=>'Desayuno',
            'hab_estado'=>'3',
            'tip_id'=>'2',
            'created_at'=>date('Y-m-d H:i'),
        ]);
        DB::table('habitaciones')->insert([
            
            'hab_detalle'=>'Desayuno',
            'hab_estado'=>'1',
            'tip_id'=>'2',
            'created_at'=>date('Y-m-d H:i'),
        ]);
        DB::table('habitaciones')->insert([
            
            'hab_detalle'=>'Desayuno',
            'hab_estado'=>'1',
            'tip_id'=>'2',
            'created_at'=>date('Y-m-d H:i'),
        ]);
        DB::table('habitaciones')->insert([
            
            'hab_detalle'=>'Vista Mar',
            'hab_estado'=>'1',
            'tip_id'=>'2',
            'created_at'=>date('Y-m-d H:i'),
        ]);
    }
}
