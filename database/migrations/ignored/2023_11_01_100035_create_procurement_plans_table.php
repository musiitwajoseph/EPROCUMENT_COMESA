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
        Schema::create('procurement_plans', function (Blueprint $table) {
            $table->id();
            $table->text('Crt.No.');
            $table->text('Description_of_Goods|Works_and_Services');
            $table->text('Category_of_Procurement');
            $table->text('Qty');
            $table->text('Unit_of_Measure');
            $table->text('Procurement_Method');
            $table->text('Type_of_Contract');
            $table->text('Allocated_Amount');
            $table->text('Currency');
            $table->text('Source_of_funding');
            $table->text('Procuring_Unit');
            $table->text('Requisition_Unit');
            $table->text('Enduser_Requisition_Date');
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
        Schema::dropIfExists('procurement_plans');
    }
};
