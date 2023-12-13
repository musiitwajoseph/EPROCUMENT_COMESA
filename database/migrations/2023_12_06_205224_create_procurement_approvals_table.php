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
        Schema::create('procurement_approvals', function (Blueprint $table) {
            $table->id();
            $table->text('All_sections');
            $table->text('HOP');
            $table->text('director_hr');
            $table->text('ASG_Finance');
            $table->text('SG');
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
        Schema::dropIfExists('procurement_approvals');
    }
};
