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
        Schema::table('procurement_approvals', function (Blueprint $table) {
            Schema::table('procurement_approvals', function (Blueprint $table) {
                $table->text('reason')->default('Pending');
                        });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('procurement_approvals', function (Blueprint $table) {
            //
        });
    }
};
