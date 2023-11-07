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
        Schema::create('master_datas', function (Blueprint $table) {
            // $table->id();
            $table->increments('md_id');
            $table->text('md_master_code_id')->default('null');
            $table->text('md_code')->default('null');
            $table->text('md_name')->default('null');
            $table->text('md_description')->default('null');
            $table->text('md_date_added')->default('null');
            $table->text('md_added_by')->default('null');
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
        Schema::dropIfExists('master_datas');
    }
};
