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
        Schema::create('tbl_svc', function (Blueprint $table) {
            $table->integer('id_svc', true);
            $table->integer('id_servicer')->index('id_servicer');
            $table->integer('id_svc_category')->index('id_svc_category');
            $table->text('thumbnail_image')->nullable();
            $table->string('description', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_svc');
    }
};