<?php

namespace App\Imports;

use DB;
use App\Models\procurement;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Events\BeforeImport;


class Procurementdata implements ToModel, WithStartRow, WithEvents
{

    use Importable;
    use Importable, RegistersEventListeners;
  

    public function model(array $row)
    {

        return new procurement([
            
            'crt_no' => $row[0],
            'description_of_goods_Works_and_Services' => $row[1],
            'category_of_procurement' => $row[2],
            'qty' => $row[3],
            'unit_of_measure' =>  $row[4],
            'procurement_method' => $row[5],

            $md_contract_name = $row[6],
            $md_contract_id  = DB::table('master_datas')->where('md_name', $md_contract_name)->value('md_id'),

            'type_of_contract' =>  $md_contract_id,
            'allocated_amount' =>  $row[7],

            $md_contract_name = $row[8],
            $md_contract_id  = DB::table('master_datas')->where('md_name', $md_contract_name)->value('md_id'),

            'currency' =>  $md_contract_id,
            'source_of_funding' =>  $row[9],
            'procuring_unit' =>  $row[10],  

            $md_name_pp = $row[11],
            $md_user_id  = DB::table('master_datas')->where('md_name', $md_name_pp)->value('md_id'),

            // dd($md_user_id),
            'requisition_division' => $md_user_id,
            'requisition_unit' => $row[12],
            'end_user_requisition_date' => $row[13],
            'receipt_of_final_technical_requirements_date' => $row[14],
            'Preparation' => $row[15],
            'tender_publication_date' => $row[16],
            'tender_closing_date' => $row[17],
            'tender_opening_date' => $row[18],
            'tender_evaluation_start_date' =>$row[19],
            'tender_evaluation_end_date' => $row[20],
            'short_list_notice_publication_date' => $row[21],
            'invitation_of_shortlisted_candidate_date' => $row[22],
            'invitation_of_shortlisetd_canditates_closing_date' =>$row[23],
            'evaluation_of_bids_under_shortlist_method_start_date' => $row[24],
            'evaluation_of_bids_under_shortlist_method_end_date' => $row[25],
            'purchase_contracts_committee_approval_date' => $row[26],
            'evaluation_report_submission_date_to_SG' =>$row[27],
            'evaluation_report_approval_date_by_SG' => $row[28],
            ' contract_vetting_submission_date ' => $row[29],
            'contract_vetting_approval_date' => $row[30],
            'contract_amount' => $row[31],
            'SG_ASG_DHRA_contract_approval_date' => $row[32],
            'contract_signing_date' => $row[33],
            'contract_duration' => $row[34],
            'contract_end_date' => $row[35],
            'business_unit' =>$row[36],
            'accounting_code' => $row[37],
            'accounting_period' => $row[38],
            'strategic_objective_analysis_code' => $row[39],
            'coperating_partner_and_action_analysis_code' => $row[40],
            'intervention_area_analysis_code' =>$row[41],   
            'cost_centre_analysis_code' =>$row[42],
            'programme_action_components_analysis_code' =>$row[43],
            'output_analysis_code' =>$row[44],
            'main_activity_analysis_code' => $row[45],
            'disbursement_category_analysis_Code' => $row[46],
            'budget_line_analysis_code' => $row[47],

        ]);
    }

    public function startRow(): int
    {
        return 2;
    }

      public function rules(): array
    {
        return [

             'requisition_division' => function($attribute, $value, $onFailure) {
                  if ($value == null) {
                       $onFailure('The provided requistion division is invalid');
                  }
              }
        ];
    }

}
