<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class procurement extends Model
{
    use HasFactory;

    protected $fillable = ['crt_no','description_of_goods_Works_and_Services','category_of_procurement','qty','unit_of_measure',
    'procurement_method','type_of_contract','allocated_amount','currency',
    'source_of_funding','procuring_unit','requisition_division','requisition_unit','tender_opening_date',
    'end_user_requisition_date','receipt_of_final_technical_requirements_date','Preparation','tender_publication_date',
    'tender_closing_date','tender_opening_date','tender_evaluation_start_date','tender_evaluation_end_date',
    'short_list_notice_publication_date','invitation_of_shortlisted_candidate_date','invitation_of_shortlisetd_canditates_closing_date','evaluation_of_bids_under_shortlist_method_start_date',
    'evaluation_of_bids_under_shortlist_method_end_date','purchase_contracts_committee_approval_date','evaluation_report_submission_date_to_SG','evaluation_report_approval_date_by_SG',
    ' contract_vetting_submission_date ','contract_vetting_approval_date','contract_amount','SG_ASG_DHRA_contract_approval_date',
    'contract_signing_date','contract_duration','contract_end_date','business_unit',
    'accounting_code','accounting_period','strategic_objective_analysis_code','coperating_partner_and_action_analysis_code',
    'intervention_area_analysis_code','cost_centre_analysis_code','programme_action_components_analysis_code','output_analysis_code',
    'supplier_name','main_activity_analysis_code','disbursement_category_analysis_Code','budget_line_analysis_code',    

];
}

