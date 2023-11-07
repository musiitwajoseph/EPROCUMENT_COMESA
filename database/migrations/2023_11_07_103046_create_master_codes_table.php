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
        Schema::create('master_codes', function (Blueprint $table) {
            $table->id();
            $table->text('mc_id');
            $table->text('mc_code')->default('null');
            $table->text('mc_name')->default('null');
            $table->text('mc_description')->default('null');
            $table->text('mc_date_added')->default('null');
            $table->text('mc_added_by')->default('null');
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
        Schema::dropIfExists('master_codes');
    }
};
