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
        Schema::create('tbl_svc_price', function (Blueprint $table) {
            $table->integer('id_svc_price', true);
            $table->integer('id_svc')->index('id_svc');
            $table->integer('price_per_period');
            $table->string('period_type', 11);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_svc_price');
    }
};
