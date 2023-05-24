<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOwnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owners', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone')->nullable();
            $table->string('id_number')->nullable();
            $table->string('iban_number')->nullable();
            // $table->string('bank_id')->nullable();
            $table->string('email')->nullable()->unique();
            // $table->string('password')->nullable();
            $table->string('address')->nullable();
            $table->boolean('status')->default(1);
            $table->foreignId('province_id')->references('id')->on('provinces');
            $table->foreignId('bank_id')->references('id')->on('banks');
            $table->foreignId('subarea_id')->references('id')->on('sub_areas');
            $table->text('note')->nullable();
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
        Schema::dropIfExists('owners');
    }
}