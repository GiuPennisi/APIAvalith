<?php

use Illuminate\Database\Seeder;

class client_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Client::class, 20)->create();
    }
}
