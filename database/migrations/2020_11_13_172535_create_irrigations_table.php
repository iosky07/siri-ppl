<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIrrigationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('irrigations', function (Blueprint $table) {
            $table->id();
            $table->dateTime('time');
            $table->integer('debit');
            $table->unsignedBigInteger('terrace_id');
            $table->unsignedBigInteger('officer_id');
            $table->timestamps();
            $table->foreign('terrace_id')
                ->references('id')
                ->on('terraces')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('officer_id')
                ->references('id')
                ->on('officers')
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
        Schema::dropIfExists('irrigations');
    }
}
