<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\otp;
use App\Models\Document;
use App\Models\Procurement_plan;
use Mail;
use App\Mail\SupplierMail;
use App\Models\SupplierRegistrationDetailsModel;
use DB;
use Carbon;
use PDF;
use Illuminate\Support\Facades\Hash;
use App\Models\SupplierLogin;
use App\Models\Admin;
use Validator;


use App\Imports\ProcurementImport;


use App\Imports\LegitImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;



class COMESA_CONTROLLER extends Controller
{
    

    public function supplierRegistration(){

        //getting country list
        $countrylist = DB::select('select Name,PhoneCode from Countries');

        //getting categories
        $categories = DB::table("master_datas")
        ->select('md_id','md_name')
        ->where('md_master_code_id',3)
        ->whereNotNull('md_description')
        ->where('md_description','!=','')
        ->get();

        //getting business types
        $Type_of_Business = DB::table("master_datas")
        ->select('md_id','md_name')
        ->where('md_master_code_id',6)
        ->get();

        //getting business types
        $Documents = DB::table("master_datas")
        ->select('md_id','md_name')
        ->where('md_master_code_id',1032)
        ->get();

        // $data = SupplierRegistrationDetailsModel::all();

        return view('portal.supplier.supplier-registration',compact(['countrylist','categories','Type_of_Business','Documents']));
    }

    

    public function generateOTP(Request $request){
    
        
        $validation = Validator::make($request->all(), [
            'captcha_code'=>'required|captcha',
        ]);


        if ($validation->fails()) {
            return response()->json([
                "invalid_captcha"=>"Invalid captcha code !",
            ]);
        } 

        else
        
        {
        

        $input = $request->all();
        $email = $input['email'];

         $email_status = DB::table('otps')->where('email', $email)->orderBy('id', 'desc')->value('status');
         $saved_user_email = DB::table('supplier_logins')->where('email', $email)->orderBy('id', 'desc')->value('id');
        

         if($saved_user_email != null){

            return response()->json([
                "status" => True,
                "Acceptance"=>"Done",
            ]);  
         }


         if($email_status == 'verified'){

            return response()->json([
                "status" => True,
                "message" => "Email has been already verified",
                "verification"=>"Done",
                "email_verified_already"=>$email,
            ]);  
        }

    
         $number = rand(10000, 99999);
         $email = $input['email'];
         $username = $input['username'];

          $post = new otp;

          $post->supplier_name = $username;
          $post->telephone = $input['telephone'];
          $post->email = $email;
          $post->otp_token = $number;     
         
          $save = $post->save();     

          $supplier_email = $this->supplierOTP($number, $email,$username);
          
          $time = strtotime(date("h:i:sa"));

		  $endTime = date("H:i", strtotime('+15 minutes', $time));
                        				

        return response()->json([
            "status" => True,
            "message" => "OTP sent to email: $email",
            "original_email"=>$email,
            "expiryTime"=>"Your OTP verifyication expires in 15 mins from now at : " . $endTime ,
        ]);
    }
}

    public function fetch_email(Request $request){

        $input = $request->all();

        $email_form = $input['email'];
        $entered_otp = $input['otp_token'];

          //Subtraction from different timestamps
          $mytime = Carbon\Carbon::now();


           $email_status = DB::table('otps')->where('email', $email_form)->orderBy('id', 'desc')->value('updated_at');
           
           $diffInMinutes_created_at = $mytime->diffInMinutes($email_status);

        
          if($diffInMinutes_created_at >= 15 ){
            return response()->json([
                "status" => FALSE,
                "message" => "The Otp token has been expired request for a new one",
            ]);
        }


          //Checking Email Status in the Database "Verified or Not"
          $email_already_verified = $user = DB::table('otps')->where('status', "verified")->where('email', $email_form)->value('status');

           if($email_already_verified=="verified")
           {
                return response()->json([
                    "status" => TRUE,
                    "message" => "This email has already been Verified, Login into the Supplier Portal",
                    "AlreadyDone"
                ]);
           }


        //Checking for the Token in the database
         $token_database = $user = DB::table('otps')->where('email', $email_form)->where('otp_token', $entered_otp)->value('otp_token');

       if($token_database){

        DB::table('otps')->where('email',$email_form)->update(array( 'status'=>"verified",));
           
        return response()->json([
            "status" => TRUE,
            "message" => "Email Address Verified",
        ]);
       }


       else if($entered_otp == ''){

        return response()->json([
            "status" => FALSE,
            "message" => "Enter Token before clicking submit",
        ]);

       }
       else if(strlen($entered_otp)< 5 ){
        return response()->json([
            "status" => FALSE,
            "message" => "The entered token is too short",
        ]);
       }
       else if(strlen($entered_otp)> 5 ){
        return response()->json([
            "status" => FALSE,
            "message" => "The entered Token is too long.",
        ]);
       }
      
       else{
            return response()->json([
                "status" => FALSE,
                "message" => "Invalid Token",
            ]);
       }
        
    }

    public function regenerate(Request $request){

        $input = $request->all();

        $email = $input['email'];
        $new_otp = rand(10000, 99999);

        $not_verified_user = $user = DB::table('otps')->where('status', "valid")->get();

        if(! $not_verified_user){
            return "Email Address already has been verified";
        }
        else{

            DB::table('otps')->where('email', $email) ->update(['otp_token' => $new_otp]);
            
            $username  = $user = DB::table('otps')->where('email', $email)->value('supplier_name');

            $otp = $new_otp;

            $data = [
                'subject'=>'REGENERATED OTP',
                'body'=>'Entered the provided OTP to verify Supplier Account',
                'otp'=> $otp,
                'username' => $username,
            ];
    
            try {
                Mail::to($email)->send(new SupplierMail($data));

                return response()->json([
                    "status" => True,
                    "message" => "New OTP has been sent",
                ]);
                
            } catch (Exception $th) {                
                return response()->json([
                    "status" => False,
                    "message" => "Error",
                ]);
            }
            
        }
    }



    public function supplierOTP($otp, $to,$username){
        $data = [
            'subject'=>'SUPPLIER OTP',
            'body'=>'TEST',
            'otp'=> $otp,
            'username' => $username,
        ];

        try {
            Mail::to($to)->send(new SupplierMail($data));

            return "OTP has been sent";
        } catch (Exception $th) {
            return "error";
        }
    }


    // Supplier Registration Master Function

