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
        Schema::create('items_not_planneds', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->text('date');
            $table->text('reason_for_purchase');
            $table->text('qty');
            $table->text('amount_needed');
            $table->text('Attached_records');
            $table->text('status')->default('Pending');
            $table->text('divison_unit');
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
        Schema::dropIfExists('items_not_planneds');
    }
};
