<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimestampsToBooks extends Migration
{
    public function up()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropTimestamps();
        });
    }
}

