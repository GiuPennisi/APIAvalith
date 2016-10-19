<?php

use Illuminate\Database\Seeder;

class monitor_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         factory(App\Monitor::class, 60)->create();
    }
}