    public function SupplierRegistrationDetails(Request $request)
    {

        //getting business types
        $Documents = DB::table("master_datas")
        ->select('md_name')
        ->where('md_master_code_id',1032)
        ->get();

        
        $doc_list = array();
        foreach($Documents as $doc){
            $doc_list[] = $doc->md_name;
        }

        $validator = $request->validate([

            'country'=>'required',
            'Category'=>'required',
            'SubCategory'=>'required',
            'Type_of_Business'=>'required',
            'Nature_of_Business'=>'required',
            'BusinessName'=>'required',
            'Certificate_of_Registration'=>'required',
            'Tax_compliance_certificate_expiration'=>'required',
            'Revenue_Authority_Taxpayers_Identification_Number'=>'required',
            'company_email'=>'required',
            'physical_address'=>'required',
            'National_Pension_Authority'=>'required',
            'NAPSA_Compliance_Status_certificate'=>'required',
            'contact_person'=>'required',
            'company_telephone'=>'required',
            'contact_person_telephone'=>'required',
            'Bank_name'=>'required',
            'Bank_Account'=>'required',
            'Bank_Branch'=>'required',
            'Branch_code'=>'required',
            'Account_currency'=>'required',
            'company_financial_contact'=>'required',
            'contact_person_email'=>'required',
            'contact_person_phone_number'=>'required',
            'Annual_turnover'=>'required',
            'Current_assets'=>'required',
            'Current_liabilities'=>'required',
            'Current_ratio'=>'required',
            'Relevant_specialisation'=>'required',
            'maximum_of_10_Projects_contracts'=>'required',
            'No_of_years_in_business'=>'required',
            'Number_of_employees'=>'required',
            'Other_employees'=>'required',
            'login_username'=>'required',
            'login_password'=>'required',
            'confirm_password'=>'required',
            // 'login_username'=>'required|unique:admins',
            // 'login_password'=>  [
            //     'required',
            //     'string',
            //     'min:10',             // must be at least 10 characters in length
            //     'regex:/[a-z]/',      // must contain at least one lowercase letter
            //     'regex:/[A-Z]/',      // must contain at least one uppercase letter
            //     'regex:/[0-9]/',      // must contain at least one digit
            //     'regex:/[@$!%*#?&]/', // must contain a special character
            // ],
            // 'confirm_password'=>'required|same:login_password',
        ]);
           
            $login_username =  $request->input('login_username');
            $login_password =  $request->input('login_password');
            
            $original_supplier_email = $request->input('original_supplier_email');
            $email_verified_already_id =  $request->input('email_verified_already_id');
           

        // Supplier_reference number 
        $random_number_reference = rand(10000, 99999);
        $sup_ref = $login_username.''.$random_number_reference;
        
        $supplier =  new SupplierLogin;

        if($original_supplier_email){
               
            $supplier->email = $original_supplier_email; 
       }
       else
       {
           $supplier->email = $email_verified_already_id;
          
       }

        $supplier->username = $login_username;
        $supplier->password = Hash::make($login_password);
        $supplier->supplier_reference = $sup_ref;
        

        $save = $supplier->save();
   
          $mytime =  date('Y-m-d H:i:s');
          $random_number_reference = rand(10000, 99999);

          $ref = $random_number_reference.''.$mytime;


          $PostData = new Document();
          $post = new SupplierRegistrationDetailsModel();

        // Storing other input files

         $country = $post->country = $request->country;

         $request->country;
        
         $post->Category = $request->Category;
         $post->supplier_reference_form_no = $sup_ref;
         $post->SubCategory = $request->SubCategory;
         $post->Type_of_Business = $request->Type_of_Business;    
         $informatics = $post->Nature_of_Business = $request->Nature_of_Business;
         $post->BusinessName = $request->BusinessName;
         $post->Certificate_of_Registration = $request->Certificate_of_Registration;
         $post->Tax_compliance_certificate_expiration = $request->Tax_compliance_certificate_expiration; 
         $post->Revenue_Authority_Taxpayers_Identification_Number = $request->Revenue_Authority_Taxpayers_Identification_Number;
         $post->company_email = $request->company_email;
         $post->physical_address = $request->physical_address;      
         $post->National_Pension_Authority = $request->National_Pension_Authority;
         $post->NAPSA_Compliance_Status_certificate = $request->NAPSA_Compliance_Status_certificate;
         $post->contact_person = $request->contact_person;
         $post->company_telephone = $request->company_telephone;
         $post->contact_person_telephone = $request->contact_person_telephone;
         $post->Account_name = $request->Account_name;
         $post->Bank_name = $request->Bank_name;
         $post->Bank_Account = $request->Bank_Account;
         $post->Bank_Branch = $request->Bank_Branch;
         $post->Branch_code = $request->Branch_code;
         $post->Account_currency = $request->Account_currency;
         $post->company_financial_contact = $request->company_financial_contact;
         $post->contact_person_email = $request->contact_person_email;
         $post->contact_person_phone_number = $request->contact_person_phone_number;
         $post->Annual_turnover = $request->Annual_turnover;
         $post->Current_assets = $request->Current_assets;
         $post->Current_liabilities = $request->Current_liabilities;
         $post->Current_ratio = $request->Current_ratio;
         $post->Relevant_specialisation = $request->Relevant_specialisation;
         $post->maximum_of_10_Projects_contracts = $request->maximum_of_10_Projects_contracts;
         $post->No_of_years_in_business = $request->No_of_years_in_business;
         $post->Number_of_employees = $request->Number_of_employees;
         $post->Other_employees = $request->Other_employees;
         $post->Reference = $ref;
        
      $save = $post->save();

        // @@@@@@@@@@@@@@@@                NOT NEEDED          @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    
        // Stroring Attachmentss in the specified folder
        
        
        $Total_Documents = $request->Total_Documents;

        for($i=1; $i<=$Total_Documents; $i++){
            if($request->file('attachment'.$i)){
                $PostData = new Document();
                $file = $request->{'attachment'.$i};
                $filename = preg_replace("/[^A-Za-z0-9\_\-\.]/i", '_', $doc_list[$i-1]).'__'.date('YmdHis').'.'.$file->getClientOriginalExtension();
                $file->move('All_Documents',$filename);
                $PostData->Attachments = $filename;
                $PostData->documents_references = $ref;
                $PostData->save();
            }
        }

      $email = $request->company_email;

      $user_unique_id  = DB::table('supplier_registration_details_models')->where('company_email',$email)->value('id');
   
      $country_update = DB::table('Countries')->where('PhoneCode',$country)->value('Name');
      
      

      $this->supplierFetchData($email);
      $details = $this->supplierFetchData($email);
      
      
        if($save){
            return response()->json([
                "status" => True,
                "message" => "Form has been submitted successfully",
                "submited_country"=>$country_update,
                "details" => $details,
                "unique_id"=>$user_unique_id,
                // "pass_abc"=>$login_password,
            ]);
        } 
    }

    

