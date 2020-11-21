<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIrrigationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('irrigation_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('terrace_id');
            $table->unsignedBigInteger('irrigation_id');
            $table->timestamps();
            $table->foreign('terrace_id')
                ->references('id')
                ->on('terraces')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('irrigation_id')
                ->references('id')
                ->on('irrigations')
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
        Schema::dropIfExists('irrigation_details');
    }
}
