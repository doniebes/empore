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
        Schema::create('fontawesome', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 64)->nullable()->index('idx_currency_name');
            $table->char('label', 50)->nullable();
            $table->char('code', 10)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fontawesome');
    }
};
