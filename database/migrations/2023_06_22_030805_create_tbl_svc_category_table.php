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
        Schema::create('tbl_svc_category', function (Blueprint $table) {
            $table->integer('id_svc_category', true);
            $table->text('svc_thumbnail')->nullable();
            $table->string('svc_category_name', 50);
            $table->text('svc_description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_svc_category');
    }
};