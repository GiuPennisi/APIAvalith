<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(client_table_seeder::class);
        $this->call(computer_table_seeder::class);
        $this->call(monitor_table_seeder::class);
    }
}
