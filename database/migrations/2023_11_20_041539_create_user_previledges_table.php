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
        Schema::create('user_previledges', function (Blueprint $table) {
            $table->id();
            $table->text('user_user_id');
            $table->text('previledge_name');
            $table->text('A');
            $table->text('V');
            $table->text('E');
            $table->text('D');
            $table->text('P');
            $table->text('I');
            $table->text('X');
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
        Schema::dropIfExists('user_previledges');
    }
};
