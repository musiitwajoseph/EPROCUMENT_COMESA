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
        Schema::create('requisition_plan_approvals', function (Blueprint $table) {
            $table->id();
            $table->text('requistion_divison');
            $table->text('procurement_officer');
            $table->text('Head_of_procurement');
            $table->text('Director_HR_and_Admin');
            $table->text('ASG_finance_and_admin');
            $table->timestamps();
        });
    }


    // ASG



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requisition_plan_approvals');
    }
};
