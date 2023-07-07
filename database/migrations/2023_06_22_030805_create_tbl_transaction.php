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
        Schema::create('tbl_transaction', function (Blueprint $table) {
            $table->integer('id_transaction', true);
            $table->integer('id_svc')->index('id_svc');
            $table->integer('id_client')->index('id_client');
            $table->dateTime('transaction_date');
            $table->string('period_type');
            $table->string('status');
            $table->integer('price_total');
            $table->integer('confirm_point');
        });
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_transaction');
    }
};