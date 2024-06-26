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
        Schema::table('tbl_svc_price', function (Blueprint $table) {
            $table->foreign(['id_svc'], 'tbl_svc_price_ibfk_1')->references(['id_svc'])->on('tbl_svc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_svc_price', function (Blueprint $table) {
            $table->dropForeign('tbl_svc_price_ibfk_1');
        });
    }
};
