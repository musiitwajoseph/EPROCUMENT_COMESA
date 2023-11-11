<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use DB;
use App\Imports\ProcurementImport;
use App\Http\Controllers\Controller;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class ProcurementPlan extends Controller
{

    public function procuring()
    {
        $data = ['LoggedUserAdmin'=>Admin::where('id','=', session('LoggedAdmin'))->first()];
        return view('procurement.procuring',$data);
    }


    public function upload_excel(Request $request){
      
        $request->validate([
            'file1' => 'required|mimes:xlsx'
        ]);

        // return $request->all();
        $the_file = $request->file('file1');

        $spreadsheet = IOFactory::load($the_file->getRealPath());
        $sheetData       = $spreadsheet->getActiveSheet()->toArray();

            if (!empty($sheetData)) {
                for ($i=1; $i<count($sheetData); $i++) {

                    $crt_no = $sheetData[$i][0];
                    $desription_of_goods = $sheetData[$i][1];
                    $category_of_procurement = $sheetData[$i][2];
                    $qty = $sheetData[$i][3];
                    $unit_of_measure  = $sheetData[$i][4];
                    $Procurement_method = $sheetData[$i][5];
                    $type_of_contract = $sheetData[$i][6];
                    $allocated_amount = $sheetData[$i][7];
                    $currency  = $sheetData[$i][8];
                    $source_of_funding = $sheetData[$i][9];
                    $procuring_unit = $sheetData[$i][10];
                    $requisition_unit = $sheetData[$i][11];
                    $end_user_requisition_date = $sheetData[$i][12];
                    $technical_requirements_receipt_of_final_technical_requirements_date = $sheetData[$i][13];
                    $technical_requirements_preparation_of_tender_document = $sheetData[$i][14];
                    $publication_of_tender_documents_publication_date = $sheetData[$i][15];
                    $publication_of_tender_documents_closing_date  = $sheetData[$i][16];
                    $tender_openning = $sheetData[$i][17];
                    $tender_evaluation_shortlisting_report_start_date = $sheetData[$i][18];
                    $tender_evaluation_shortlisting_Report_end_date = $sheetData[$i][19];
                    $short_list_notice_publication  = $sheetData[$i][20];
                    $invitation_to_shortlisted_firms_to_submit_proposals_invitation_date = $sheetData[$i][21];
                    $invitation_to_shortlisted_firms_to_submit_proposals_closing_date = $sheetData[$i][22];
                    $evaluation_of_bids_under_shortlist_method_start_date = $sheetData[$i][23];
                    $evaluation_of_bids_under_shortlist_method_end_date = $sheetData[$i][24];
                    $purchase_contracts_committee_approval  = $sheetData[$i][25];
                    $secretary_general_approval_of_pc_cc_reports_submission_date = $sheetData[$i][26];
                    $secretary_general_approval_of_pc_cc_reports_approval_date = $sheetData[$i][27];
                    $contract_vetting_submission_date = $sheetData[$i][28];
                    $contract_vetting_approval_date  = $sheetData[$i][29];
                    $contract_amount  = $sheetData[$i][30];
                    $sg_asg_a_and_f_dhra_approval = $sheetData[$i][31];
                    $contract_signing_date = $sheetData[$i][32];
                    $contract_duration_date = $sheetData[$i][33];
                    $contract_end_date  = $sheetData[$i][34];


    
                    DB::table('procurement_plans')->insert(
                        array(
                          
                        'crt_no' =>$crt_no,
                        'description_of_goods_works_and_services' => $desription_of_goods,
                        'category_of_procurement' => $category_of_procurement,
                        'qty' => $qty,
                        'unit_of_measure'=>$unit_of_measure,
                        'Procurement_method'=>$Procurement_method,
                        'type_of_contract'=>$type_of_contract,
                        'allocated_amount'=>$allocated_amount,
                        'currency'=>$currency,
                        'source_of_funding'=>$source_of_funding,
                        'procuring_unit'=>$procuring_unit,
                        'requisition_unit'=>$requisition_unit,
                        'end_user_requisition_date'=>$end_user_requisition_date,
                        'technical_requirements_receipt_of_final_technical_requirements_date'=>$technical_requirements_receipt_of_final_technical_requirements_date,
                        'technical_requirements_preparation_of_tender_document'=>$technical_requirements_preparation_of_tender_document,
                        'publication_of_tender_documents_publication_date'=>$publication_of_tender_documents_publication_date,
                        'publication_of_tender_documents_closing_date'=>$publication_of_tender_documents_closing_date,
                        'tender_openning'=>$tender_openning,
                        'tender_evaluation_shortlisting_report_start_date'=>$tender_evaluation_shortlisting_report_start_date,
                        'tender_evaluation_shortlisting_Report_end_date'=>$tender_evaluation_shortlisting_Report_end_date,
                        'short_list_notice_publication' =>$short_list_notice_publication,
                        'invitation_to_shortlisted_firms_to_submit_proposals_invitation_date' => $invitation_to_shortlisted_firms_to_submit_proposals_invitation_date,
                        'invitation_to_shortlisted_firms_to_submit_proposals_closing_date' => $invitation_to_shortlisted_firms_to_submit_proposals_closing_date,
                        'evaluation_of_bids_under_shortlist_method_start_date' => $evaluation_of_bids_under_shortlist_method_start_date,
                        'evaluation_of_bids_under_shortlist_method_end_date'=>$evaluation_of_bids_under_shortlist_method_end_date,
                        'purchase_contracts_committee_approval'=>$purchase_contracts_committee_approval,
                        'secretary_general_approval_of_pc_cc_reports_submission_date'=>$secretary_general_approval_of_pc_cc_reports_submission_date,
                        'secretary_general_approval_of_pc_cc_reports_approval_date'=>$secretary_general_approval_of_pc_cc_reports_approval_date,
                        'contract_vetting_submission_date'=>$contract_vetting_submission_date,
                        'contract_vetting_approval_date'=>$contract_vetting_approval_date,
                        'contract_amount'=>$contract_amount,
                        'sg_asg_a_and_f_dhra_approval'=>$sg_asg_a_and_f_dhra_approval,
                        'contract_signing_date'=>$contract_signing_date,
                        'contract_duration_date'=>$contract_duration_date,
                        'contract_end_date'=>$contract_end_date,
                        )
                   );
                }
            }

            // return redirect('')
        }


    public function procurement_records(){

        $data = ['LoggedUserAdmin'=>Admin::where('id','=', session('LoggedAdmin'))->first()];

        // GENERAL QUERY
        // $table1 =  DB::select("SELECT * FROM procurement_plans where description_of_goods_works_and_services != 'NULL'");
         // STRATEGIC PLANNING  -SPR TABLE

        $first_element =  DB::select("SELECT TOP 1 id from procurement_plans");

        $startpoint = (int)$first_element + 2;

        $endpoint1 = DB::table('procurement_plans')->where('description_of_goods_works_and_services','INFRASTRUCTURE DIVISION ')
        ->value('id');
        
        $table1 =  DB::select("SELECT * FROM procurement_plans where technical_requirements_receipt_of_final_technical_requirements_date !=
       'NULL' AND id Between $startpoint AND $endpoint1;");



        // INFRASTRUCTURE DIVISION TABLE

        $startpoint_db_1 = DB::table('procurement_plans')->where('description_of_goods_works_and_services','INFRASTRUCTURE DIVISION ')
        ->value('id');

        $startend_db_2 = DB::table('procurement_plans')->where('description_of_goods_works_and_services','SATSD ')
        ->value('id');

        // $startpoint_db_1 = $startpoint_db_1+3; Special point to edit the increment value

        $startpoint_db_1 = $startpoint_db_1+4;
        $startend_db_2 = $startend_db_2-1;

        $table_point_db =  DB::select("SELECT * FROM procurement_plans where id Between $startpoint_db_1 AND $startend_db_2;");

        
         // SATSD 
        $startpoint2 = DB::table('procurement_plans')->where('description_of_goods_works_and_services','SATSD ')
        ->value('id');

        $endpoint2 = DB::table('procurement_plans')->where('description_of_goods_works_and_services',' RIFF PROJECT ')
        ->value('id');

        $startpoint2 = $startpoint2+3;
        $endpoint2 = $endpoint2-1;

        $table2 =  DB::select("SELECT * FROM procurement_plans where id Between $startpoint2 AND $endpoint2;");


         //  RIFF PROJECT TABLE

         $startpoint4 = DB::table('procurement_plans')->where('description_of_goods_works_and_services',' RIFF PROJECT ')
         ->value('id');

         $endpoint4 = DB::table('procurement_plans')->where('description_of_goods_works_and_services','CORPORATE COMMUNICATION UNIT - PR ')
         ->value('id');
 
         $startpoint4 = $startpoint4+3;
         $endpoint4 = $endpoint4-1;
         
         $table4 =  DB::select("SELECT * FROM procurement_plans where description_of_goods_works_and_services != 'NULL' AND  id Between $startpoint4 AND $endpoint4;");

         
        //  CORPORATE COMMUNICATION UNIT - PR TABLE

        $startpoint5 = DB::table('procurement_plans')->where('description_of_goods_works_and_services','CORPORATE COMMUNICATION UNIT - PR ')
         ->value('id');

         $endpoint5 = DB::table('procurement_plans')->where('description_of_goods_works_and_services','LEGAL DIVISION')
         ->value('id');
         
         $startpoint5 = $startpoint5+3;
         $endpoint5 = $endpoint5-1;

        $table5 =  DB::select("SELECT * FROM procurement_plans where  id Between $startpoint5 AND $endpoint5;");


        // LEGAL DIVISION TABLE

        $startpoint6 = DB::table('procurement_plans')->where('description_of_goods_works_and_services','LEGAL DIVISION')
        ->value('id');

        $endpoint6 = DB::table('procurement_plans')->where('description_of_goods_works_and_services','REARESA')
        ->value('id');

        $startpoint6 = $startpoint6+3;
        $endpoint6 = $endpoint6-1;

        $table6 =  DB::select("SELECT * FROM procurement_plans where  id Between $startpoint6 AND $endpoint6;");

        // REARESA Table

        $startpoint7 = DB::table('procurement_plans')->where('description_of_goods_works_and_services','REARESA')
        ->value('id');

        $endpoint7 = DB::table('procurement_plans')->where('description_of_goods_works_and_services','BRUSSELS LIASON OFFICE (BLO)')
        ->value('id');

        $startpoint7 = $startpoint7+3;
        $endpoint7 = $endpoint7-1;

        $table7 =  DB::select("SELECT * FROM procurement_plans where  id Between $startpoint7 AND $endpoint7;");

        // BRUSSELS LIASON OFFICE (BLO) Table

        $startpoint8 = DB::table('procurement_plans')->where('description_of_goods_works_and_services','BRUSSELS LIASON OFFICE (BLO)')
        ->value('id');

        $endpoint8 = DB::table('procurement_plans')->where('description_of_goods_works_and_services','ECOSOCC')
        ->value('id');

        $startpoint8 = $startpoint8+3;
        $endpoint8 = $endpoint8-1;

        $table8 =  DB::select("SELECT * FROM procurement_plans where  id Between $startpoint8 AND $endpoint8;");

        // ECOSOCC

        $startpoint9 = DB::table('procurement_plans')->where('description_of_goods_works_and_services','ECOSOCC')
        ->value('id');

        $endpoint9 = DB::table('procurement_plans')->where('description_of_goods_works_and_services','Governance Peace & Security  - GPS')
        ->value('id');

        $startpoint9 = $startpoint9+3;
        $endpoint9 = $endpoint9-1;

        $table9 =  DB::select("SELECT * FROM procurement_plans where  id Between $startpoint9 AND $endpoint9;");


        // Governance Peace & Security  - GPS 

        $startpoint10 = DB::table('procurement_plans')->where('description_of_goods_works_and_services','Governance Peace & Security  - GPS')
        ->value('id');

        $endpoint10 = DB::table('procurement_plans')->where('description_of_goods_works_and_services','GPS - CLIMATE CHANGE')
        ->value('id');

        $startpoint10 = $startpoint10+3;
        $endpoint10 = $endpoint10-1;

        $table10 =  DB::select("SELECT * FROM procurement_plans where  id Between $startpoint10 AND $endpoint10;");

        // GPS - CLIMATE CHANGE


        $startpoint11 = DB::table('procurement_plans')->where('description_of_goods_works_and_services','GPS - CLIMATE CHANGE')
        ->value('id');


        $endpoint11 = DB::table('procurement_plans')->where('description_of_goods_works_and_services','INTERNAL AUDIT')
        ->value('id');


        $startpoint11 = $startpoint11+3;
        $endpoint11 = $endpoint11-1;

        $table11 =  DB::select("SELECT * FROM procurement_plans where  id Between $startpoint11 AND $endpoint11;");

        // INTERNAL AUDIT

        $startpoint12 = DB::table('procurement_plans')->where('description_of_goods_works_and_services','INTERNAL AUDIT')
        ->value('id');

        $endpoint12 = DB::table('procurement_plans')->where('description_of_goods_works_and_services','ESTATES')
        ->value('id');

        $startpoint12 = $startpoint12+3;
        $endpoint12 = $endpoint12-1;

        $table12 =  DB::select("SELECT * FROM procurement_plans where  id Between $startpoint12 AND $endpoint12;");

        // ESTATES

        $startpoint13 = DB::table('procurement_plans')->where('description_of_goods_works_and_services','ESTATES')
        ->value('id');

        $endpoint13 = DB::table('procurement_plans')->where('description_of_goods_works_and_services','IRC')
        ->value('id');


        $startpoint13 = $startpoint13+3;
        $endpoint13 = $endpoint13-1;

        $table13 =  DB::select("SELECT * FROM procurement_plans where  id Between $startpoint13 AND $endpoint13;");

        // IRC

        $startpoint14 = DB::table('procurement_plans')->where('description_of_goods_works_and_services','IRC')
        ->value('id');

        $endpoint14 = DB::table('procurement_plans')->where('description_of_goods_works_and_services','TRADE AND CUSTOMS')
        ->value('id');

        $startpoint14 = $startpoint14+3;
        $endpoint14 = $endpoint14-1;

        $table14 =  DB::select("SELECT * FROM procurement_plans where  id Between $startpoint14 AND $endpoint14;");

        // TRADE AND CUSTOMS TABLE

        $startpoint15 = DB::table('procurement_plans')->where('description_of_goods_works_and_services','TRADE AND CUSTOMS')
        ->value('id');

        $endpoint15 = DB::table('procurement_plans')->where('description_of_goods_works_and_services','TRADE COM 11')
        ->value('id');

        $startpoint15 = $startpoint15+3;
        $endpoint15 = $endpoint15-1;

        $table15 =  DB::select("SELECT * FROM procurement_plans where  id Between $startpoint15 AND $endpoint15;");

        // TRADE COM 

        $startpoint16 = DB::table('procurement_plans')->where('description_of_goods_works_and_services','TRADE COM 11')
        ->value('id');

        $endpoint16 = DB::table('procurement_plans')->where('description_of_goods_works_and_services','EDF11  TFP')
        ->value('id');

        $startpoint16 = $startpoint16+3;
        $endpoint16 = $endpoint16-1;

        $table16 =  DB::select("SELECT * FROM procurement_plans where  id Between $startpoint16 AND $endpoint16;");

        // EDF11  TFP TABLE

        $startpoint17 = DB::table('procurement_plans')->where('description_of_goods_works_and_services','EDF11  TFP')
        ->value('id');

        $endpoint17 = DB::table('procurement_plans')->where('description_of_goods_works_and_services','TRADE IN SERVICES')
        ->value('id');

        
        $startpoint17 = $startpoint17+3;
        $endpoint17 = $endpoint17-1;

        $table17 =  DB::select("SELECT * FROM procurement_plans where  id Between $startpoint17 AND $endpoint17;");

        // TRADE IN SERVICES TABLE

        $startpoint18 = DB::table('procurement_plans')->where('description_of_goods_works_and_services','TRADE IN SERVICES')
        ->value('id');

        $endpoint18 = DB::table('procurement_plans')->where('description_of_goods_works_and_services','SSCBT1')
        ->value('id');

        $startpoint18 = $startpoint18+3;
        $endpoint18 = $endpoint18-1;

        $table18 =  DB::select("SELECT * FROM procurement_plans where  id Between $startpoint18 AND $endpoint18;");

        // SSCBT1 TABLE

        $startpoint19 = DB::table('procurement_plans')->where('description_of_goods_works_and_services','SSCBT1')
        ->value('id');

        $endpoint19 = DB::table('procurement_plans')->where('description_of_goods_works_and_services','TCPB11')
        ->value('id');

        $startpoint19 = $startpoint19+3;
        $endpoint19 = $endpoint19-1;

        $table19 =  DB::select("SELECT * FROM procurement_plans where  id Between $startpoint19 AND $endpoint19;");

        // TCPB11

        $startpoint20 = DB::table('procurement_plans')->where('description_of_goods_works_and_services','TCPB11')
        ->value('id');

        $endpoint20 = DB::table('procurement_plans')->where('description_of_goods_works_and_services','GENDER AND SOCIAL AFFAIRS DIVISION ')
        ->value('id');

        $startpoint20 = $startpoint20+3;
        $endpoint20 = $endpoint20-1;

        $table20 =  DB::select("SELECT * FROM procurement_plans where  id Between $startpoint20 AND $endpoint20;");

        // GENDER AND SOCIAL AFFAIRS DIVISION

        $startpoint21 = DB::table('procurement_plans')->where('description_of_goods_works_and_services','GENDER AND SOCIAL AFFAIRS DIVISION ')
        ->value('id');

        $endpoint21 = DB::table('procurement_plans')->where('description_of_goods_works_and_services','IT DIVISION')
        ->value('id');

        $startpoint21 = $startpoint21+3;
        $endpoint21 = $endpoint21-1;

        $table21 =  DB::select("SELECT * FROM procurement_plans where  id Between $startpoint21 AND $endpoint21;");

        //IT DIVISION TABLE 

        $startpoint22 = DB::table('procurement_plans')->where('description_of_goods_works_and_services','IT DIVISION')
        ->value('id');

        $endpoint22 = DB::table('procurement_plans')->where('description_of_goods_works_and_services','HUMAN RESOURCE')
        ->value('id');

        $startpoint22 = $startpoint22+3;
        $endpoint22 = $endpoint22-1;

        $table22 =  DB::select("SELECT * FROM procurement_plans where  id Between $startpoint22 AND $endpoint22;");

        // HUMAN RESOURCE

        $startpoint23 = DB::table('procurement_plans')->where('description_of_goods_works_and_services','HUMAN RESOURCE')
        ->value('id');

        $endpoint23 = DB::table('procurement_plans')->where('description_of_goods_works_and_services','Finance and Budgeting')
        ->value('id');

        $startpoint23 = $startpoint23+3;
        $endpoint23 = $endpoint23-1;

        $table23 =  DB::select("SELECT * FROM procurement_plans where  id Between $startpoint23 AND $endpoint23;");

        // Finance and Budgeting
            
        $startpoint24 = DB::table('procurement_plans')->where('description_of_goods_works_and_services','Finance and Budgeting')
        ->value('id');

        $endpoint24 = DB::table('procurement_plans')->where('description_of_goods_works_and_services','Industry and Agriculture')
        ->value('id');

        $startpoint24 = $startpoint24+3;
        $endpoint24 = $endpoint24-1;

        $table24 =  DB::select("SELECT * FROM procurement_plans where  id Between $startpoint24 AND $endpoint24;");
        
        // Industry and Agriculture Table

        $startpoint25 = DB::table('procurement_plans')->where('description_of_goods_works_and_services','Industry and Agriculture')
        ->value('id');

        $endpoint25 = DB::table('procurement_plans')->where('description_of_goods_works_and_services','Procurement & Supplies Unit')
        ->value('id');

        $startpoint25 = $startpoint25+3;
        $endpoint25 = $endpoint25-1;

        $table25 =  DB::select("SELECT * FROM procurement_plans where  id Between $startpoint25 AND $endpoint25;");

        // Procurement & Supplies Unit Table

        $startpoint26 = DB::table('procurement_plans')->where('description_of_goods_works_and_services','Procurement & Supplies Unit')
        ->value('id');

        $endpoint26 = DB::table('procurement_plans')->where('description_of_goods_works_and_services','Statistics')
        ->value('id');

        $startpoint26 = $startpoint26+3;
        $endpoint26 = $endpoint26-1;

        $table26 =  DB::select("SELECT * FROM procurement_plans where  id Between $startpoint26 AND $endpoint26;");

        // Statistics

        $startpoint27 = DB::table('procurement_plans')->where('description_of_goods_works_and_services','Statistics')
        ->value('id');

        $startpoint27 = $startpoint27+3;

        $table27 =  DB::select("SELECT * FROM procurement_plans where  id >= $startpoint27;");


        return view('procurement.ProcurementRecords',$data)
                    ->with('table1',$table1)
                    ->with('table2',$table2)
                    ->with('table4',$table4)
                    ->with('table5',$table5)
                    ->with('table6',$table6)
                    ->with('table7',$table7)
                    ->with('table8',$table8)
                    ->with('table9',$table9)
                    ->with('table10',$table10)
                    ->with('table11',$table11)
                    ->with('table12',$table12)
                    ->with('table13',$table13)
                    ->with('table14',$table14)
                    ->with('table15',$table15)
                    ->with('table16',$table16)
                    ->with('table17',$table17)
                    ->with('table18',$table18)
                    ->with('table19',$table19)
                    ->with('table20',$table20)
                    ->with('table21',$table21)
                    ->with('table22',$table22)
                    ->with('table23',$table23)
                    ->with('table24',$table24)
                    ->with('table25',$table25)
                    ->with('table26',$table26)
                    ->with('table27',$table27)
                    ->with('table_point_db',$table_point_db);
    }   

}