    public function supplierFetchData($email){
       
      $saved_data =  DB::table('supplier_registration_details_models')->where('company_email', $email)->get();
      $saved_user_id =  DB::table('supplier_registration_details_models')->where('company_email', $email)->value('id');
      $ref =  DB::table('supplier_registration_details_models')->where('company_email', $email)->value('Reference');
      $T_O_B =  DB::table('supplier_registration_details_models')->where('company_email', $email)->value('Type_of_Business');
        
     
      
       $saved_documents =  DB::table('documents')->where('documents_references', $ref)->get();
    
      $details = '<table class="table table-bordered table-striped" id="smpl_tbl">';

      foreach($saved_data as $data){

        $country_code = $data->country;
        $country = DB::table('Countries')->where('PhoneCode',$country_code)->value('Name');


        $user_id = $data->Category;
        $category = DB::table('master_datas')->where('md_id',$user_id)->value('md_name');
        

        $type_of_business = DB::table('master_datas')->select('md_name')->where('md_id','=',$T_O_B)->value('md_name');
    
       
        // $data->SubCategory
        $subcategory = DB::table('master_datas')->select('md_name')->where('md_id','=',$user_id)->value('md_name');



        $details .= '<tr>';
        $details .= '<td colspan="3" "><h3>1.Business Details</h3></td>';
        $details .= '<td>'.'<a href="/edit-business-details/'.$saved_user_id.'" class="btn btn-primary">Edit Business Details</a>' .'</td>';
        $details .= '</tr>'; 

       
        $details .= '<tr>';
        $details .= '<th>Country</th>';
        $details .= '<th>Category</th>';
        $details .= '<th>Sub-category</th>';
        $details .= '<th>BusinessName</th>';
        $details .= '</tr>';  

        $details .= '<tr>';  
        $details .= '<td>'.$country.'</td>';
        $details .= '<td>'.$category.'</td>';
        $details .= '<td>'.$subcategory.'</td>';
        $details .= '<td>'.$data->BusinessName.'</td>';
        $details .= '</tr>';  

        $details .= '<tr>';
        $details .= '<th>Type of Business</th>';
        $details .= '<th>Nature of Business</th>';
        $details .= '<th>Certificate of Registration Incorporation number</th>';
        $details .= '<th>Revenue Authority Taxpayer’s Identification Number</th>';
        $details .= '</tr>';  


        $details .= '<tr>';  
        $details .= '<td>'.$type_of_business.'</td>';
        $details .= '<td>'.$data->Nature_of_Business.'</td>';
        $details .= '<td>'.$data->Certificate_of_Registration.'</td>';
        $details .= '<td>'.$data->Revenue_Authority_Taxpayers_Identification_Number.'</td>';
        $details .= '</tr>'; 

        $details .= '<tr>';
        $details .= '<th>Tax compliance certificate expiration date</th>';
        $details .= '<th>Physical address</th>';
        $details .= '<th>Company Email</th>';
        $details .= '<th>National Pension Authority (NPSA) Registration No</th>';
        $details .= '</tr>';  

        $details .= '<tr>';  
        $details .= '<td>'.$data->Tax_compliance_certificate_expiration.'</td>';
        $details .= '<td>'.$data->physical_address.'</td>';
        $details .= '<td>'.$data->company_email.'</td>';
        $details .= '<td>'.$data->NAPSA_Compliance_Status_certificate.'</td>';
        $details .= '</tr>'; 

        $details .= '<tr>';
        $details .= '<th>Personal contact :</th>';
        $details .= '<th>Company Telephone number</th>';
        $details .= '<th>Contact Telephone number</th>';
        $details .= '<th></th>';
        $details .= '</tr>';  


        $details .= '<tr>';  
        $details .= '<td>'.$data->contact_person.'</td>';
        $details .= '<td>'.$data->company_telephone.'</td>';
        $details .= '<td>'.$data->contact_person_telephone.'</td>';
        $details .= '</tr>'; 

        $details .= '<tr>';
        $details .= '<td colspan="3"><h3>2.Financial Information</h3></td>';
        $details .= '<td><a href="/edit-financial-details/'.$saved_user_id.'" class="btn btn-primary">Edit Financial Details</a></t>';
        $details .= '</tr>'; 


        $details .= '<tr>';
        $details .= '<th>Account name </th>';
        $details .= '<th>Bank Account number</th>';
        $details .= '<th>Bank name </th>';
        $details .= '<th>Bank Branch </th>';
        $details .= '</tr>';  


        $details .= '<tr>';  
        $details .= '<td>'.$data->Account_Name.'</td>';
        $details .= '<td>'.$data->Bank_Account.'</td>';
        $details .= '<td>'.$data->Bank_name.'</td>';
        $details .= '<td>'.$data->Bank_Branch.'</td>';
        $details .= '</tr>'; 


        $details .= '<tr>';
        $details .= '<th>Branch code  </th>';
        $details .= '<th>Account currency </th>';
        $details .= '<th>Company financial contact person</th>';
        $details .= '<th>Contact person email</th>';
        $details .= '</tr>';  


        $details .= '<tr>';  
        $details .= '<td>'.$data->Branch_code.'</td>';
        $details .= '<td>'.$data->Account_currency.'</td>';
        $details .= '<td>'.$data->company_financial_contact.'</td>';
        $details .= '<td>'.$data->contact_person_email.'</td>';
        $details .= '</tr>';

        $details .= '<tr>';
        $details .= '<th>Contact person phone number</th>';
        $details .= '</tr>';

        $details .= '<tr>';  
        $details .= '<td>'.$data->contact_person_phone_number.'</td>';
        $details .= '</tr>';

        $details .= '<tr>';
        $details .= '<td colspan="3"><h3>3.Capacity Levels</h3></td>';
        $details .= '<td><a href="/edit-capacity-documents/'.$saved_user_id.'" class="btn btn-primary">Edit Capacity Levels</a></t>';
        
        $details .= '</tr>'; 

        $details .= '<tr>';
        $details .= '<th>Annual turnover excluding this contract </th>';
        $details .= '<th>Current assets </th>';
        $details .= '<th>Current liabilities </th>';
        $details .= '<th>Current ratio (current assets/current liabilities) </th>';
        $details .= '</tr>';  


        $details .= '<tr>';  
        $details .= '<td>'.$data->Annual_turnover.'</td>';
        $details .= '<td>'.$data->Current_assets.'</td>';
        $details .= '<td>'.$data->Current_liabilities.'</td>';
        $details .= '<td>'.$data->Current_ratio.'</td>';
        $details .= '</tr>';

        $details .= '<tr>';
        $details .= '<th>No of years in business :</th>';
        $details .= '<th>Number of employees</th>';
        $details .= '<th>Other employees </th>';
        $details .= '<th>Relevant specialisation</th>';
        $details .= '</tr>';  


        $details .= '<tr>';  
        $details .= '<td>'.$data->No_of_years_in_business.'</td>';
        $details .= '<td>'.$data->Number_of_employees.'</td>';
        $details .= '<td>'.$data->Other_employees.'</td>';
        $details .= '<td>'.$data->Relevant_specialisation.'</td>';
        $details .= '</tr>';

        $details .= '<tr>';
        $details .= '<th>A maximum of 10 Projects|contracts  :</th>';
        $details .= '</tr>';


        $details .= '<tr>';  
        $details .= '<td>'.$data->maximum_of_10_Projects_contracts.'</td>';
        $details .= '</tr>';

        $details .= '<tr>';
        $details .= '<td colspan="3"><h3>4.Required Documents</h3></td>';
        $details .= '<td><a href="javascript:void(0);" class="btn btn-primary">Edit Required Documents</a></t>';
        // $details .= '<td><a href="/edit-required-documents/'.$saved_user_id.'" class="btn btn-primary">Edit Required Documents</a></t>';
        $details .= '</tr>'; 

        $details .= '<tr>';
        $details .= '<td colspan="3">';
        foreach($saved_documents as $doc){
            
            $details .= '<span>Attachment:</span>';
            $details .= '<a href="/download/'.$doc->Attachments.'">'.$doc->Attachments.'</a><br/>';

        }
        $details .= '</td>';
        $details .= '</tr>';

      }

      $details .= "</table>";

      return $details;

} 

