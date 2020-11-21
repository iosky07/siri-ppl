<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTerracesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terraces', function (Blueprint $table) {
            $table->id();
            $table->integer('large');
            $table->integer('high');
            $table->integer('distance');
            $table->unsignedBigInteger('map_id');
            $table->timestamps();
            $table->foreign('map_id')
                ->references('id')
                ->on('maps')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('terraces');
    }
}
