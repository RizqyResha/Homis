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
        Schema::table('tbl_withdrawal_history', function (Blueprint $table) {
            $table->foreign(['id_withdrawal_method'], 'tbl_withdrawal_history_ibfk_1')->references(['id_withdrawal_method'])->on('tbl_withdrawal_method');
            $table->foreign(['id_servicer'], 'tbl_withdrawal_history_ibfk_2')->references(['id_servicer'])->on('tbl_servicer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {
        Schema::table('tbl_withdrawal_history', function (Blueprint $table) {
            $table->dropForeign('tbl_withdrawal_history_ibfk_1');
            $table->dropForeign('tbl_withdrawal_history_ibfk_2');
        });
    }
};