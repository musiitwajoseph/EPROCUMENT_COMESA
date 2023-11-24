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
            $table->text('end_user_requisition_date');
            $table->text('receipt_of_final_technical_requirements');
            $table->text('preperation_of_tender_document_rfp_or_rfq');
            $table->text('tender_publication_date');
            $table->text('tender_closing_date');
            $table->text('tender_opening_date');
            $table->text('tender_evaluation_start_date');
            $table->text('tender_evaluation_enddate');
            $table->text('shortlist_notice_publication_date');
            $table->text('invitation_of_shortlisted_candidate_date');
            $table->text('invitation_of_shortlisted_candidate_closing_date');
            $table->text('evaluation_of_bids_under_shortlist_method_start_date');
            $table->text('evaluation_of_bids_under_shortlist_method_end_date');
            $table->text('purchase_contracts_committe_approval_date');
            $table->text('evaluation_report_submission_date_to_sg');
            $table->text('evaluation_report_approval_date_by_sg');
            $table->text('contract_vetting_submission_date');
            $table->text('contract_vetting_approval_date');
            $table->text('contract_amount');
            $table->text('contract_signing_date');
            $table->text('sg_asg_a_and_f_dhra_contract_approval_date');
            $table->text('contract_end_date');


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
