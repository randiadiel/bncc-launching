<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lane');
            $table->integer('bnccId');
            $table->string('nama');
            $table->string('jurusan');
            $table->string('email')->unique();
            $table->string('nim')->unique();
            $table->string('tlp');
            $table->string('lineId');
            $table->string('payment');
            $table->string('pembayar')->nullable();
            $table->boolean('game')->default(0);
            $table->unsignedInteger('schedule_id');
            $table->foreign('schedule_id')->references('id')->on('schedules');
	    $table->string('materi')->nullable();
            $table->timestamps();

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registers');
    }
}
