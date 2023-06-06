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
        Schema::create('modul', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 50);
            $table->string('slug', 100)->nullable();
            $table->string('icon', 50)->nullable();
            $table->string('note', 50)->nullable();
            $table->string('menu', 50)->nullable();
            $table->text('role_id')->nullable();
            $table->integer('parent_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modul');
    }
};
