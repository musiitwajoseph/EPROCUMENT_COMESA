<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use DB;
use Carbon;
use App\Imports\ProcurementImport;
use App\Http\Controllers\Controller;
use App\Models\master_data;
use App\Models\master_code;
use Session;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class ProcurementPlan extends Controller
{

    public function procuring()
    {

        $procurement_categories = DB::select('select * from master_datas where md_master_code_id = 53');

        $data = ['LoggedUserAdmin'=>Admin::where('id','=', session('LoggedAdmin'))->first()];


        return view('procurement.procuring',$data,compact('procurement_categories'));
    }


    public function upload_excel(Request $request){
      
        $request->validate([
            'file1' => 'required|mimes:xlsx'
        ]);



        $year_of_procurement = $request->year_of_procurement;
        $procurement_category = $request->category_id;

        // return $request->all();
        $the_file = $request->file('file1');

        $spreadsheet = IOFactory::load($the_file->getRealPath());
        $sheetData       = $spreadsheet->getActiveSheet()->toArray();

            if (!empty($sheetData)) {
                for ($i=1; $i<count($sheetData); $i++) {
                    if($i>1){

                    
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
                        'year_of_procurement'=>$year_of_procurement,
                        'category_id'=>$procurement_category,
                        )
                   );
                }
            }
        }

            return back()->with('success','Procurement plan has been upload successfully');
        }


    public function procurement_records(){

        $data = ['LoggedUserAdmin'=>Admin::where('id','=', session('LoggedAdmin'))->first()];

        // SPR TABLE Category
        $spr_table = DB::table('procurement_plans')->where('category_id', 1329)->get();


        // INFRASTRUCTURE DIVISION 
        $infrastructure = DB::table('procurement_plans')->where('category_id', 1330)->get();

        // SATSD DIVISION 
        $SATSD = DB::table('procurement_plans')->where('category_id', 1331)->get();

        // RIFF PROJECT 
         $RIFF = DB::table('procurement_plans')->where('category_id', 1332)->get();

        
         // CORPORATE COMMUNICATION UNIT - PR
        $CORPORATE_COMMUNICATION = DB::table('procurement_plans')->where('category_id', 1332)->get();

        
        // LEGAL DIVISION
        $LEGAL_DIVISION = DB::table('procurement_plans')->where('category_id', 1333)->get();

         // REARESA DIVISION
         $REARESA = DB::table('procurement_plans')->where('category_id', 1333)->get();

         // REARESA DIVISION
         $REARESA = DB::table('procurement_plans')->where('category_id', 1333)->get();

         // BRUSSELS LIASON OFFICE (BLO)
         $BRUSSELS_LIASON = DB::table('procurement_plans')->where('category_id', 1334)->get();

        // ECOSOCC
        $ECOSOCC = DB::table('procurement_plans')->where('category_id', 1335)->get();

         // Governance Peace & Security  -
         $Governance_Peace_and_Security = DB::table('procurement_plans')->where('category_id', 1335)->get();

                 //GPS - CLIMATE CHANGE
                $GPS_CLIMATE_CHANGE = DB::table('procurement_plans')->where('category_id', 1337)->get();

                  // INTERNAL AUDIT  -
                $internal_audit = DB::table('procurement_plans')->where('category_id', 1351)->get();

                 // ESTATES  -
                $ESTATES = DB::table('procurement_plans')->where('category_id', 1352)->get();

                 // IRC  -
                $IRC = DB::table('procurement_plans')->where('category_id', 1353)->get();

                // TRADE_AND_CUSTOMS  -
                 $TRADE_AND_CUSTOMS = DB::table('procurement_plans')->where('category_id', 1354)->get();

                // TRADE_COM_11  -
                $TRADE_COM_11 = DB::table('procurement_plans')->where('category_id', 1355)->get();

                // EDF11  TFP  -
                $EDF11_TFP = DB::table('procurement_plans')->where('category_id', 1356)->get();

                // TRADE IN SERVICES  -
                $TRADE_IN_SERVICES = DB::table('procurement_plans')->where('category_id', 1357)->get();

                  // SSCBT1 -
                  $SSCBT1 = DB::table('procurement_plans')->where('category_id', 1338)->get();


                   // TCPB11 -
                   $TCPB11 = DB::table('procurement_plans')->where('category_id', 1339)->get();

                    // GENDER_AND_SOCIAL_AFFAIRS_DIVISION -
                    $GENDER_AND_SOCIAL_AFFAIRS_DIVISION = DB::table('procurement_plans')->where('category_id', 1340)->get();

                    // IT_DIVISION -
                    $IT_DIVISION = DB::table('procurement_plans')->where('category_id', 1341)->get();

                      // IT_DIVISION -
                      $HUMAN_RESOURCE  = DB::table('procurement_plans')->where('category_id', 1342)->get();
                      

                      $Finance_and_Budgeting   = DB::table('procurement_plans')->where('category_id', 1343)->get();

                      

                      $Industry_and_Agriculture   = DB::table('procurement_plans')->where('category_id', 1344)->get();

                      

                      $Procurement_and_Supplies   = DB::table('procurement_plans')->where('category_id', 1345)->get();

                      $Statistics   = DB::table('procurement_plans')->where('category_id', 1346)->get();

                      $year   = DB::table('procurement_plans')->where('category_id', 1346)->value('year_of_procurement');
        

        return view('procurement.ProcurementRecords',$data)

                    ->with('year',$year)
                    ->with('infrastructure',$infrastructure)
                    ->with('SATSD',$SATSD)
                    ->with('RIFF',$RIFF)
                    ->with('EDF11_TFP',$EDF11_TFP)
                    ->with('CORPORATE_COMMUNICATION',$CORPORATE_COMMUNICATION)
                    ->with('LEGAL_DIVISION',$LEGAL_DIVISION)
                    ->with('REARESA',$REARESA)
                    ->with('BRUSSELS_LIASON',$BRUSSELS_LIASON)
                    ->with('ECOSOCC',$ECOSOCC)
                    ->with('Governance_Peace_and_Security',$Governance_Peace_and_Security)
                    ->with('GPS_CLIMATE_CHANGE',$GPS_CLIMATE_CHANGE)
                    ->with('internal_audit',$internal_audit)
                    ->with('ESTATES',$ESTATES)
                    ->with('IRC',$IRC)
                    ->with('TRADE_AND_CUSTOMS',$TRADE_AND_CUSTOMS)
                    ->with('TRADE_COM_11',$TRADE_COM_11)
                    ->with('TRADE_IN_SERVICES',$TRADE_IN_SERVICES)
                    ->with('SSCBT1',$SSCBT1)
                    ->with('TCPB11',$TCPB11)
                    ->with('GENDER_AND_SOCIAL_AFFAIRS_DIVISION',$GENDER_AND_SOCIAL_AFFAIRS_DIVISION)
                    ->with('IT_DIVISION',$IT_DIVISION)
                    ->with('HUMAN_RESOURCE',$HUMAN_RESOURCE)
                    ->with('Finance_and_Budgeting',$Finance_and_Budgeting)
                    ->with('Industry_and_Agriculture',$Industry_and_Agriculture)
                    ->with('Procurement_and_Supplies',$Procurement_and_Supplies)
                    ->with('Statistics',$Statistics)
                    ->with('spr_table',$spr_table);     
    }   

    // Master data 

    public function master_table(){

        // $all_data =  master_data::all();
        $mc_code = DB::select('select * from master_codes,master_datas where master_codes.id = md_master_code_id');

        // dd($mc_code);

        $data = ['LoggedUserAdmin'=>Admin::where('id','=', session('LoggedAdmin'))->first()];


        return view('master_data',$data ,compact(['mc_code']));
    }

    public function edit_record($md_id){

        $data = ['LoggedUserAdmin'=>Admin::where('id','=', session('LoggedAdmin'))->first()];

        $tb_record =  DB::table('master_datas')->where('md_id', $md_id)->get();

        return view('editrecord',$data,compact(['tb_record']));
    }

    public function updatemdrecord(Request $request){

        $md_id = $request->md_id;

        $data = Session::get($md_id);
        $date = time();


        // $session = $request->user_id;
         $session = 2;

        DB::table('master_datas')
        ->where('md_id',$md_id)
        ->update(['md_master_code_id' => $request->md_master_code_id,'md_code' => $request->md_code,'md_name' => $request->md_name,
        'md_description' => $request->md_description,'md_date_added' =>$date,
        'md_added_by'=> $session]);

        return back()->with('success','Data has been updated successfully');


        $save = $post->save();

        if($save){
            dd("Data has been saved successfully");
        }

        return $request->all();
    }


    public function delete_record($md_id){

        DB::table('master_datas')->where('md_id', $md_id)->delete();

        return back()->with('success','Record has been deleted successfully');
    }

    public function addrecordmaster(Request $request){

        $data = ['LoggedUserAdmin'=>Admin::where('id','=', session('LoggedAdmin'))->first()];

        $selected = DB::select('select id, mc_name from master_codes');

        return view('addrecordmaster',$data,compact(['selected']));
    }


    public function addnewrecord(Request $request){

        // $data = $request->all();

        $recordsave = new master_data;

        $date = time();
        $session = $request->user_id;


        $recordsave->md_master_code_id = $request->master_code_id;
        $recordsave->md_code = $request->md_code;
        $recordsave->md_name = $request->md_name;
        $recordsave->md_description = $request->md_description;
        $recordsave->md_date_added = $date;
        $recordsave->md_added_by = $session;

        // DB::unprepared('SET IDENTITY_INSERT master_datas ON');
        $save = $recordsave->save();

        return back()->with('success','Record has been added successfully');
    }


    // Master Code routes

    public function master_code(){

        $all_data =  DB::table('master_codes')->get();
        $data = ['LoggedUserAdmin'=>Admin::where('id','=', session('LoggedAdmin'))->first()];

        return view('master_code',$data ,compact(['all_data']));
    }

    public function add_master_code(){
        
        $data = ['LoggedUserAdmin'=>Admin::where('id','=', session('LoggedAdmin'))->first()];
        return view('addmastercode',$data);
    }

    public function send_master_code(Request $request){

       $post = new master_code;

       $date = time();
       $session = $request->user_id;


       $values = array('mc_id' => $request->mc_code,'mc_code' => $request->mc_code,'mc_name' => $request->mc_name,
       'mc_description' => $request->mc_description,'mc_date_added' =>$date,
       'mc_added_by'=> $session);


       DB::table('master_codes')->insert($values);
      
      return back()->with('success','New data record has been added');
    }


    public function edit_code($mc_id){

        $record_code =  DB::table('master_codes')->where('mc_id', $mc_id)->get();

        $data = ['LoggedUserAdmin'=>Admin::where('id','=', session('LoggedAdmin'))->first()];

        return view('editmastercode',$data,compact(['record_code']));

    }


    public function delete_code($mc_id){
        
        DB::table('master_codes')->where('mc_id', $mc_id)->delete();

        return back()->with('success','Record has been deleted successfully');
    }

    public function updatemdcode(Request $request){

        $mc_id = $request->mc_id;
        $post = DB::table('master_codes')->where('mc_id',$mc_id)->value('mc_id');


       $date = time();
       $session = $request->user_id;

        DB::table('master_codes')
                ->where('mc_id',$mc_id)
                ->update(['mc_id' => $request->mc_code,'mc_code' => $request->mc_code,'mc_name' => $request->mc_name,
                'mc_description' => $request->mc_description,'mc_date_added' =>$date,
                'mc_added_by'=> $session]);

        return back()->with('success','Data has been updated successfully');
    }

    public function uploadSupplierDetails(){

    $data = ['LoggedUserAdmin'=>Admin::where('id','=', session('LoggedAdmin'))->first()];

      return view('procurement.ImportSupplier',$data);
    }

    public function send_supplier_uploaded_data(Request $request){

        $request->validate([
            'file1' => 'required|mimes:xlsx'
        ]);

        $the_file = $request->file('file1');

        $spreadsheet = IOFactory::load($the_file->getRealPath());
        $sheetData       = $spreadsheet->getActiveSheet()->toArray();

        if (!empty($sheetData)) {
            for ($i=1; $i<count($sheetData); $i++) {
                if($i>1){
                
                $token = rand(10000, 99999);

                $supplier_name = $sheetData[$i][0];
                $telephone = $sheetData[$i][1];
                $email = $sheetData[$i][2];
                $status = $sheetData[$i][3];

                    DB::table('otps')->insert(
                        array(
                        
                        'supplier_name' =>$supplier_name,
                        'telephone' => $telephone,
                        'email' => $email,
                        'otp_token' => $token,
                        'status' => $status,
                        )
                    );
                }
            }
        }

        return back()->with('success','Supplier details has been uploaded successfully');
    }

}
