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
        Schema::create('tbl_withdrawal_history', function (Blueprint $table) {
            $table->integer('id_withdrawal_history', true);
            $table->integer('id_withdrawal_method')->index('id_withdrawal_method');
            $table->integer('id_servicer')->index('id_servicer');
            $table->string('account_number');
            $table->string('beneficiary_name');
            $table->integer('withdrawal_amount');
            $table->dateTime('withdrawal_date');
        });
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_withdrawal_history');
    }
};