        // Edit Business Details : 

        public function Edit_Business_Details(Request $request,$id){

        $countrylist = DB::select('select Name,PhoneCode from Countries');

        $Accessed_user =  DB::table('supplier_registration_details_models')->where('id', $id)->get();
        
        // Auto Insert Data when editing the Dropdowns
        
        $User_country =  DB::table('supplier_registration_details_models')->where('id', $id)->value('country');

        $user_country_name =  DB::table('Countries')->where('PhoneCode', $User_country)->value('Name');
            
        $db_category =  DB::table('supplier_registration_details_models')->where('id', $id)->value('Category');
        
        $user_selected_category = DB::table('master_datas')->where('md_id',$db_category)->value('md_name');
       

        $db_sub_category =  DB::table('supplier_registration_details_models')->where('id', $id)->value('SubCategory');
        
        $user_selected_sub_category = DB::table('master_datas')->select('md_code')->where('md_id','=',$db_sub_category)->value('md_name');
            
        $db_type_of_business =  DB::table('supplier_registration_details_models')->where('id', $id)->value('Type_of_Business');
        $user_selected_type_of_business = DB::table('master_datas')->select('md_name')->where('md_id','=',$db_type_of_business)->value('md_name');
      
        

        //getting categories
        $categories = DB::table("master_datas")
        ->select('md_id','md_name')
        ->where('md_master_code_id',3)
        ->whereNotNull('md_description')
        ->where('md_description','!=','')
        ->get();

        //getting business types
        $Type_of_Business = DB::table("master_datas")
        ->select('md_id','md_name')
        ->where('md_master_code_id',6)
        ->get();

        //getting business types
        $Documents = DB::table("master_datas")
        ->select('md_id','md_name')
        ->where('md_master_code_id',1032)
        ->get();

            return  view('Edits.Business_Details',compact(['countrylist','Accessed_user','categories',
            'Type_of_Business','Documents','User_country','db_category','user_selected_sub_category',
            'db_sub_category','db_type_of_business','user_country_name','user_selected_category','user_selected_type_of_business']));     
        }


        // Update Business Details:

        public function updateBusinessSupplierData(Request $request){

        $input = $request->all();
        $user_id = $input['user_id'];


        $country_code =  DB::table('supplier_registration_details_models')->where('id', $user_id)->value('country');
        $country_update = DB::table('Countries')->where('PhoneCode',$country_code)->value('Name');


        $post = SupplierRegistrationDetailsModel::find($request->user_id);

        $post->country = $request->country;
        $post->Category = $request->Category;
        $post->SubCategory = $request->SubCategory;
        $post->Type_of_Business = $request->Type_of_Business;    
        $post->Nature_of_Business = $request->Nature_of_Business;
        $post->BusinessName = $request->BusinessName;
        $post->Certificate_of_Registration = $request->Certificate_of_Registration;
        $post->Tax_compliance_certificate_expiration = $request->Tax_compliance_certificate_expiration; 
        $post->Revenue_Authority_Taxpayers_Identification_Number = $request->Revenue_Authority_Taxpayers_Identification_Number;
        $post->company_email = $request->company_email;
        $post->physical_address = $request->physical_address;      
        $post->National_Pension_Authority = $request->National_Pension_Authority;
        $post->NAPSA_Compliance_Status_certificate = $request->NAPSA_Compliance_Status_certificate;
        $post->contact_person = $request->contact_person;
        $post->company_telephone = $request->company_telephone;
        $post->contact_person_telephone = $request->contact_person_telephone;
        
            $save = $post->save();  

           

            return response()->json([
                "status"=>"True",
                "user_id"=>$user_id,
                "message"=>"Data has updated successfully",
                "update_country"=>$country_update,
            ]);

           
    }

    
    //  Update Financial Details :

    public function updateFinancialSupplierData(Request $request){

        $input = $request->all();
        $user_id = $input['user_id'];

        $post = SupplierRegistrationDetailsModel::find($request->user_id);


        $post->Account_name = $request->Account_name;
        $post->Bank_name = $request->Bank_name;
        $post->Bank_Account = $request->Bank_Account;
        $post->Bank_Branch = $request->Bank_Branch;
        $post->Branch_code = $request->Branch_code;
        $post->Account_currency = $request->Account_currency;
        $post->company_financial_contact = $request->company_financial_contact;
        $post->contact_person_email = $request->contact_person_email;
        $post->contact_person_phone_number = $request->contact_person_phone_number;

        
            $save = $post->save();  

            return response()->json([
                "status"=>"True",
                "user_id"=>$user_id,
                "message"=>"Data has updated successfully",
            ]);
    }


    // Update Capacity Details:

    public function updateCapacitySupplierData(Request $request){

        $input = $request->all();
        $user_id = $input['user_id'];

        $post = SupplierRegistrationDetailsModel::find($request->user_id);


        $post->Annual_turnover = $request->Annual_turnover;
        $post->Current_assets = $request->Current_assets;
        $post->Current_liabilities = $request->Current_liabilities;
        $post->Current_ratio = $request->Current_ratio;
        $saate = $post->Relevant_specialisation = $request->Relevant_specialisation;
        $post->maximum_of_10_Projects_contracts = $request->maximum_of_10_Projects_contracts;
        $post->No_of_years_in_business = $request->No_of_years_in_business;
        $post->Number_of_employees = $request->Number_of_employees;
        $post->Other_employees = $request->Other_employees;

        
            $save = $post->save();  

            return response()->json([
                "status"=>"True",
                "user_id"=>$user_id,
                "message"=>"Capacity Information has updated successfully",
            ]);
    }


    // Load Updated Data in the Form:

    public function LoadUpdatedData(Request $request){ 
    
        $input = $request->all();
        $user_id = $input['user_id'];

    
        $email =  DB::table('supplier_registration_details_models')->where('id', $user_id)->value('company_email');

        $country_code =  DB::table('supplier_registration_details_models')->where('id', $user_id)->value('country');


        $country_update = DB::table('Countries')->where('PhoneCode',$country_code)->value('Name');

        $details = $this->supplierFetchData($email);
          
              return response()->json([
                  "status" => True,
                  "message" => "Data has been updated successfully",
                  "details" => $details,
                  "submited_country"=>$country_update,
                  "unique_id"=>$user_id,
              ]);
             
    }

    // Load Financial Form data Updated Data:

