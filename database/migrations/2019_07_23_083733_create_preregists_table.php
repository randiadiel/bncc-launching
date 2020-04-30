<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreregistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preregists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('jurusan');
            $table->string('email')->unique();
            $table->string('nim')->unique();
            $table->string('tlp');
            $table->string('lineId');
            $table->string('batch');
            $table->string('type');
            $table->string('bnccId')->nullable();
            $table->string('verified')->default(0);
            $table->string('payment')->nullable();
            $table->unsignedInteger('schedule_id')->nullable();
            $table->foreign('schedule_id')->references('id')->on('schedules');
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
        Schema::dropIfExists('preregists');
    }
}
