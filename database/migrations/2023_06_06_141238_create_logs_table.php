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
        Schema::create('logs', function (Blueprint $table) {
            $table->integer('log_id', true);
            $table->timestamp('log_date')->nullable();
            $table->string('log_action', 45)->nullable();
            $table->string('log_module', 45)->nullable();
            $table->text('log_info')->nullable();
            $table->integer('user_id')->nullable()->index('fk_g_activity_log_g_user1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logs');
    }
};
