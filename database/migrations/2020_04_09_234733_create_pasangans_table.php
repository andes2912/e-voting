<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasangansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasangans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ketua_id');
            $table->string('ketua_nama');
            $table->unsignedBigInteger('wakil_id');
            $table->string('wakil_nama');
            $table->string('point')->nullable();
            $table->string('status');
            $table->timestamps();

            $table->foreign('ketua_id')->references('id')->on('calons')->onDelete('cascade');
            $table->foreign('wakil_id')->references('id')->on('calons')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pasangans');
    }
}
