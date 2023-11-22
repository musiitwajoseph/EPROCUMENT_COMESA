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
        Schema::create('timelines', function (Blueprint $table) {
            $table->id();
            // $table->text('End user requisition date');
            // $table->text('Receipt of final technical requirements');
            // $table->text('Preperation of Tender document RFP/RFQ');
            // $table->text('Tender publication date');
            // $table->text('Tender closing date');
            // $table->text('Tender Opening date');
            // $table->text('Tender evaluation start date');
            // $table->text('Tender evaluation enddate');
            // $table->text('Shortlist notice publication date');
            // $table->text('Invitation of shortlisted candidate date');
            // $table->text('Invitation of shortlisted candidate closing date');
            // $table->text('evaluation of bids under shortlist method start date');
            // $table->text('evaluation of bids under shortlist method end date');
            // $table->text('purchase contracts committe Approval date');
            // $table->text('Evaluation Report Submission Date to SG');
            // $table->text('Evaluation Report Approval Date by SG');
            // $table->text('contract vetting submission date');
            // $table->text('contract vetting approval date');
            // $table->text('contract amount');
            // $table->text('contract signing date');
            // $table->text('sg_asg_a_and_f_dhra_contract_approval_date');
            // $table->text('contract End Date');


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
        Schema::dropIfExists('timelines');
    }
};
