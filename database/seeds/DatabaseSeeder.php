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
        $this->call(usersSeeder::class);
        $this->call(temporadaSeeder::class);
        $this->call(tipoSeeder::class);
        $this->call(clientesSeeder::class);
        $this->call(habitacionesSeeder::class);
        $this->call(reservacionesSeeder::class);
    }
}
