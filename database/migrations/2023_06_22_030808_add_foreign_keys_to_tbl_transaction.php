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
        Schema::table('tbl_transaction', function (Blueprint $table) {
            $table->foreign(['id_svc'], 'tbl_transaction_ibfk_1')->references(['id_svc'])->on('tbl_svc');
            $table->foreign(['id_client'], 'tbl_transaction_ibfk_2')->references(['id_client'])->on('tbl_client');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_transaction', function (Blueprint $table) {
            $table->dropForeign('tbl_transaction_ibfk_1');
            $table->dropForeign('tbl_transaction_ibfk_2');
        });
    }
};