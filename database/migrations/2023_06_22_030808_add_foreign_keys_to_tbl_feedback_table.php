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
        Schema::table('tbl_feedback', function (Blueprint $table) {
            $table->foreign(['id_svc'], 'tbl_feedback_ibfk_1')->references(['id_svc'])->on('tbl_svc');
            $table->foreign(['id_client'], 'tbl_feedback_ibfk_2')->references(['id_client'])->on('tbl_client');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_feedback', function (Blueprint $table) {
            $table->dropForeign('tbl_feedback_ibfk_1');
            $table->dropForeign('tbl_feedback_ibfk_2');
        });
    }
};