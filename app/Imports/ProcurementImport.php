<?php

namespace App\Imports;

use App\Models\Procurement_plan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class ProcurementImport implements  ToModel,WithHeadingRow
    {

            public function model(array $row)
            {

                return new Procurement_plan([
                    'crt_no' => $row['welcome'],
                    'description_of_goods_works_and_services' => $row['TT'],
                    'category_of_procurement' => $row[' welcome_home'],
                    'qty' => $row['Qty'],
                    'unit_of_measure' => $row['Unit_of_Measure'],
                    'Procurement_method' => $row['ProcurementMethod'],
                    'type_of_contract' => $row['welcome'],
                    'allocated_amount' => $row['welcome'],
                    'currency' => $row['welcome'],
                    'source_of_funding' => $row['welcome'],
                    'procuring_unit' => $row['welcome'],
                    'requisition_unit' => $row['welcome'],
                    'end_user_requisition_date' =>$row['welcome'],
                    'technical_requirements_receipt_of_final_technical_requirements_date' => $row['Qty'],
                    'technical_requirements_preparation_of_tender_document' => $row['Qty'],
                    'publication_of_tender_documents_publication_date' => $row['Qty'],
                    'publication_of_tender_documents_closing_date' => $row['Qty'],
                    'tender_openning' => $row['Qty'],
                    'tender_evaluation_shortlisting_report_start_date' => $row['Qty'],
                    'tender_evaluation_shortlisting_Report_end_date'=> $row[19],
                    'short_list_notice_publication' => $row['Qty'],
                    // 'invitation_to_shortlisted_firms_to_submit_proposals_invitation_date' => $row[21],
                    // 'invitation_to_shortlisted_firms_to_submit_proposals_closing_date' => $row[22],
                    // 'evaluation_of_bids_under_shortlist_method_start_date' => $row[23],
                    // 'evaluation_of_bids_under_shortlist_method_end_date' => $row[24],
                    // 'purchase_contracts_committee_approval' => $row[25],
                    // 'secretary_general_approval_of_pc_cc_reports_submission_date' => $row[26],
                    // 'secretary_general_approval_of_pc_cc_reports_approval_date' => $row[27],
                    // 'contract_vetting_submission_date' => $row[28],
                    // 'contract_vetting_approval_date' => $row[29],
                    // 'contract_amount' => $row[30],
                    // 'sg_asg_a_and_f_dhra_approval' => $row[31],
                    // 'contract_signing_date' => $row[32],
                    // 'contract_duration_date' => $row[33],
                    // 'contract_end_date'=> $row[34],
                ]);
            }
        }



    
        // public function model(array $row)
        // {

        //     return new Procurement_plan([
        //         'crt_no' => $row['welcome'],
        //         'description_of_goods_works_and_services' => $row['Description_of_Goods_and_Works_and_Services'],
        //         'category_of_procurement' => $row[' welcome_home'],
        //         'qty' => $row[Qty],
        //         'unit_of_measure' => $row[4],
        //         'Procurement_method' => $row[5],
        //         'type_of_contract' => $row[6],
        //         'allocated_amount' => $row[7],
        //         'currency' => $row[8],
        //         'source_of_funding' => $row[9],
        //         'procuring_unit' => $row[10],
        //         'requisition_unit' => $row[11],
        //         'end_user_requisition_date' => $row[12],
        //         'technical_requirements_receipt_of_final_technical_requirements_date' => $row[13],
        //         'technical_requirements_preparation_of_tender_document' => $row[14],
        //         'publication_of_tender_documents_publication_date' => $row[15],
        //         'publication_of_tender_documents_closing_date' => $row[16],
        //         'tender_openning' => $row[17],
        //         'tender_evaluation_shortlisting_report_start_date' => $row[18],
        //         'tender_evaluation_shortlisting_Report_end_date'=> $row[19],
        //         'short_list_notice_publication' => $row[20],
        //         'invitation_to_shortlisted_firms_to_submit_proposals_invitation_date' => $row[21],
        //         'invitation_to_shortlisted_firms_to_submit_proposals_closing_date' => $row[22],
        //         'evaluation_of_bids_under_shortlist_method_start_date' => $row[23],
        //         'evaluation_of_bids_under_shortlist_method_end_date' => $row[24],
        //         'purchase_contracts_committee_approval' => $row[25],
        //         'secretary_general_approval_of_pc_cc_reports_submission_date' => $row[26],
        //         'secretary_general_approval_of_pc_cc_reports_approval_date' => $row[27],
        //         'contract_vetting_submission_date' => $row[28],
        //         'contract_vetting_approval_date' => $row[29],
        //         'contract_amount' => $row[30],
        //         'sg_asg_a_and_f_dhra_approval' => $row[31],
        //         'contract_signing_date' => $row[32],
        //         'contract_duration_date' => $row[33],
        //         'contract_end_date'=> $row[34],
        //     ]);
        // }