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
        Schema::table('mesins', function (Blueprint $table) {
            $table->integer('posisi_x')->default(0);
            $table->integer('posisi_y')->default(0);
            $table->integer('item_width')->default(1);
            $table->integer('item_height')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mesins', function (Blueprint $table) {
            //
        });
    }
};
