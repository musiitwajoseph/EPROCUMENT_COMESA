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
            $table->text('crt_no');
            $table->text('description_of_goods_works_and_services');
            $table->text('category_of_procurement');
            $table->text('qty');
            $table->text('unit_of_measure');
            $table->text('Procurement_method');
            $table->text('type_of_contract');
            $table->text('allocated_amount');
            $table->text('currency');
            $table->text('source_of_funding');
            $table->text('procuring_unit');
            $table->text('requisition_unit');
            $table->text('end_user_requisition_date');
            $table->text('technical_requirements_receipt_of_final_technical_requirements_date');
            $table->text('technical_requirements_preparation_of_tender_document');
            $table->text('publication_of_tender_documents_publication_date');
            $table->text('publication_of_tender_documents_closing_date');
            $table->text('tender_openning');
            $table->text('tender_evaluation_shortlisting_report_start_date');
            $table->text('tender_evaluation_shortlisting_Report_end_date');
            $table->text('short_list_notice_publication');
            $table->text('invitation_to_shortlisted_firms_to_submit_proposals_invitation_date');
            $table->text('invitation_to_shortlisted_firms_to_submit_proposals_closing_date');
            $table->text('evaluation_of_bids_under_shortlist_method_start_date');
            $table->text('evaluation_of_bids_under_shortlist_method_end_date');
            $table->text('purchase_contracts_committee_approval');
            $table->text('secretary_general_approval_of_pc_cc_reports_submission_date');
            $table->text('secretary_general_approval_of_pc_cc_reports_approval_date');
            $table->text('contract_vetting_submission_date');
            $table->text('contract_vetting_approval_date');
            $table->text('contract_amount');
            $table->text('sg_asg_a_and_f_dhra_approval');
            $table->text('contract_signing_date');
            $table->text('contract_duration_date');
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
        Schema::dropIfExists('procurement_plans');
    }
};
