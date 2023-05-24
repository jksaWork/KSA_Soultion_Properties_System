<?php

use App\Models\Admin;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('id_number')->nullable();
            $table->enum('id_type', Admin::IDTYPES)->nullable();
            $table->string('email')->nullable()->unique();
            $table->foreignId('province_id')->references('id')->on('provinces');
            $table->foreignId('subarea_id')->references('id')->on('sub_areas');
            $table->foreignId('nationalaity_id')->references('id')->on('nationaltiys');
            $table->string('status')->default(1);

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
        Schema::dropIfExists('clients');
    }
}