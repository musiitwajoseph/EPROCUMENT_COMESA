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
        Schema::create('procurements', function (Blueprint $table) {
            $table->id();
            $table->text('crt_no');
            $table->text('description_of_goods_Works_and_Services');
            $table->text('category_of_procurement');
            $table->text('qty');
            $table->text('unit_of_measure');
            $table->text('procurement_method');
            $table->text('type_of_contract');
            $table->text('allocated_amount');

            $table->text('currency');
            $table->text('source_of_funding');
            $table->text('procuring_unit');
            $table->text('requisition_division');


            $table->text('requisition_unit');
            $table->text('end_user_requisition_date');
            $table->text('receipt_of_final_technical_requirements_date');
            $table->text('Preparation');



            $table->text('tender_publication_date');
            $table->text('tender_closing_date');
            $table->text('tender_opening_date');
            $table->text('tender_evaluation_start_date');


            $table->text('tender_evaluation_end_date');
            $table->text('short_list_notice_publication_date');
            $table->text('invitation_of_shortlisted_candidate_date');
            $table->text('invitation_of_shortlisetd_canditates_closing_date');


            $table->text('evaluation_of_bids_under_shortlist_method_start_date');
            $table->text('evaluation_of_bids_under_shortlist_method_end_date');
            $table->text('purchase_contracts_committee_approval_date');
            $table->text('evaluation_report_submission_date_to_SG');

            $table->text('evaluation_report_approval_date_by_SG');
            $table->text(' contract_vetting_submission_date ');
            $table->text('contract_vetting_approval_date ');
            $table->text('contract_amount');

            $table->text('SG_ASG_DHRA_contract_approval_date');
            $table->text('contract_signing_date');
            $table->text('contract_duration');
            $table->text('contract_end_date ');


            $table->text('business_unit');
            $table->text('accounting_code');
            $table->text('accounting_period');
            $table->text('strategic_objective_analysis_code');


            $table->text('coperating_partner_and_action_analysis_code');
            $table->text('intervention_area_analysis_code');
            $table->text('cost_centre_analysis_code');
            $table->text('programme_action_components_analysis_code');


            $table->text('output_analysis_code');
            $table->text('main_activity_analysis_code');
            $table->text('disbursement_category_analysis_Code');
            $table->text('budget_line_analysis_code');
            $table->text('year');

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
        Schema::dropIfExists('procurements');
    }
};
