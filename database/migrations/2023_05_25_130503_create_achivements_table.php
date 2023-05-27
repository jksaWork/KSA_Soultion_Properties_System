<?php

use App\Models\Achivement;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAchivementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('achivements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('realstate_id')
                ->references('id')->on('realstates');
            $table->foreignId('client_id')
                ->references('id')->on('clients');
            // $table->foreignId('realstate_unit_id')
            //     ->references('id')->on('realstates');
            $table->foreignId('contract_id')
                ->references('id')->on('contracts');
            $table->decimal('amount', 8, 2);
            $table->enum('type', Achivement::TYPES)->default('pay');
            $table->date('payment_date');
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
        Schema::dropIfExists('achivements');
    }
}