<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLane4sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lane4s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('bnccId')->nullable();
            $table->string('nama');
            $table->string('jurusan');
            $table->string('email');
            $table->string('nim');
            $table->string('tlp');
            $table->string('lineId');
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
        Schema::dropIfExists('lane4s');
    }
}
