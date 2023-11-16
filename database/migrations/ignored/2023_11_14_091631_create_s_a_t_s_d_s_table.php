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
        Schema::create('s_a_t_s_d_s', function (Blueprint $table) {
            $table->id();
            $table->text('crt_no')->default('null');
            $table->text('description_of_goods_works_and_services')->default('null');
            $table->text('category_of_procurement')->default('null');
            $table->text('qty')->default('null');
            $table->text('unit_of_measure')->default('null');
            $table->text('Procurement_method')->default('null');
            $table->text('type_of_contract')->default('null');
            $table->text('allocated_amount')->default('null');
            $table->text('currency')->default('null');
            $table->text('source_of_funding')->default('null');
            $table->text('procuring_unit')->default('null');
            $table->text('requisition_unit')->default('null');
            $table->text('end_user_requisition_date')->default('null');
            $table->text('technical_requirements_receipt_of_final_technical_requirements_date')->default('null');
            $table->text('technical_requirements_preparation_of_tender_document')->default('null');
            $table->text('publication_of_tender_documents_publication_date')->default('null');
            $table->text('publication_of_tender_documents_closing_date')->default('null');
            $table->text('tender_openning')->default('null');
            $table->text('tender_evaluation_shortlisting_report_start_date')->default('null');
            $table->text('tender_evaluation_shortlisting_Report_end_date')->default('null');
            $table->text('short_list_notice_publication')->default('null');
            $table->text('invitation_to_shortlisted_firms_to_submit_proposals_invitation_date')->default('null');
            $table->text('invitation_to_shortlisted_firms_to_submit_proposals_closing_date')->default('null');
            $table->text('evaluation_of_bids_under_shortlist_method_start_date')->default('null');
            $table->text('evaluation_of_bids_under_shortlist_method_end_date')->default('null');
            $table->text('purchase_contracts_committee_approval')->default('null');
            $table->text('secretary_general_approval_of_pc_cc_reports_submission_date')->default('null');
            $table->text('secretary_general_approval_of_pc_cc_reports_approval_date')->default('null');
            $table->text('contract_vetting_submission_date')->default('null');
            $table->text('contract_vetting_approval_date')->default('null');
            $table->text('contract_amount')->default('null');
            $table->text('sg_asg_a_and_f_dhra_approval')->default('null');
            $table->text('contract_signing_date')->default('null');
            $table->text('contract_duration_date')->default('null');
            $table->text('contract_end_date')->default('null');
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
        Schema::dropIfExists('s_a_t_s_d_s');
    }
};