    public function LoadFinancialUpdatedData(Request $request){
    
        $input = $request->all();
        $user_id = $input['user_id'];

         $email =  DB::table('supplier_registration_details_models')->where('id', $user_id)->value('company_email');   
         $country_code =  DB::table('supplier_registration_details_models')->where('id', $user_id)->value('country');
         $country_update = DB::table('Countries')->where('PhoneCode',$country_code)->value('Name');
  
        $details = $this->supplierFetchData($email);
        
          return response()->json([
              "status" => True,
              "message" => "Data has been updated successfully",
              "details" => $details,
              "unique_id"=>$user_id,
          ]);
         
}


    public function redirectedPage($id){

       $dynamic_id = $id;

       return view('Edits.redirect',compact(['dynamic_id']));
    }

    public function redirectedFinancialPage($id){

        $dynamic_id = $id;

    return view('Edits.redirectFinancial',compact(['dynamic_id']));
    }


    // Edit financial Data details:

    public function Edit_Financial_Details(Request $request,$id){

        $countrylist = DB::select('select Name,PhoneCode from Countries');

        $Accessed_user =  DB::table('supplier_registration_details_models')->where('id', $id)->get();

        //getting categories
        $categories = DB::table("master_datas")
        ->select('md_id','md_name')
        ->where('md_master_code_id',3)
        ->whereNotNull('md_description')
        ->where('md_description','!=','')
        ->get();

        //getting business types
        $Type_of_Business = DB::table("master_datas")
        ->select('md_id','md_name')
        ->where('md_master_code_id',6)
        ->get();

        //getting business types
        $Documents = DB::table("master_datas")
        ->select('md_id','md_name')
        ->where('md_master_code_id',1032)
        ->get();

            return  view('Edits.Financial_Details',compact(['countrylist','Accessed_user','categories','Type_of_Business','Documents']));     
        }


        public function Edit_Capacity_Details(){


            return  view('Edits.capacity');    
        }

        public function Edit_Required_Details()
         {

        $Documents = DB::table("master_datas")
        ->select('md_id','md_name')
        ->where('md_master_code_id',1032)
        ->get();

            return view('Edits.Required_Details',compact(['Documents']));
        }



    public function FetchedCountries(Request $request){

        $input = $request->all();
         $country_result = $input['country'];

            $Selected_country = $user = DB::table('Countries')->where('PhoneCode', $country_result)->value('PhoneCode');

            return response()->json([
                "status" => True,
                "changeCode" => "+".$Selected_country,
            ]);
    }

    
    public function subcategories(Request $request){

        $input = $request->all();
        $category = $input['Category'];

        $md_code = DB::table('master_datas')->select('md_code')->where('md_id','=',$category)->value('md_code');

        $list =  DB::table("master_datas")
        ->where('md_master_code_id',3)
        ->where('md_code',$md_code)
        ->where('md_description','=','')
        ->get();

        $values = '<option value="">Select</option>';
        foreach($list as $item){
            $values .= '<option value = "'.$item->md_id.'">'.$item->md_name.'</option>';
        }

        return $values; 

        }


        public function Updated_Capacity_Documents(Request $request,$id){

            $countrylist = DB::select('select Name,PhoneCode from Countries');
    
            $Accessed_user =  DB::table('supplier_registration_details_models')->where('id', $id)->get();
    
            //getting categories
            $categories = DB::table("master_datas")
            ->select('md_id','md_name')
            ->where('md_master_code_id',3)
            ->whereNotNull('md_description')
            ->where('md_description','!=','')
            ->get();
    
            //getting business types
            $Type_of_Business = DB::table("master_datas")
            ->select('md_id','md_name')
            ->where('md_master_code_id',6)
            ->get();
    
            //getting business types
            $Documents = DB::table("master_datas")
            ->select('md_id','md_name')
            ->where('md_master_code_id',1032)
            ->get();
    
                return  view('Edits.Capacity_Documents_Details',compact(['countrylist','Accessed_user','categories','Type_of_Business','Documents']));     
            }


        public function Update_Required_Documents(Request $request,$id){

            $Accessed_user =  DB::table('supplier_registration_details_models')->where('id', $id)->get();


            $md_master_code_id = 1032;

            $Documents = DB::table("master_datas")
            ->select('md_id','md_name')
            ->where('md_master_code_id',$md_master_code_id)
            ->get();
            
            return view('Edits.Required_Documents',compact(['Documents','md_master_code_id','Accessed_user']));
        }


        public function updateRequiredDetailsData(Request $request){

            $input = $request->all();
            $md_master_code_id = $input['md_master_code_id'];
            $user_id = $input['user_id'];


           $return_reference = DB::table('supplier_registration_details_models')->select('Reference')->where('id','=',$user_id)->value('Reference');
           $return_document_reference = DB::table('documents')->select('documents_references')->where('documents_references','=',$return_reference)->value('documents_references');
        
            $inforrd = document::where('documents_references',$return_reference)->pluck('documents_references')->all();


           
            $Total_Documents = $request->Total_Documents;
 

            for($i=1; $i<=$Total_Documents; $i++){
                if($request->file('attachment'.$i)){
                    $file = $request->{'attachment'.$i};
                    $filename = preg_replace("/[^A-Za-z0-9\_\-\.]/i", '_', $doc_list[$i-1]).'__'.date('YmdHis').'.'.$file->getClientOriginalExtension();
                    $file->move('All_Documents',$filename);
                    $PostData->Attachments = $filename;
                    $PostData->documents_references = $ref;
                    $PostData->save();
                }
            }

            
            return response()->json([
                "status" => True,
                "message" => "Documents have been updated successfully",
            ]);
            

        }


        public function download($file){
            return response()->download(public_path('All_Documents/'.$file));
        }


      public function sendMailWithPDF(Request $request)
      {

        $data = [
            'email'         => 'test@gmail.com',
            'title'      => 'COMESA:E-PROCUREMENT - Successfull Submisson of Supplier Form',
        ];



        $pdf = PDF::loadView('userdata', $data); // The pdf that requires to be seen the client
        $pdf_data = PDF::loadView('pdf_mail', $data); //The one Containing the body of the Email


        Mail::send('pdf_mail', $data, function ($message) use ($data, $pdf, $pdf_data) {
            $message->to($data["email"], $data["email"])
                ->subject($data["title"])
                ->attachData($pdf->output(), "SubmittedForm.pdf");
        });

        echo "email send successfully !!";

        }



      public function SupplierFormSubmission(Request $request){

        $input = $request->all();

        $user_id = $input['user_id'];

        // $data = $input['original_supplier_email'];
        // $exported_original_data = $this->userdata($data);


        $post = SupplierRegistrationDetailsModel::find($request->user_id);

        $post->status = "Accepted";
        $save = $post->save();  

        return response()->json([
            "status"=>"True",
            "user_id"=>$user_id,
            "message"=>"Form has been submitted Successfully",
        ]);
    }
   

