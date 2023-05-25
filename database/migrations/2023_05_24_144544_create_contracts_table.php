<?php

use App\Models\Contract;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->enum('payment_way', Contract::PAYMENTSWAYS)->nullable();
            $table->integer('contract_number')->nullable();
            $table->date('end_date')->nullable();
            $table->date('contract_date')->nullable();
            $table->date('start_date')->nullable();
            $table->decimal('amount', 5, 2)->nullable()->default();
            $table->foreignId('client_id')->references('id')->on('clients');
            $table->foreignId('realstate_id')->references('id')->on('realstates');
            $table->text('note');
            // $table->text('note');
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('contracts');
    }
}
