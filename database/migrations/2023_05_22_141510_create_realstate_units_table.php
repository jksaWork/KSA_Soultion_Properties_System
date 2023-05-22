<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealstateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('realstate_units', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('halls_number');
            $table->integer('room_number');
            $table->integer('bathroom_number');
            $table->integer('external_doors_number');
            $table->integer('floor_number');
            $table->integer('space');
            $table->integer('virtual_value');
            $table->string('electricity_account_number')->nullable();
            $table->string('water_account_number')->nullable();
            $table->enum('activity_type', ['commercial', 'residential']);
            $table->foreignId('realstate_id')->references('id')->on('realstates');
            $table->foreignId('unit_id')->references('id')->on('units');
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
        Schema::dropIfExists('realstate_units');
    }
}
