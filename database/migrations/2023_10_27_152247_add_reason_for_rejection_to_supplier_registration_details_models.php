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
        Schema::table('supplier_registration_details_models', function (Blueprint $table) {
            $table->text('reason_for_rejection')->default('Null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('supplier_registration_details_models', function (Blueprint $table) {
            //
        });
    }
};
