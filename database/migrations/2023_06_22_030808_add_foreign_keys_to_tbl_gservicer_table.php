<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_servicer', function (Blueprint $table) {
            $table->foreign(['id_identity_type'], 'tbl_servicer_ibfk_1')->references(['id_identity_type'])->on('tbl_identity_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_servicer', function (Blueprint $table) {
            $table->dropForeign('tbl_servicer_ibfk_1');
        });
    }
};
