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
        Schema::create('purchase_requistions', function (Blueprint $table) {
            $table->id();
            $table->text('divison');
            $table->text('date');
            $table->text('reason_for_purchase');
            $table->text('qty');
            $table->text('item_code');
            $table->text('description');
            $table->text('Attached_records');
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
        Schema::dropIfExists('purchase_requistions');
    }
};
