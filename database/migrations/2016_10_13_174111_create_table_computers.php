<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableComputers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('computers', function (Blueprint $table) {

            $table->increments('id');

            $table->string('code', 25);
            $table->string('spect',100);
            $table->string('ip',50);
            $table->date('last_check');
            $table->integer('client_id')->unsigned();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('computers');
    }
}
