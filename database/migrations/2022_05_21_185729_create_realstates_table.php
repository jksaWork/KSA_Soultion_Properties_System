<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealstatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('realstates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('realstate_number');
            $table->integer('floors_number');
            $table->integer('unit_number');
            $table->integer('instrument_number');
            $table->date('instrument_date');
            $table->unsignedBigInteger('spectator_id')->nullable();
            $table->integer('spectator_number');
            $table->date('spectator_date');
            $table->unsignedBigInteger('agent_id')->nullable();
            $table->integer('agent_number');
            $table->date('agent_date');
            $table->string('address')->nullable();
            $table->string('national_address')->nullable();
            $table->string('map_address')->nullable();
            $table->string('electricity_account_number')->nullable();
            $table->string('electricity_service_number')->nullable();
            $table->string('water_account_number')->nullable();
            $table->text('note')->nullable();
            $table->boolean('status')->default(0);
            $table->foreignId('unit_id')->references('id')->on('units');
            $table->foreignId('owner_id')->references('id')->on('owners');
            // $table->foreignId('area_id')->references('id')->on('areas');
            $table->foreignId('subarea_id')->references('id')->on('sub_areas');
            $table->foreignId('province_id')->references('id')->on('provinces');
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
        Schema::dropIfExists('realstates');
    }
}
