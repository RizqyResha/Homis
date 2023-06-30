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
        Schema::create('tbl_client', function (Blueprint $table) {
            $table->integer('id_client', true);
            $table->string('username', 50)->nullable();
            $table->string('email', 50);
            $table->string('password', 100);
            $table->text('profile_image')->nullable();
            $table->integer('id_identity_type')->index('id_identity_type')->nullable();
            $table->string('identity_id', 50)->nullable();
            $table->string('first_name', 25);
            $table->string('last_name', 25)->nullable();
            $table->string('gender', 20);
            $table->text('address')->nullable();
            $table->string('phone_no', 20)->nullable();
            $table->char('isActive', 1)->nullable();
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->char('delete_status', 1)->nullable();
            $table->string('remember_token')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_client');
    }
};