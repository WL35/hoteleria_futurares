<?php

use Illuminate\Database\Seeder;
use Illuminate\support\facades\DB;
class usersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'usu_nombre'=>'washington',
            'usu_apellido'=>'lara',
            'email'=>'admin@vn.com',
            'usu_cedula'=>'123456789',
            'usu_telefono'=>'123456789',
            'password'=>bcrypt('123456789'),
            'usu_tipo'=>'1',
            'created_at'=>date('Y-m-d H:i'),
        ]);

    }
}
