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
        Schema::create('suplier_performance_evaluations', function (Blueprint $table) {
        $table->id();
        $table->text('Leader'); 
        $table->text('Partner');
        $table->text('From');
        $table->text('To');
        $table->text('achievement_of_contract');
        $table->text('ability_to_meet_deadlines');
        $table->text('quality_of_service');
        $table->text('name_key_experts');
        $table->text('client_relations');
        $table->text('written_communications');
        $table->text('verbal_communication');
        $table->text('drive_and_determination');
        $table->text('personal_effectiveness');
        $table->text('technical_completence');
        $table->text('overall');
        $table->text('contract_manager_name');
        $table->text('contract_manager_signature');
        $table->text('contract_manager_date');
           
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
        Schema::dropIfExists('suplier_performance_evaluations');
    }
};
