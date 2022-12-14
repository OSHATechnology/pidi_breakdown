<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komponen_mesins', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_mesin');
            $table->string('kode_komponen', 30);
            $table->unsignedBigInteger('id_type')->nullable();
            $table->string('nama', 50);
            $table->integer('condition');
            $table->integer('breakdown_possibility');
            $table->timestamps();

            $table->foreign('id_type')->references('id')->on('komponen_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('komponen_mesins');
    }
};