    public function userdata($id){


        $supp_ref_no =  DB::table('supplier_registration_details_models')->where('id', $id)->value('supplier_reference_form_no');
        $email =  DB::table('supplier_registration_details_models')->where('id', $id)->value('company_email');


        $user_pp =  DB::table('supplier_logins')->where('supplier_reference', $supp_ref_no)->value('password');
        // dd($user_pp);

        $email_send_on =  DB::table('supplier_logins')->where('supplier_reference', $supp_ref_no)->value('email');
        $username_send_on =  DB::table('supplier_logins')->where('supplier_reference', $supp_ref_no)->value('username');
        
        $saved_data =  DB::table('supplier_registration_details_models')->where('company_email', $email)->get();
        $saved_user_id =  DB::table('supplier_registration_details_models')->where('company_email', $email)->value('id');
        $ref =  DB::table('supplier_registration_details_models')->where('company_email', $email)->value('Reference');
        $T_O_B =  DB::table('supplier_registration_details_models')->where('company_email', $email)->value('Type_of_Business');

        $saved_documents =  DB::table('documents')->where('documents_references', $ref)->get();

        $ref =  DB::table('supplier_registration_details_models')->where('company_email', $email)->value('Reference');


        foreach($saved_data as $data){

            $country_code = $data->country;
            $country = DB::table('Countries')->where('PhoneCode',$country_code)->value('Name');
    
    
            $user_id = $data->Category;
            $category = DB::table('master_datas')->where('md_id',$user_id)->value('md_name');
            
    
            $type_of_business = DB::table('master_datas')->select('md_name')->where('md_id','=',$T_O_B)->value('md_name');
        

            $subcategory = DB::table('master_datas')->select('md_name')->where('md_id','=',$user_id)->value('md_name');

            $details = "";

            foreach($saved_documents as $doc){
        
                $details = $doc->Attachments;
                
            }

                $data = [
                    'country'    => $country,
                    'category'         => $category,
                    'SubCategory'      => $subcategory,
                    'BusinessName' => $data->BusinessName,

                    'TypeOfBusiness'    => $type_of_business,
                    'natutreofbusiness'         => $data->Nature_of_Business,
                    'Certificate_of_Registration'      => $data->Certificate_of_Registration,
                    'Revenue_Authority_Taxpayers_Identification_Number' => $data->Revenue_Authority_Taxpayers_Identification_Number,

                    'Tax_compliance_certificate_expiration'    => $data->Tax_compliance_certificate_expiration,
                    'physical_address'         => $data->physical_address,
                    'company_email'      => $data->company_email,
                    'NAPSA_Compliance_Status_certificate' => $data->NAPSA_Compliance_Status_certificate,

                    'contact_person'    => $data->contact_person,
                    'contact_person_phone_number' => $data->contact_person_phone_number,
                    'contact_person_email'    => $data->contact_person_email,
                    'company_telephone'         => $data->company_telephone,
                    'contact_person_telephone'      => $data->contact_person_telephone,
                    'Account_Name' => $data->Account_Name,
                    'Bank_Name' => $data->Bank_name,


                    'Bank_Account'    => $data->Bank_Account,
                    'Bank_Branch'         => $data->Bank_Branch,
                    'Branch_code'      => $data->Branch_code,
                    'Account_currency' => $data->Account_currency,


                    'company_financial_contact'    => $data->company_financial_contact,
                    'Annual_turnover'         => $data->Annual_turnover,
                    'Current_assets'      => $data->Current_assets,
                    'Current_liabilities' => $data->Current_liabilities,


                    'Current_ratio'    => $data->Current_ratio,
                    'No_of_years_in_business'         => $data->No_of_years_in_business,
                    'Number_of_employees'      => $data->Number_of_employees,
                    'Other_employees' => $data->Other_employees,


                    'Relevant_specialisation'    => $data->Relevant_specialisation,
                    'maximum_of_10_Projects_contracts'         => $data->maximum_of_10_Projects_contracts,
                    'saved_documents'         => $details,
                ];
              

                $data["email"] = $email_send_on;          
                $data["username"] = $username_send_on;       
                $data["title"] = "COMESA:E-PROCUREMENT - Successfull Submisson of Supplier Form ";
                $data["body"] = "Laravel 10 COMESA E-PROCUREMENT";
        
                // $pdf = PDF::loadView('userdata', $data);
                $pdf = PDF::loadView('userdata', $data); // The pdf that requires to be dseen the client
                $pdf_data = PDF::loadView('pdf_mail', $data); //The one Containing the body of the Email
        
        
                Mail::send('pdf_mail', $data, function ($message) use ($data, $pdf, $pdf_data) {
                    $message->to($data["email"], $data["email"])
                        ->subject($data["title"])
                        ->attachData($pdf->output(), "SubmittedForm.pdf");
                });
        
                echo "email send successfully !!";

                return redirect('supplier-login');
            }
    }


    public function SupplierLogin(){

        return view('Login.SupplierLogin');
    }


    public function save(Request $request){

            $request->validate([
            'email'=> 'required|email|unique:supplier_logins',
            'password'=> 'required',
            
        ]);
        

        $supplier =  new SupplierLogin;

        $supplier->email = $request->email;
        $supplier->password = Hash::make($request->password);

        $save = $supplier->save();

        if($save){

            return back()->with('success','New user has been added to the database');
        }
        else{

            return back()->with('fail','There was something wrong in the login, try again later');
        }
    }


    public function checkUser(Request $request){
    
            $request->validate([
                'email'=>'required|email',
                'password'=>'required',
                'captcha'=>'required|captcha',
            ]);

            $userInfo = SupplierLogin::where('email','=',$request->email)->first();

            if(!$userInfo){
                return back()->with('fail','We dont recognise the above email or password');
            }
            else{

                if(Hash::check($request->password,$userInfo->password)){
                    
                    $request->session()->put('LoggedSupplier',$userInfo->id);

                    $user_check_email = $request->email;

                    $new_otp = rand(10000, 99999);

                    
                    $info = DB::table('supplier_logins')->where('email', $user_check_email)->update(['temp_otp' => $new_otp]);

                    $user_id_check = DB::table('supplier_logins')->where('email', $user_check_email)->value('id');
                    $username = DB::table('admins')->where('email', $user_check_email)->value('username');

                    $data = [
                        'subject'=>'SUPPLIER LOGIN OTP',
                        'body'=>'Enter the Sent OTP to Login : ',
                        'otp'=> $new_otp,
                        'username' => $username,
                    ];
        
                        Mail::to($user_check_email)->send(new SupplierMail($data));

                    return view('Login.OTP2',compact(['user_id_check','user_check_email']));

                }

            }
    }


    public function supplier_verify_otp(Request $request){


        $data_otp = $request->input('verify_otp');        
        $user_id = $request->input('hidden_otp');


        $user_id_email_check = DB::table('supplier_logins')->where('id', $user_id)->value('email');

        $user_otp_check_db = DB::table('supplier_logins')->where('email', $user_id_email_check)->value('temp_otp');

        if($data_otp == $user_otp_check_db){
            
            return redirect('supplier-dashboard');
        }
        else{

            return response()->json([
                "status"=>True,
                "message"=>"Invalid OTP being entered",
            ]);
        }
    }
    

    public function supplier_logout(){
        if(session()->has('LoggedSupplier')){
            session()->pull('LoggedSupplier');
            return redirect('supplier-login');
        }
    }

