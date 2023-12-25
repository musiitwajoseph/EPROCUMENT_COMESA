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
use App\Models\procurement;
use App\Models\procurement_approval;
use App\Models\procurement_approval_reason;
use App\Models\timeline;
use Session;
use PDF;
use Mail;
// use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Reader\Exception;
// use PhpOffice\PhpSpreadsheet\Writer\Xls;
// use PhpOffice\PhpSpreadsheet\IOFactory;
// use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

use RealRashid\SweetAlert\Facades\Alert;

use App\Imports\Procurementdata;
use Maatwebsite\Excel\Facades\Excel;

class ProcurementPlan extends Controller
{

    public function procuring()
    {

        $procurement_categories = DB::select('select * from master_datas where md_master_code_id = 53');

        $data = ['LoggedUserAdmin'=>Admin::where('id','=', session('LoggedAdmin'))->first()];


        return view('procurement.procuring',$data,compact('procurement_categories'));
    }

    public function disable_procurement()
    {

        $procurement_categories = DB::select('select * from master_datas where md_master_code_id = 53');

        $data = ['LoggedUserAdmin'=>Admin::where('id','=', session('LoggedAdmin'))->first()];


        return view('procurement.disable_procurement',$data,compact('procurement_categories'));
    }

    // public function upload_excel(Request $request){
      
    //     $request->validate([
    //         'file1' => 'required|mimes:xlsx'
    //     ]);

    //     $procurement_category = $request->category_id;

        // $the_file = $request->file('file1');

    
        // $spreadsheet = IOFactory::load($the_file->getRealPath());
        // $sheetData       = $spreadsheet->getActiveSheet()->toArray();

        //     if (!empty($sheetData)) {
        //         for ($i=1; $i<count($sheetData); $i++) {
        //             if($i>1){

                    
        //             $crt_no = $sheetData[$i][0];
        //             $desription_of_goods = $sheetData[$i][1];
        //             $category_of_procurement = $sheetData[$i][2];
        //             $qty = $sheetData[$i][3];
        //             $unit_of_measure  = $sheetData[$i][4];
        //             $Procurement_method = $sheetData[$i][5];
        //             $type_of_contract = $sheetData[$i][6];
        //             $allocated_amount = $sheetData[$i][7];
        //             $currency  = $sheetData[$i][8];
        //             $source_of_funding = $sheetData[$i][9];
        //             $procuring_unit = $sheetData[$i][10];
        //             $requisition_unit = $sheetData[$i][11];
        //             $end_user_requisition_date = $sheetData[$i][12];
        //             $technical_requirements_receipt_of_final_technical_requirements_date = $sheetData[$i][13];
        //             $technical_requirements_preparation_of_tender_document = $sheetData[$i][14];
        //             $publication_of_tender_documents_publication_date = $sheetData[$i][15];
        //             $publication_of_tender_documents_closing_date  = $sheetData[$i][16];
        //             $tender_openning = $sheetData[$i][17];
        //             $tender_evaluation_shortlisting_report_start_date = $sheetData[$i][18];
        //             $tender_evaluation_shortlisting_Report_end_date = $sheetData[$i][19];
        //             $short_list_notice_publication  = $sheetData[$i][20];
        //             $invitation_to_shortlisted_firms_to_submit_proposals_invitation_date = $sheetData[$i][21];
        //             $invitation_to_shortlisted_firms_to_submit_proposals_closing_date = $sheetData[$i][22];
        //             $evaluation_of_bids_under_shortlist_method_start_date = $sheetData[$i][23];
        //             $evaluation_of_bids_under_shortlist_method_end_date = $sheetData[$i][24];
        //             $purchase_contracts_committee_approval  = $sheetData[$i][25];
        //             $secretary_general_approval_of_pc_cc_reports_submission_date = $sheetData[$i][26];
        //             $secretary_general_approval_of_pc_cc_reports_approval_date = $sheetData[$i][27];
        //             $contract_vetting_submission_date = $sheetData[$i][28];
        //             $contract_vetting_approval_date  = $sheetData[$i][29];
        //             $contract_amount  = $sheetData[$i][30];
        //             $sg_asg_a_and_f_dhra_approval = $sheetData[$i][31];
        //             $contract_signing_date = $sheetData[$i][32];
        //             $contract_duration_date = $sheetData[$i][33];
        //             $contract_end_date  = $sheetData[$i][34];
               

    
        //             DB::table('procurement_plans')->insert(
        //                 array(
                          
