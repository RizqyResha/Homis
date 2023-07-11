<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_transaction_history', function (Blueprint $table) {
            $table->integer('id_transaction_history', true);
            $table->integer('id_transaction')->index('id_transaction');
            $table->integer('transaction_amount');
            $table->dateTime('transaction_date');
            $table->string('transaction_type');
        });
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_transaction_history');
    }
};