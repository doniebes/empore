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
        Schema::create('members', function (Blueprint $table) {
            $table->integer('member_id', true);
            $table->string('member_name', 150)->nullable();
            $table->enum('member_gender', ['L', 'P'])->nullable();
            $table->string('username', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('password', 255)->nullable();
            $table->string('member_address', 255)->nullable();
            $table->integer('member_phone')->nullable();
            $table->string('member_img', 150)->nullable();
            $table->boolean('remember_token')->nullable()->comment('1=Yes, 0=No');
            $table->boolean('is_active')->nullable()->default(true)->comment('1=Active, 0=Inactive');
            $table->dateTime('created_at')->nullable();
            $table->string('created_by', 100)->nullable();
            $table->dateTime('updated_at');
            $table->string('updated_by', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
};