    public function supplierDashboard(){

        $data = ['LoggedUserInfo'=>SupplierLogin::where('id','=', session('LoggedSupplier'))->first()];

        return view('portal.supplier.supplier-dashboard',$data);
    }



    public function admin_register(){

        return view('Login.AdminRegister');
    }


    public function admin_save(Request $request){

        $request->validate([
            'username'=>'required',
            'email'=>'required|email|unique:admins',
            'password'=>'required|min:5|max:12',
        ]);

        

        $admindb =  new Admin;

        $admindb->email = $request->email;
        $admindb->username = $request->username;
        $admindb->password = Hash::make($request->password);

        $save = $admindb->save();

        if($save){

            return back()->with('success','New Admin has been added to the COMESA Admins');
        }
        else{

            return back()->with('fail','There was something wrong in creating the new Admin');
        }
    }


    public function Supplier_OTP(){


        return view('Login.SupplierOTP');
    }

    // Admin Functions Credentials

    public function admin_login(){

        return view('Login.AdminLogin');
    }


    public function admin_check(Request $request){

           $validatoring =  $request->validate([
                'email'=>'required',
                'password'=>'required',
                'captcha'=>'required|captcha',
            ]);

            $AdminInfo = Admin::where('email','=',$request->email)->first();

            if(!$AdminInfo){
                return back()->with('fail','We dont recognise the above email or password');
            }

            else{
                if(Hash::check($request->password,$AdminInfo->password)){
                    
                    $request->session()->put('LoggedAdmin',$AdminInfo->id);

                    $user_check_email = $request->email;

                    $new_otp = rand(10000, 99999);

                    
                    $info = DB::table('admins')->where('email', $user_check_email)->update(['temp_otp' => $new_otp]);

                    $user_id_check = DB::table('admins')->where('email', $user_check_email)->value('id');
                    $username = DB::table('admins')->where('email', $user_check_email)->value('username');

                    $data = [
                        'subject'=>'ADMIN LOGIN OTP',
                        'body'=>'Enter the Sent OTP to Login : ',
                        'otp'=> $new_otp,
                        'username' => $username,
                    ];
        
                        Mail::to($user_check_email)->send(new SupplierMail($data));

                    return view('Login.OTP',compact(['user_id_check','user_check_email']));

                }
                else{
                    return back()->with('fail','Incorrect password or Email entered');
                }
            }
    }



    public function admin_verify_otp(Request $request){


        $data_otp = $request->input('verify_otp');        
        $user_id = $request->input('hidden_otp');


        $user_id_email_check = DB::table('admins')->where('id', $user_id)->value('email');

        $user_otp_check_db = DB::table('admins')->where('email', $user_id_email_check)->value('temp_otp');

        if($data_otp == $user_otp_check_db){

            return redirect('admin-dashboard');
        }
        else{

            return response()->json([
                "status"=>FALSE,
                "message"=>"Invalid OTP being entered",
            ]);
        }
    }




    public function OTP_Validation(){

        return view('Login.OTP');
    }


    public function admin_dashboard(){

        $data = ['LoggedUserAdmin'=>Admin::where('id','=', session('LoggedAdmin'))->first()];
        return view('portal.admin.admin-dashboard',$data);
    }


    public function admin_logout(){

        if(session()->has('LoggedAdmin')){
            session()->pull('LoggedAdmin');
            return redirect('admin-login');
        }

    }

    // CAPTCHA RELOAD

    public function ReloadCaptcha(){

        return response()->json(['captcha'=>captcha_img('flat')]);
    }


    public function approve_dashboard(){


        $approved = DB::table('supplier_registration_details_models')->where('approval_status', 'Approved')->simplePaginate(10);
        $approved_count = DB::table('supplier_registration_details_models')->where('approval_status', 'Approved')->count();

        $pending = DB::table('supplier_registration_details_models')->where('approval_status', 'Pending')->simplePaginate(10);
        $pending_count = DB::table('supplier_registration_details_models')->where('approval_status', 'Pending')->count();


        $cancelled = DB::table('supplier_registration_details_models')->where('approval_status', 'Cancelled')->simplePaginate(10);
        $cancelled_count = DB::table('supplier_registration_details_models')->where('approval_status', 'Cancelled')->count();


        $data = ['LoggedUserAdmin'=>Admin::where('id','=', session('LoggedAdmin'))->first()];

        return view('portal.admin.approve_dashboard',$data)->with('approved',$approved)
                                                           ->with('pending',$pending)
                                                           ->with('cancelled',$cancelled)
                                                           ->with('approved_count',$approved_count)
                                                           ->with('pending_count',$pending_count)
                                                           ->with('cancelled_count',$cancelled_count);
                                                           
    }

    // Fetch data from user controller
    
    public function get_user_data(){

     $saved_data = Admin::all();

    return view('portal.admin.approve_dashboard',compact(['saved_data']));
        
    }


    public function pending_record($id)
    {
        

        $country_code =  DB::table('supplier_registration_details_models')->where('id', $id)->value('country');
        $country_name = DB::table('Countries')->where('PhoneCode',$country_code)->value('Name');

        $category_id =  DB::table('supplier_registration_details_models')->where('id', $id)->value('Category');
        $category = DB::table('master_datas')->where('md_id',$category_id)->value('md_name');
        
        $SubCategory_id =  DB::table('supplier_registration_details_models')->where('id', $id)->value('SubCategory');
        $subcategory = DB::table('master_datas')->select('md_name')->where('md_id','=',$SubCategory_id)->value('md_name');

        $T_O_B =  DB::table('supplier_registration_details_models')->where('id', $id)->value('Type_of_Business');
        $Types_of_business = DB::table('master_datas')->select('md_name')->where('md_id','=',$T_O_B)->value('md_name');


        $info = SupplierRegistrationDetailsModel::find($id);
        $ref =  DB::table('supplier_registration_details_models')->where('id', $id)->value('Reference');
        $saved_documents =  DB::table('documents')->where('documents_references', $ref)->get();
        
        $data = ['LoggedUserAdmin'=>Admin::where('id','=', session('LoggedAdmin'))->first()];

        return view('portal.admin.admin_accept_supplier',$data)->with('info',$info)
                                                              ->with('saved_documents',$saved_documents)
                                                              ->with('Types_of_business',$Types_of_business)
                                                              ->with('id',$id)->with('country_name',$country_name)
                                                              ->with('subcategory',$subcategory)->with('category',$category);
    }



