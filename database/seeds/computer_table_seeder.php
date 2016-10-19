<?php

use Illuminate\Database\Seeder;

class computer_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
 		factory(App\Computer::class, 40)->create();
    }
}
