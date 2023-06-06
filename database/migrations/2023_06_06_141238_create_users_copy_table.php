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
        Schema::create('users-copy', function (Blueprint $table) {
            $table->integer('user_id', true);
            $table->string('user_email', 45)->nullable();
            $table->string('user_password', 45)->nullable();
            $table->string('user_full_name', 255)->nullable();
            $table->string('user_image', 255)->nullable();
            $table->text('user_description')->nullable();
            $table->integer('user_role_role_id')->nullable()->index('fk_user_user_role1_idx');
            $table->boolean('user_is_deleted')->nullable()->default(false);
            $table->timestamp('user_input_date')->nullable();
            $table->timestamp('user_last_update')->useCurrentOnUpdate()->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users-copy');
    }
};