        //                 'crt_no' =>$crt_no,
        //                 'description_of_goods_works_and_services' => $desription_of_goods,
        //                 'category_of_procurement' => $category_of_procurement,
        //                 'qty' => $qty,
        //                 'unit_of_measure'=>$unit_of_measure,
        //                 'Procurement_method'=>$Procurement_method,
        //                 'type_of_contract'=>$type_of_contract,
        //                 'allocated_amount'=>$allocated_amount,
        //                 'currency'=>$currency,
        //                 'source_of_funding'=>$source_of_funding,
        //                 'procuring_unit'=>$procuring_unit,
        //                 'requisition_unit'=>$requisition_unit,
        //                 'end_user_requisition_date'=>$end_user_requisition_date,
        //                 'technical_requirements_receipt_of_final_technical_requirements_date'=>$technical_requirements_receipt_of_final_technical_requirements_date,
        //                 'technical_requirements_preparation_of_tender_document'=>$technical_requirements_preparation_of_tender_document,
        //                 'publication_of_tender_documents_publication_date'=>$publication_of_tender_documents_publication_date,
        //                 'publication_of_tender_documents_closing_date'=>$publication_of_tender_documents_closing_date,
        //                 'tender_openning'=>$tender_openning,
        //                 'tender_evaluation_shortlisting_report_start_date'=>$tender_evaluation_shortlisting_report_start_date,
        //                 'tender_evaluation_shortlisting_Report_end_date'=>$tender_evaluation_shortlisting_Report_end_date,
        //                 'short_list_notice_publication' =>$short_list_notice_publication,
        //                 'invitation_to_shortlisted_firms_to_submit_proposals_invitation_date' => $invitation_to_shortlisted_firms_to_submit_proposals_invitation_date,
        //                 'invitation_to_shortlisted_firms_to_submit_proposals_closing_date' => $invitation_to_shortlisted_firms_to_submit_proposals_closing_date,
        //                 'evaluation_of_bids_under_shortlist_method_start_date' => $evaluation_of_bids_under_shortlist_method_start_date,
        //                 'evaluation_of_bids_under_shortlist_method_end_date'=>$evaluation_of_bids_under_shortlist_method_end_date,
        //                 'purchase_contracts_committee_approval'=>$purchase_contracts_committee_approval,
        //                 'secretary_general_approval_of_pc_cc_reports_submission_date'=>$secretary_general_approval_of_pc_cc_reports_submission_date,
        //                 'secretary_general_approval_of_pc_cc_reports_approval_date'=>$secretary_general_approval_of_pc_cc_reports_approval_date,
        //                 'contract_vetting_submission_date'=>$contract_vetting_submission_date,
        //                 'contract_vetting_approval_date'=>$contract_vetting_approval_date,
        //                 'contract_amount'=>$contract_amount,
        //                 'sg_asg_a_and_f_dhra_approval'=>$sg_asg_a_and_f_dhra_approval,
        //                 'contract_signing_date'=>$contract_signing_date,
        //                 'contract_duration_date'=>$contract_duration_date,
        //                 'category_id'=>$procurement_category,
        //                 )
        //            );
        //         }
        //     }
        // }
            // Alert::success('Success', 'New User right has been added');

            // return back()->with('success','Procurement plan has been upload successfully');
        // }


        public function upload_excel(Request $request){

                $request->validate([
                    'file1' => 'required|mimes:xlsx'
                ]);

                $file =  $request->file('file1');
                $import = new Procurementdata; 
                $importedData = Excel::toArray($import, $file);

                foreach ($importedData[0] as $row) {

                    $uniqueIdentifier = $row[11]; 
                    $requistion_division  = DB::table('master_datas')->where('md_name', $uniqueIdentifier)->value('md_id');
                   
                    if ($requistion_division != null) {
                        continue;
                    }
                    else{
                        Alert::error('Error', 'Procurement plan has been not been uploaded successfully');
                        return back()->with('fail','Unknown requistion division');
                    }
                }


                foreach ($importedData[0] as $row) {

                    $unique_identifier = $row[6]; 
                    $unqiue_contract_type  = DB::table('master_datas')->where('md_name', $unique_identifier)->value('md_id');

                    if ($unqiue_contract_type != null) {
                        continue;
                    }
                    else{
                        Alert::error('Error', 'Procurement plan has not been uploaded successfully');
                        return back()->with('fail','Invalid Contract type');
                    }
                }

                foreach ($importedData[0] as $row) {

                    $unique_identifier = $row[8]; 
                    $unqiue_contract_type  = DB::table('master_datas')->where('md_name', $unique_identifier)->value('md_id');

                    if ($unqiue_contract_type != null) {
                        continue;
                    }
                    else{
                        Alert::error('Error', 'Procurement plan has not been uploaded successfully');
                        return back()->with('fail','Invalid Currency type');
                    }
                }

                
                foreach ($importedData[0] as $row) {

                    $unique_identifier = $row[48]; 

                    if ($unique_identifier != null) {
                        continue;
                    }
                    else{
                        Alert::error('Error', 'Procurement plan has not been uploaded successfully');
                        return back()->with('fail','Year of procurement plan is missing');
                    }
                
                }



                Excel::import(new Procurementdata, $request->file('file1'));

                $distinctValues = procurement::distinct()->pluck('requisition_division');

                $values = master_data::where('md_master_code_id', 53)->get();

                foreach ($distinctValues as $item) {
                    foreach ($values as $value) {
                        if($item == $value->md_id)
                        {
                            $post = new procurement_approval;

                            $post->All_sections = $value->md_name;
                            $post->HOP = 'Pending';
                            $post->director_hr = 'Pending';
                            $post->ASG_Finance = 'Pending';
                            $post->SG = 'Pending';      
                            $post->save();

                        }
                    }
                }


                $officer_email = "headofprocurement@gmail.com";
                $firstname = "Klunzate";
                $lastname  = "Timportz";
                $status  = $request->choice;
                $recommendations = $request->recommendation_proc_officer;

        
                $data = [
                    'email'      => $officer_email,
                    'username'   => $firstname ." ". $lastname,   
                    'recommendations'=> $recommendations,
                    'status'     => $status,
                    'title'      => 'COMESA:E-PROCUREMENT - Procurement Plan Uploaded and Awaiting Approval.',
                ];
        
        
                $pdf_data = PDF::loadView('emails.approval_upload_procurement', $data); 
        
                Mail::send('emails.approval_upload_procurement', $data, function ($message) use ($data, $pdf_data) {
                    $message->to($data["email"], $data["email"] )
                        ->subject($data["title"]);
                });
        

                Alert::success('Success', 'Procurement plan has been uploaded successfully');


                return back();

        }   


