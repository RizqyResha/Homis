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
        Schema::table('tbl_svc', function (Blueprint $table) {
            $table->foreign(['id_svc_category'], 'tbl_svc_ibfk_2')->references(['id_svc_category'])->on('tbl_svc_category');
            $table->foreign(['id_servicer'], 'tbl_svc_ibfk_1')->references(['id_servicer'])->on('tbl_servicer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_svc', function (Blueprint $table) {
            $table->dropForeign('tbl_svc_ibfk_2');
            $table->dropForeign('tbl_svc_ibfk_1');
        });
    }
};
