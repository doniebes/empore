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
        Schema::table('users-copy', function (Blueprint $table) {
            $table->foreign(['user_role_role_id'], 'fk_user_user_role1')->references(['role_id'])->on('user_roles')->onUpdate('SET NULL')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users-copy', function (Blueprint $table) {
            $table->dropForeign('fk_user_user_role1');
        });
    }
};
