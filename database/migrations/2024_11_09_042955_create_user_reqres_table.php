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
        Schema::create('user_reqres', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('reqres_id');
            $table->string('email');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('avatar');
            $table->text('ecnrypted_data');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_reqres');
    }
};
