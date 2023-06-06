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
        Schema::create('borrows', function (Blueprint $table) {
            $table->integer('borrow_id', true);
            $table->integer('book_request_id')->nullable();
            $table->integer('member_id')->nullable();
            $table->integer('book_id')->nullable();
            $table->date('borrow_date')->nullable();
            $table->date('return_date')->nullable();
            $table->string('borrow_note', 255)->nullable();
            $table->string('status', 50)->nullable();
            $table->dateTime('created_at')->nullable();
            $table->string('created_by', 100)->nullable();
            $table->dateTime('updated_at')->nullable();
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
        Schema::dropIfExists('borrows');
    }
};
