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
        Schema::create('information', function (Blueprint $table) {
            $table->integer('information_id', true);
            $table->string('information_title', 100)->nullable();
            $table->text('information_desc')->nullable();
            $table->string('information_img', 255)->nullable();
            $table->boolean('information_publish')->nullable()->default(false);
            $table->integer('user_user_id')->nullable()->index('fk_information_users1_idx');
            $table->timestamp('information_input_date')->nullable();
            $table->timestamp('information_last_update')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('information');
    }
};
