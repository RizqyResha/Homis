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
        Schema::create('tbl_withdrawal_method', function (Blueprint $table) {
            $table->integer('id_withdrawal_method', true);
            $table->string('name');
        });
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_withdrawal_method');
    }
};