<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('tbl_detail_transaction', function (Blueprint $table) {
            $table->foreign(['id_transaction'], 'tbl_detail_transaction_ibfk_1')->references(['id_transaction'])->on('tbl_transaction');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_detail_transaction', function (Blueprint $table) {
            $table->dropForeign('tbl_detail_transaction_ibfk_1');
        });
    }
};