    public function procurement_records(){

        $data = ['LoggedUserAdmin'=>Admin::where('id','=', session('LoggedAdmin'))->first()];
        

        $procurement = procurement::all();
        return view('procurement.ProcurementRecords',$data,compact('procurement'));
    }   

    // Master data 

    public function master_table(){

        $mc_code = DB::select('select * from master_codes,master_datas where master_codes.id = md_master_code_id');

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

    public function timelines(){

        $db_timeline = 10056;
        $timelines = DB::table('master_datas')->where('md_master_code_id',$db_timeline)->get();

        $data = ['LoggedUserAdmin'=>Admin::where('id','=', session('LoggedAdmin'))->first()];

        return view('procurement.timelines',$data,compact('timelines'));
    }

    public function store_timelines(Request $request){

        $post = new timeline;

         $post->end_user_requisition_date = $request->input('1');
         $post->receipt_of_final_technical_requirements = $request->input('2');
         $post->preperation_of_tender_document_rfp_or_rfq = $request->input('3');
         $post->tender_publication_date = $request->input('4');
         $post->tender_closing_date = $request->input('5');
         $post->tender_opening_date = $request->input('6');
         $post->tender_evaluation_start_date = $request->input('7');
         $post->tender_evaluation_enddate = $request->input('8');
         $post->shortlist_notice_publication_date = $request->input('9');
         $post->invitation_of_shortlisted_candidate_date = $request->input('10');
         $post->invitation_of_shortlisted_candidate_closing_date = $request->input('11');
         $post->evaluation_of_bids_under_shortlist_method_start_date = $request->input('12'); 
         $post->evaluation_of_bids_under_shortlist_method_end_date = $request->input('3');
         $post->purchase_contracts_committe_approval_date = $request->input('4');
         $post->evaluation_report_submission_date_to_sg = $request->input('15');
         $post->evaluation_report_approval_date_by_sg = $request->input('16');
         $post->contract_vetting_submission_date = $request->input('17');
         $post->contract_vetting_approval_date = $request->input('18');
         $post->contract_amount = $request->input('19');
         $post->contract_signing_date = $request->input('20'); 
         $post->sg_asg_a_and_f_dhra_contract_approval_date = $request->input('21'); 
         $post->contract_end_date = $request->input('22'); 

         $save = $post->save();

         if($save){
            Alert::success('Success', 'Timeline information has been added successfully');
         }
        
         return redirect('display-timelines');  
    }

    public function display_timeline()
    {
        $db_timeline = 10056;

        $data = ['LoggedUserAdmin'=>Admin::where('id','=', session('LoggedAdmin'))->first()];

        $timelines_heading = DB::table('master_datas')->select('md_name')->where('md_master_code_id',$db_timeline)->get();
        $time_data = timeline::find(1);

        return view('procurement.display_timeline',$data,compact('time_data','timelines_heading'));
    }

    public function assign_officer(){

        $data = ['LoggedUserAdmin'=>Admin::where('id','=', session('LoggedAdmin'))->first()];

        $approval_officer = DB::table('admins')->where('user_role',"Approval Officer")->get();
        $assigned_approval_officer = DB::table('admins')
                                ->where('user_status','Assigned')
                                ->where('procurement_approval_status','null')->get();

        return view('procurement.assign_officer',$data,compact('approval_officer','assigned_approval_officer'));

    }

    public function store_assign_officer(Request $request){

        $user_id = $request->assigned;  

        $officer_email = DB::table('admins')->where('id',$user_id)->value('email');
        $username = DB::table('admins')->where('id',$user_id)->value('username');

        $data = [
            'email'      => $officer_email,
            'username'   => $username,   
            'title'      => 'COMESA:E-PROCUREMENT - Verification of Supplier Submitted Information',
        ];


        $pdf_data = PDF::loadView('emails.procurement_officer', $data); 

        Mail::send('emails.procurement_officer', $data, function ($message) use ($data, $pdf_data) {
            $message->to($data["email"], $data["email"] )
                ->subject($data["title"]);
        });


        DB::table('admins')
        ->where('id',$user_id)
        ->update(['user_status' => "Assigned"]);

        Alert::success('Success', 'Approver Officer has been Assigned');

        return back();
    }

    public function checkapprovalofficer($id)
    {
        return response()->json([
            "status"=>TRUE,
            "message"=>"Invalid OTP being entered",
        ]);
    }


    public function fully_cancel(Request $request){

        $user_id = $request->id_hidden;

        $supplier_reference = DB::table('supplier_registration_details_models')->where('id',$user_id)->value('supplier_reference_form_no');
        $supplier_email = DB::table('supplier_logins')->where('supplier_reference',$supplier_reference)->value('email');
        $username = DB::table('supplier_logins')->where('supplier_reference',$supplier_reference)->value('username');


        $data = [
            'email'      => $supplier_email,
            'username'   => $username,   
            'title'      => 'COMESA:E-PROCUREMENT -  Rejection of Supplier Application for COMESA E-Procurement System',
        ];

        $pdf_data = PDF::loadView('emails.supplier_rejection_approval', $data); 

        Mail::send('emails.supplier_rejection_approval', $data, function ($message) use ($data, $pdf_data) {
            $message->to($data["email"], $data["email"] )
                ->subject($data["title"]);
        });

        DB::table('supplier_registration_details_models')
        ->where('id',$user_id)
        ->update(['approval_status' => "Cancelled",
        'fully' => "fully",]);

        return response()->json([
            "status"=>TRUE,
            "message"=>"Supplier has been Cancelled",
        ]);
    }


    public function fully_approve(Request $request){

        $user_id = $request->id_hidden;
        
        $supplier_reference = DB::table('supplier_registration_details_models')->where('id',$user_id)->value('supplier_reference_form_no');
        $supplier_email = DB::table('supplier_logins')->where('supplier_reference',$supplier_reference)->value('email');
        $username = DB::table('supplier_logins')->where('supplier_reference',$supplier_reference)->value('username');


        $data = [
            'email'      => $supplier_email,
            'username'   => $username,   
            'title'      => 'COMESA:E-PROCUREMENT -  Successful Approval of Supplier Registration in COMESA E-Procurement System',
        ];

        $pdf_data = PDF::loadView('emails.supplier_successfully_approval', $data); 

        Mail::send('emails.supplier_successfully_approval', $data, function ($message) use ($data, $pdf_data) {
            $message->to($data["email"], $data["email"] )
                ->subject($data["title"]);
        });

        DB::table('supplier_registration_details_models')
                        ->where('id',$user_id)
                        ->update(['approval_status' => "Approved",
                        'fully' => "fully",]);


        return response()->json([
            "status"=>TRUE,
            "message"=>"Supplier has been Approved",
        ]);
    }

    public function accomplish_task(Request $request){

        $procurement_officer_id = $request->hidden_id;

        $user_role = "	Head of Procurement";
        $user_email = DB::table('admins')->where('user_role',$user_role)->value('email');
        $username = DB::table('admins')->where('user_role',$user_role)->value('username');

        $data = [
            'email'      => $user_email,
            'username'   => $username,   
            'title'      => 'COMESA:E-PROCUREMENT - Accomplishment of Supplier verification Submitted Details',
        ];


        // $pdf_data = PDF::loadView('emails.accomplishment_of_supplier_verification', $data); 

        // Mail::send('emails.accomplishment_of_supplier_verification', $data, function ($message) use ($data, $pdf_data) {
        //     $message->to($data["email"], $data["email"] )
        //         ->subject($data["title"]);
        // });


        DB::table('admins')
                    ->where('id',$procurement_officer_id)
                    ->update(['user_status' => "null"]);


        return response()->json([
            "status"=>TRUE,
            "message"=>"Head of Procurement has recieved your message",
        ]);

    }

    // PROCUREMENT PLAN WORKFLOW

    public function procurement_assign_view()
    {
        
        $data = ['LoggedUserAdmin'=>Admin::where('id','=', session('LoggedAdmin'))->first()];
        $approval_officer = DB::table('admins')->where('user_role',"Approval Officer")->get();

        return view ('procurement.procurement_assign_officer',$data , compact('approval_officer'));
    }

    public function assign_procurement_officer(Request $request)
    {
        
        $user_id = $request->assigned;  

        $officer_email = DB::table('admins')->where('id',$user_id)->value('email');
        $username = DB::table('admins')->where('id',$user_id)->value('username');
        $firstname = DB::table('admins')->where('id',$user_id)->value('firstname');
        $lastname = DB::table('admins')->where('id',$user_id)->value('lastname');

        $data = [
            'email'      => $officer_email,
            'username'   => $firstname ." ". $lastname,   
            'title'      => 'COMESA:E-PROCUREMENT - Uploading of Procurement Plan',
        ];


        $pdf_data = PDF::loadView('emails.upload_procurement_plan', $data); 

        Mail::send('emails.upload_procurement_plan', $data, function ($message) use ($data, $pdf_data) {
            $message->to($data["email"], $data["email"] )
                ->subject($data["title"]);
        });


        DB::table('admins')
        ->where('id',$user_id)
        ->update(['procurement_approval_status' => "Assigned"]);

        Alert::success('Success', 'Procurement Approval Officer has been assigned and notified');

        return back();

    }

    public function approve_procurement()
    {

        $data = ['LoggedUserAdmin'=>Admin::where('id','=', session('LoggedAdmin'))->first()];

        $values = procurement_approval::all();
        $approval_reasons = procurement_approval_reason::all();
        
        return view('procurement.approve_procurement',$data , compact(['values','approval_reasons']));
    }

    public function Head_of_procurement_approval_pp(Request $request){

        $choice = $request->choice;  

        if($choice == "Reject"){

            $unit_email = "unit_HOP_email@gmail.com";
    
            $data = [
                'email'      => $unit_email,
                'username'   => $firstname ." ". $lastname,   
                'title'      => 'COMESA:E-PROCUREMENT - Uploading Reject for Procurement Plan',
            ];
    
    
            $pdf_data = PDF::loadView('emails.upload_procurement_plan', $data); 
    
            Mail::send('emails.upload_procurement_plan', $data, function ($message) use ($data, $pdf_data) {
                $message->to($data["email"], $data["email"] )
                    ->subject($data["title"]);
            });
        }
        else
        {

            $HOP = "HOP@gmail.com";
    
            $data = [
                'email'      => $HOP,
                'username'   => $firstname ." ". $lastname,   
                'title'      => 'COMESA:E-PROCUREMENT - Uploading of Procurement Plan',
            ];
    
            $pdf_data = PDF::loadView('emails.upload_procurement_plan', $data); 
    
            Mail::send('emails.upload_procurement_plan', $data, function ($message) use ($data, $pdf_data) {
                $message->to($data["email"], $data["email"] )
                    ->subject($data["title"]);
            });

        }

        return response()->json([
            "status"=>TRUE,
            "message"=>$choice,
        ]);
    }

    public function dummy()
    {

        $data = ['LoggedUserAdmin'=>Admin::where('id','=', session('LoggedAdmin'))->first()]; 

        return view('dummy',$data , compact(['values']));
    }

    public function approve_procurement_records(Request $request)
    {

        $user_role = $request->user_role;
        $user_id  = $request->user_id;
        $user_role = $request->user_role;
        $reason = $request->reason;


        $firstname = DB::table('admins')->where('id',$user_id)->value('firstname');
        $lastname = DB::table('admins')->where('id',$user_id)->value('lastname');

        $distinctValues = procurement_approval::distinct()->pluck('All_sections');

        // Approving Logic

        if($user_role == 'Head of Procurement')
        {
            foreach ($distinctValues as $value) {

                procurement_approval::where('All_sections', $value)
                            ->update([
                                'HOP' => 'Approved',
                            ]);
            }

            // inserting reason in the db.

            $count_data =  DB::table('procurement_approval_reasons')->where('role', 'HOP')->count();

            if($count_data > 0)
            {
                DB::table('procurement_approval_reasons')->where('role', 'HOP')->update(['reason' => $reason]);
            }
            else
            {
                procurement_approval_reason::updateOrCreate(
                    ['name' => $firstname.$lastname, 'role' => 'HOP'],
                    ['reason' => $reason]
                ); 
            }
            

            $director_email = "directorprocurement@gmail.com";
        
            $data = [
                'email'      => $director_email,
                'username'   => $firstname ." ". $lastname,   
                'title'      => 'COMESA:E-PROCUREMENT - Procurement Plan Approval.',
            ];
    
    
            $pdf_data = PDF::loadView('emails.procurement_approvals.approval_email', $data); 
    
            Mail::send('emails.procurement_approvals.approval_email', $data, function ($message) use ($data, $pdf_data) {
                $message->to($data["email"], $data["email"] )
                    ->subject($data["title"]);
            });

        }

        
        if($user_role == 'Director HR')
        {
           
            foreach ($distinctValues as $value)
            {
                procurement_approval::where('All_sections', $value)
                            ->update([
                                'director_hr' => 'Approved',
                            ]);
            }

              $count_data =  DB::table('procurement_approval_reasons')->where('role', 'director_hr')->count();

              if($count_data > 0)
              {
                  DB::table('procurement_approval_reasons')->where('role', 'director_hr')->update(['reason' => $reason]);
              }
              else
              {
                  procurement_approval_reason::updateOrCreate(
                      ['name' => $firstname.$lastname, 'role' => 'director_hr'],
                      ['reason' => $reason]
                  ); 
              }

            $ASG_Finance = "ASG_finance@gmail.com";
        
                $data = [
                    'email'      => $ASG_Finance,
                    'username'   => $firstname ." ". $lastname,   
                    'title'      => 'COMESA:E-PROCUREMENT - Procurement Plan Approval.',
                ];
        
        
                $pdf_data = PDF::loadView('emails.procurement_approvals.approval_email', $data); 
        
                Mail::send('emails.procurement_approvals.approval_email', $data, function ($message) use ($data, $pdf_data) {
                    $message->to($data["email"], $data["email"] )
                        ->subject($data["title"]);
                });
        }


        if($user_role == 'ASG Finance')
        {
           
            foreach ($distinctValues as $value)
            {
                procurement_approval::where('All_sections', $value)
                            ->update([
                                'ASG_Finance' => 'Approved',
                            ]);
            }

            $count_data =  DB::table('procurement_approval_reasons')->where('role', 'ASG_Finance')->count();

            if($count_data > 0)
            {
                DB::table('procurement_approval_reasons')->where('role', 'ASG_Finance')->update(['reason' => $reason]);
            }
            else
            {
                procurement_approval_reason::updateOrCreate(
                    ['name' => $firstname.$lastname, 'role' => 'ASG_Finance'],
                    ['reason' => $reason]
                ); 
            }

            $SG = "SG@gmail.com";
        
            $data = [
                'email'      => $SG,
                'username'   => $firstname ." ". $lastname,   
                'title'      => 'COMESA:E-PROCUREMENT - Procurement Plan Approval.',
            ];
    
    
            $pdf_data = PDF::loadView('emails.procurement_approvals.approval_email', $data); 
    
            Mail::send('emails.procurement_approvals.approval_email', $data, function ($message) use ($data, $pdf_data) {
                $message->to($data["email"], $data["email"] )
                    ->subject($data["title"]);
            });
        }


        if($user_role == 'SG')
        {
           
            foreach ($distinctValues as $value)
            {
                procurement_approval::where('All_sections', $value)
                            ->update([
                                'SG' => 'Approved',
                            ]);
            }

            $count_data =  DB::table('procurement_approval_reasons')->where('role', 'SG')->count();

            if($count_data > 0)
            {
                DB::table('procurement_approval_reasons')->where('role', 'SG')->update(['reason' => $reason]);
            }
            else
            {
                procurement_approval_reason::updateOrCreate(
                    ['name' => $firstname.$lastname, 'role' => 'SG'],
                    ['reason' => $reason]
                ); 
            }
        }

        return response()->json([
            "status"=>TRUE,
            "message"=>"Procurement plan has been approved successfully",
        ]);
    }

    // Rejecting logic 

    public function reject_procurement_records(Request $request)
    {

        $user_role = $request->user_role;
        $user_id  = $request->user_id;
        $user_role = $request->user_role;
        $reason = $request->reason;

        
        $firstname = DB::table('admins')->where('id',$user_id)->value('firstname');
        $lastname = DB::table('admins')->where('id',$user_id)->value('lastname');
        
        $distinctValues = procurement_approval::distinct()->pluck('All_sections');
          

        if($user_role == 'Head of Procurement')
        {
            foreach ($distinctValues as $value) {

                procurement_approval::where('All_sections', $value)
                            ->update([
                                'HOP' => 'Rejected',
                            ]);
            }

            $count_data =  DB::table('procurement_approval_reasons')->where('role', 'HOP')->count();

            if($count_data > 0)
            {
                DB::table('procurement_approval_reasons')->where('role', 'HOP')->update(['reason' => $reason]);
            }
            else
            {
                procurement_approval_reason::updateOrCreate(
                    ['name' => $firstname.$lastname, 'role' => 'HOP'],
                    ['reason' => $reason]
                ); 
            }

            $unit_divsion = "unit_divsion@gmail.com";
        
            $data = [
                'email'      => $unit_divsion,
                'reason'     => $reason,
                'username'   => $firstname ." ". $lastname,   
                'title'      => 'COMESA:E-PROCUREMENT - Procurement Plan Rejection.',
            ];
    
    
            $pdf_data = PDF::loadView('emails.procurement_approvals.reject_email', $data); 
    
            Mail::send('emails.procurement_approvals.reject_email', $data, function ($message) use ($data, $pdf_data) {
                $message->to($data["email"], $data["email"] )
                    ->subject($data["title"]);
            });
        }

        
        if($user_role == 'Director HR')
        {
           
            foreach ($distinctValues as $value)
            {
                procurement_approval::where('All_sections', $value)
                            ->update([
                                'director_hr' => 'Rejected',
                            ]);
            }

            $count_data =  DB::table('procurement_approval_reasons')->where('role', 'director_hr')->count();

              if($count_data > 0)
              {
                  DB::table('procurement_approval_reasons')->where('role', 'director_hr')->update(['reason' => $reason]);
              }
              else
              {
                  procurement_approval_reason::updateOrCreate(
                      ['name' => $firstname.$lastname, 'role' => 'director_hr'],
                      ['reason' => $reason]
                  ); 
              }

            $unit_divsion = "unit_divsion@gmail.com";
        
            $data = [
                'email'      => $unit_divsion,
                'reason'     => $reason,
                'username'   => $firstname ." ". $lastname,   
                'title'      => 'COMESA:E-PROCUREMENT - Procurement Plan Rejection.',
            ];
    
    
            $pdf_data = PDF::loadView('emails.procurement_approvals.reject_email', $data); 
    
            Mail::send('emails.procurement_approvals.reject_email', $data, function ($message) use ($data, $pdf_data) {
                $message->to($data["email"], $data["email"] )
                    ->subject($data["title"]);
        });

        
        $unit_divsion = "HOP@gmail.com";
        
        $data = [
            'email'      => $unit_divsion,
            'reason'     => $reason,
            'username'   => $firstname ." ". $lastname,   
            'title'      => 'COMESA:E-PROCUREMENT - Procurement Plan Rejection.',
        ];


        $pdf_data = PDF::loadView('emails.procurement_approvals.reject_email', $data); 

        Mail::send('emails.procurement_approvals.reject_email', $data, function ($message) use ($data, $pdf_data) {
            $message->to($data["email"], $data["email"] )
                ->subject($data["title"]);
    });
        
    }


        if($user_role == 'ASG Finance')
        {
           
            foreach ($distinctValues as $value)
            {
                procurement_approval::where('All_sections', $value)
                            ->update([
                                'ASG_Finance' => 'Rejected',
                            ]);

            }

            $count_data =  DB::table('procurement_approval_reasons')->where('role', 'ASG_Finance')->count();

            if($count_data > 0)
            {
                DB::table('procurement_approval_reasons')->where('role', 'ASG_Finance')->update(['reason' => $reason]);
            }
            else
            {
                procurement_approval_reason::updateOrCreate(
                    ['name' => $firstname.$lastname, 'role' => 'ASG_Finance'],
                    ['reason' => $reason]
                ); 
            }


            $unit_divsion = "unit_divsion@gmail.com";
        
                            $data = [
                                'email'      => $unit_divsion,
                                'reason'     => $reason,
                                'username'   => $firstname ." ". $lastname,   
                                'title'      => 'COMESA:E-PROCUREMENT - Procurement Plan Rejection.',
                            ];
                    
                    
                            $pdf_data = PDF::loadView('emails.procurement_approvals.reject_email', $data); 
                    
                            Mail::send('emails.procurement_approvals.reject_email', $data, function ($message) use ($data, $pdf_data) {
                                $message->to($data["email"], $data["email"] )
                                    ->subject($data["title"]);
                        });


                        $unit_divsion = "HOP@gmail.com";
        
                            $data = [
                                'email'      => $unit_divsion,
                                'reason'     => $reason,
                                'username'   => $firstname ." ". $lastname,   
                                'title'      => 'COMESA:E-PROCUREMENT - Procurement Plan Rejection.',
                            ];
                    
                    
                            $pdf_data = PDF::loadView('emails.procurement_approvals.reject_email', $data); 
                    
                            Mail::send('emails.procurement_approvals.reject_email', $data, function ($message) use ($data, $pdf_data) {
                                $message->to($data["email"], $data["email"] )
                                    ->subject($data["title"]);
                        });


                        $unit_divsion = "directorprocurement@gmail.com";
        
                            $data = [
                                'email'      => $unit_divsion,
                                'reason'     => $reason,
                                'username'   => $firstname ." ". $lastname,   
                                'title'      => 'COMESA:E-PROCUREMENT - Procurement Plan Rejection.',
                            ];
                    
                    
                            $pdf_data = PDF::loadView('emails.procurement_approvals.reject_email', $data); 
                    
                            Mail::send('emails.procurement_approvals.reject_email', $data, function ($message) use ($data, $pdf_data) {
                                $message->to($data["email"], $data["email"] )
                                    ->subject($data["title"]);
                        });
        }


        if($user_role == 'SG')
        {
           
            foreach ($distinctValues as $value)
            {
                procurement_approval::where('All_sections', $value)
                            ->update([
                                'SG' => 'Rejected',
                            ]);
            }

            $count_data =  DB::table('procurement_approval_reasons')->where('role', 'SG')->count();

            if($count_data > 0)
            {
                DB::table('procurement_approval_reasons')->where('role', 'SG')->update(['reason' => $reason]);
            }
            else
            {
                procurement_approval_reason::updateOrCreate(
                    ['name' => $firstname.$lastname, 'role' => 'SG'],
                    ['reason' => $reason]
                ); 
            }

            $unit_divsion = "unit_divsion@gmail.com";
        
                            $data = [
                                'email'      => $unit_divsion,
                                'reason'     => $reason,
                                'username'   => $firstname ." ". $lastname,   
                                'title'      => 'COMESA:E-PROCUREMENT - Procurement Plan Rejection.',
                            ];
                    
                    
                            $pdf_data = PDF::loadView('emails.procurement_approvals.reject_email', $data); 
                    
                            Mail::send('emails.procurement_approvals.reject_email', $data, function ($message) use ($data, $pdf_data) {
                                $message->to($data["email"], $data["email"] )
                                    ->subject($data["title"]);
                        });     


                        $unit_divsion = "HOP@gmail.com";
        
                            $data = [
                                'email'      => $unit_divsion,
                                'reason'     => $reason,
                                'username'   => $firstname ." ". $lastname,   
                                'title'      => 'COMESA:E-PROCUREMENT - Procurement Plan Rejection.',
                            ];
                    
                    
                            $pdf_data = PDF::loadView('emails.procurement_approvals.reject_email', $data); 
                    
                            Mail::send('emails.procurement_approvals.reject_email', $data, function ($message) use ($data, $pdf_data) {
                                $message->to($data["email"], $data["email"] )
                                    ->subject($data["title"]);
                        });


                        $unit_divsion = "directorprocurement@gmail.com";
        
                            $data = [
                                'email'      => $unit_divsion,
                                'reason'     => $reason,
                                'username'   => $firstname ." ". $lastname,   
                                'title'      => 'COMESA:E-PROCUREMENT - Procurement Plan Rejection.',
                            ];
                    
                    
                            $pdf_data = PDF::loadView('emails.procurement_approvals.reject_email', $data); 
                    
                            Mail::send('emails.procurement_approvals.reject_email', $data, function ($message) use ($data, $pdf_data) {
                                $message->to($data["email"], $data["email"] )
                                    ->subject($data["title"]);
                        });


                        $unit_divsion = "ASG_finance@gmail.com";
        
                        $data = [
                            'email'      => $unit_divsion,
                            'reason'     => $reason,
                            'username'   => $firstname ." ". $lastname,   
                            'title'      => 'COMESA:E-PROCUREMENT - Procurement Plan Rejection.',
                        ];
                
                
                        $pdf_data = PDF::loadView('emails.procurement_approvals.reject_email', $data); 
                
                        Mail::send('emails.procurement_approvals.reject_email', $data, function ($message) use ($data, $pdf_data) {
                            $message->to($data["email"], $data["email"] )
                                ->subject($data["title"]);
                    });
        }

        return response()->json([
            "status"=>TRUE,
            "message"=>"Rejecting has been done successfully",
        ]);
    }


    public function hide(Request $request)
    {

        $user_role = $request->user_role;

        if($user_role == 'Head of Procurement')
        {
            $approval_status  = DB::table('procurement_approvals')->where('id', 1)->value('HOP');

            if($approval_status == "Approved")
            {
                $status = "Approved";
            }
            else if($approval_status == "Rejected")
            {
                $status = "Rejected";

            }
            else
            {
                $status = "Pending";

            }

            return response()->json([
                "status"=> TRUE,
                "status_approval"=> $status,
            ]);

        }

        else if($user_role == 'Director HR')
        {
            $approval_status  = DB::table('procurement_approvals')->where('id', 1)->value('director_hr');
            
            if($approval_status == "Approved")
            {
                $status = "Approved";
            }
            else if($approval_status == "Rejected")
            {
                $status = "Rejected";

            }
            else
            {
                $status = "Pending";

            }

            return response()->json([
                "status"=> TRUE,
                "status_approval"=> $status,
            ]);

        }

        else if($user_role == 'ASG Finance')
        {
           
            $approval_status  = DB::table('procurement_approvals')->where('id', 1)->value('ASG_Finance');
            
            if($approval_status == "Approved")
            {
                $status = "Approved";
            }
            else if($approval_status == "Rejected")
            {
                $status = "Rejected";

            }
            else
            {
                $status = "Pending";

            }

            return response()->json([
                "status"=> TRUE,
                "status_approval"=> $status,
            ]);

        }

        else if($user_role == 'SG')
        {
           
            $approval_status  = DB::table('procurement_approvals')->where('id', 1)->value('SG');
            
            if($approval_status == "Approved")
            {
                $status = "Approved";
            }
            else if($approval_status == "Rejected")
            {
                $status = "Rejected";

            }
            else
            {
                $status = "Pending";

            }

            return response()->json([
                "status"=> TRUE,
                "status_approval"=> $status,
            ]);

        }
    }


    public function search_status(Request $request)
    {
        $data = $request->user_role;
                
        if($data == 'SG')
        {
            $approval_status  = DB::table('procurement_approvals')->where('id', 1)->value('ASG_Finance');    
        
                return response()->json([
                    "status"=>TRUE,
                    "approval_status"=>$approval_status,
                ]);
            
        }


        
        if($data == 'ASG Finance')
        {
            $approval_status  = DB::table('procurement_approvals')->where('id', 1)->value('director_hr');    
            
                return response()->json([
                    "status"=>TRUE,
                    "approval_status"=>$approval_status,
                ]);   
        }


        if($data == 'Director HR')
        {
            $approval_status  = DB::table('procurement_approvals')->where('id', 1)->value('HOP');    

                return response()->json([
                    "status"=>TRUE,
                    "approval_status"=>$approval_status,
                ]);
            
        }


    }
}
