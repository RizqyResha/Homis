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
        Schema::create('tbl_feedback', function (Blueprint $table) {
            $table->integer('id_feedback', true);
            $table->integer('id_svc')->index('id_svc');
            $table->integer('id_client')->index('id_client');
            $table->text('description')->nullable();
            $table->integer('rate_point')->nullable();
            $table->integer('like_count')->nullable();
            $table->dateTime('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_feedback');
    }
};