    public function approved_record($id)
    {
        $id = (int)$id;

        $country_code =  DB::table('supplier_registration_details_models')->where('id', $id)->value('country');
        $country_name = DB::table('Countries')->where('PhoneCode',$country_code)->value('Name');

        $category_id =  DB::table('supplier_registration_details_models')->where('id', $id)->value('Category');
        $category = DB::table('master_datas')->where('md_id',$category_id)->value('md_name');
        
        $SubCategory_id =  DB::table('supplier_registration_details_models')->where('id', $id)->value('SubCategory');
        $subcategory = DB::table('master_datas')->select('md_name')->where('md_id','=',$SubCategory_id)->value('md_name');

        $T_O_B =  DB::table('supplier_registration_details_models')->where('id', $id)->value('Type_of_Business');
        $Types_of_business = DB::table('master_datas')->select('md_name')->where('md_id','=',$T_O_B)->value('md_name');


        $info = SupplierRegistrationDetailsModel::find($id);
        $ref =  DB::table('supplier_registration_details_models')->where('id', $id)->value('Reference');
        $saved_documents =  DB::table('documents')->where('documents_references', $ref)->get();
        
        $data = ['LoggedUserAdmin'=>Admin::where('id','=', session('LoggedAdmin'))->first()];

        return view('portal.admin.admin_approved_and_cancelled',$data)->with('info',$info)
                                                              ->with('saved_documents',$saved_documents)
                                                              ->with('Types_of_business',$Types_of_business)
                                                              ->with('id',$id)->with('country_name',$country_name)
                                                              ->with('subcategory',$subcategory)->with('category',$category);
    }



    public function cancelled_record($id)
    {
        

        $country_code =  DB::table('supplier_registration_details_models')->where('id', $id)->value('country');
        $country_name = DB::table('Countries')->where('PhoneCode',$country_code)->value('Name');

        $category_id =  DB::table('supplier_registration_details_models')->where('id', $id)->value('Category');
        $category = DB::table('master_datas')->where('md_id',$category_id)->value('md_name');
        
        $SubCategory_id =  DB::table('supplier_registration_details_models')->where('id', $id)->value('SubCategory');
        $subcategory = DB::table('master_datas')->select('md_name')->where('md_id','=',$SubCategory_id)->value('md_name');

        $T_O_B =  DB::table('supplier_registration_details_models')->where('id', $id)->value('Type_of_Business');
        $Types_of_business = DB::table('master_datas')->select('md_name')->where('md_id','=',$T_O_B)->value('md_name');


        $info = SupplierRegistrationDetailsModel::find($id);
        $ref =  DB::table('supplier_registration_details_models')->where('id', $id)->value('Reference');
        $saved_documents =  DB::table('documents')->where('documents_references', $ref)->get();
        
        $data = ['LoggedUserAdmin'=>Admin::where('id','=', session('LoggedAdmin'))->first()];

        return view('portal.admin.admin_cancelled_records',$data)->with('info',$info)
                                                              ->with('saved_documents',$saved_documents)
                                                              ->with('Types_of_business',$Types_of_business)
                                                              ->with('id',$id)->with('country_name',$country_name)
                                                              ->with('subcategory',$subcategory)->with('category',$category);
    }






    public function show_table(){

        $data = ['LoggedUserAdmin'=>Admin::where('id','=', session('LoggedAdmin'))->first()];
        return view('portal.admin.admin_accept_supplier',$data);
    }

    public function approving_supplier(Request $request){

        $id_hidden =  $request->input('id_hidden');

        $admin_email_hidden =  $request->input('admin_email_hidden');
        $reason_for_rejection =  $request->input('reason_for_rejection');
        $admin_username_hidden =  $request->input('admin_username_hidden');

        if($reason_for_rejection == null){
            DB::table('supplier_registration_details_models')
                                ->where('id', $id_hidden)
                                ->update([  'approval_status' => "Approved",
                                            'approved_by' => $admin_username_hidden,
                                            'approved_email' => $admin_email_hidden,
                                            'reason_for_rejection' => "Not provided",
                                        ]);
        }
        else{

            DB::table('supplier_registration_details_models')
                                ->where('id', $id_hidden)
                                ->update([  'approval_status' => "Approved",
                                            'approved_by' => $admin_username_hidden,
                                            'approved_email' => $admin_email_hidden,
                                            'reason_for_rejection' => $reason_for_rejection,
                                        ]);
                                        
        }
        
        return response()->json([
                "status" => True,
                "message"=>"The supplier Applciation request has been approved",
            ]);
    }

    public function cancel_approving_supplier(Request $request){

        $id_hidden =  $request->input('id_hidden');

        $admin_email_hidden =  $request->input('admin_email_hidden');
        $reason_for_rejection =  $request->input('reason_for_rejection');
        $admin_username_hidden =  $request->input('admin_username_hidden');

        DB::table('supplier_registration_details_models')
                                ->where('id', $id_hidden)
                                ->update([  'approval_status' => "Cancelled",
                                            'approved_by' => $admin_username_hidden,
                                            'approved_email' => $admin_email_hidden,
                                            'reason_for_rejection' => $reason_for_rejection,
                                        ]);


        return response()->json([
            "status" => True,
            "message"=>"This supplier application request has been cancelled",
        ]);
    }

    public function approved_supplier_db(){

        return response()->json([
            "status" => True,
            "message"=>"This supplier application request has been cancelled",
        ]);
    }

    // modifications and changes 

    public function welcomeHome(){

        return view('welcome');
    }



    public function excel_upload(Request $request){

        return view('excelupload');
    }

    // public function upload_excel(Request $request){
      
    //         $request->validate([
    //             'file1' => 'required|mimes:xlsx'
    //         ]);

    //         $the_file = $request->file('file1');

    //         try{
     
    //             $spreadsheet = IOFactory::load($the_file->getRealPath());
    //             $sheet        = $spreadsheet->getActiveSheet();
    //             $row_limit    = $sheet->getHighestDataRow();
    //             $column_limit = $sheet->getHighestDataColumn();
    //             $row_range    = range( 2, $row_limit );
    //             $column_range = range( 'D', $column_limit );
    //             $startcount = 2;
     
    //             $data = array();

    //             foreach ( $row_range as $row ) {
     
    //                 $first_name = $sheet->getCell( 'A' . $row )->getValue();

    //                 if($first_name == null){
    //                     dd("Null values are not allowed");
    //                 }

    //                 $data[] = [

    //                     'first_name' =>$first_name,
    //                     'last_name' => $sheet->getCell( 'B' . $row )->getValue(),
    //                     'email' => $sheet->getCell( 'C' . $row )->getValue(),
    //                     'mobile_number' => $sheet->getCell( 'D' . $row )->getValue(),
    //                 ];
     
    //                 $startcount++;
    //             }
     
    //             DB::table('legits')->insert($data);
     
    //         } catch (Exception $e) {
     
    //             $error_code = $e->errorInfo[1];
     
    //             return back()->withErrors('There was a problem uploading the data!');
    //         }
    // }


    public function upload_excel(Request $request){
      
        $request->validate([
            'file1' => 'required|mimes:xlsx'
        ]);

        $the_file = $request->file('file1');

        $spreadsheet = IOFactory::load($the_file->getRealPath());
        $sheetData       = $spreadsheet->getActiveSheet()->toArray();

        // $chunkSize = 50;
        // $chunks = array_chunk($sheetData, $chunkSize);

        // foreach ($chunks as $chunk) {
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
        }
    

    public function specific_table(){


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


         // SATSD INFRASTRUCTURE DIVISION TABLE
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

        // TRADE COM 11 TABLE

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
    }   
            
}
