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
        Schema::table('tbl_transaction_history', function (Blueprint $table) {
            $table->foreign(['id_transaction'], 'tbl_transaction_history_ibfk_1')->references(['id_transaction_history'])->on('tbl_transaction_history');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {
        Schema::table('tbl_transaction_history', function (Blueprint $table) {
            $table->dropForeign('tbl_transaction_history_ibfk_1');
        });
    }
};