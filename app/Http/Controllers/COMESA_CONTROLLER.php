<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\otp;
use App\Models\Document;
use Mail;
use App\Mail\SupplierMail;
use App\Models\SupplierRegistrationDetailsModel;
use DB;
use Carbon;

class COMESA_CONTROLLER extends Controller
{

    public function dashboard(){
        return view('staff.dashboard');
    }
    
    public function supplierRegistration(){

        //getting country list
        $countrylist = DB::select('select Name,PhoneCode from Countries');

        //getting categories
        $categories = DB::table("master_data")
        ->select('md_id','md_name')
        ->where('md_master_code_id',3)
        ->whereNotNull('md_description')
        ->where('md_description','!=','')
        ->get();

        //getting business types
        $Type_of_Business = DB::table("master_data")
        ->select('md_id','md_name')
        ->where('md_master_code_id',6)
        ->get();

        //getting business types
        $Documents = DB::table("master_data")
        ->select('md_id','md_name')
        ->where('md_master_code_id',1032)
        ->get();

        // $data = SupplierRegistrationDetailsModel::all();

        return view('portal.supplier.supplier-registration',compact(['countrylist','categories','Type_of_Business','Documents']));
    }

    public function supplierDashboard(){
        return view('portal.supplier.supplier-dashboard');
    }

    public function generateOTP(Request $request){
    

        $input = $request->all();
        $email = $input['email'];

        // $email_status = DB::table('otps')->where('email', $email)->value('status');

         $email_status = DB::table('otps')->where('email', $email)->orderBy('id', 'desc')->value('status');
        
        if($email_status == 'verified'){

            return response()->json([
                "status" => True,
                "message" => "OTP sent to email: $email",
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
            "expiryTime"=>"Your OTP verifyication expires in 15 mins from now at : " . $endTime ,
        ]);
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


    public function fetch_email(Request $request){

        $input = $request->all();

        $email_form = $input['email'];
        $entered_otp = $input['otp_token'];


          //Subtraction from different timestamps
           $mytime = Carbon\Carbon::now();

           $verify_otp_status_created_at = $user = DB::table('otps')->where('email', $email_form)->value('created_at');
           $verify_otp_status_updated_at = $user = DB::table('otps')->where('email', $email_form)->value('updated_at');


          $diffInMinutes_created_at = $mytime->diffInMinutes($verify_otp_status_created_at);
           $diffInMinutes_updated_at = $mytime->diffInMinutes($verify_otp_status_updated_at);
            
          //User TimeOut for not using the Token
          if($diffInMinutes_created_at >= 15 || $diffInMinutes_updated_at >= 15){
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


       else if( $entered_otp == ''){
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

            DB::table('otps')->where('email', $email)->update(array( 'otp_token'=>$new_otp,));

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


    public function SupplierRegistrationDetails(Request $request)
    {

        //getting business types
        $Documents = DB::table("master_data")
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

        ]);


          

          $mytime =  date('Y-m-d H:i:s');
          $random_number_reference = rand(10000, 99999);

          $ref = $random_number_reference.''.$mytime;


          $PostData = new Document();
          $post = new SupplierRegistrationDetailsModel();

        // Storing other input files

        $post->country = $request->country;

        $request->country;
        
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
                $PostData->References = $ref;
                $PostData->save();
            }
        }

      $email = $request->company_email;

      $save = $post->save();

      $saved_data =  DB::table('supplier_registration_details_models')->where('company_email', $email)->get();
      $saved_user_id =  DB::table('supplier_registration_details_models')->where('company_email', $email)->value('id');

      
      $saved_documents =  DB::table('documents')->where('References', $ref)->get();
    
      $details = '<table class="table table-bordered table-striped" id="smpl_tbl">';

      foreach($saved_data as $data){

        $country_code = $data->country;
        $country = DB::table('Countries')->where('PhoneCode',$country_code)->value('Name');
        
        $details .= '<tr>';
        $details .= '<td colspan="3" "><h3>1.Business Details</h3></td>';
        $details .= '<td>'.'<a href="edit-business-details/'.$saved_user_id.'" class="btn btn-primary">Edit Business Details</a>' .'</td>';
        $details .= '</tr>'; 

       
        $details .= '<tr>';
        $details .= '<th>Country</th>';
        $details .= '<th>Category</th>';
        $details .= '<th>Sub-category</th>';
        $details .= '<th>BusinessName</th>';
        $details .= '</tr>';  

        $details .= '<tr>';  
        $details .= '<td>'.$country.'</td>';
        $details .= '<td>'.$data->Category.'</td>';
        $details .= '<td>'.$data->SubCategory.'</td>';
        $details .= '<td>'.$data->BusinessName.'</td>';
        $details .= '</tr>';  

        $details .= '<tr>';
        $details .= '<th>Type of Business</th>';
        $details .= '<th>Nature of Business</th>';
        $details .= '<th>Certificate of Registration Incorporation number</th>';
        $details .= '<th>Revenue Authority Taxpayer’s Identification Number</th>';
        $details .= '</tr>';  


        $details .= '<tr>';  
        $details .= '<td>'.$data->Type_of_Business.'</td>';
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
        $details .= '<td><a href="edit-financial-details/'.$saved_user_id.'" class="btn btn-primary">Edit Financial Details</a></t>';
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
        $details .= '<td><a href="#" class="btn btn-primary">Edit Capacity Levels</a></t>';
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
        $details .= '<td>'.$data->certificate_of_Registration_Incorporation.'</td>';
        $details .= '</tr>';

        $details .= '<tr>';
        $details .= '<th>A maximum of 10 Projects|contracts  :</th>';
        $details .= '</tr>';


        $details .= '<tr>';  
        $details .= '<td>'.$data->maximum_of_10_Projects_contracts.'</td>';
        $details .= '</tr>';

        $details .= '<tr>';
        $details .= '<td colspan="3"><h3>4.Required Documents</h3></td>';
        $details .= '<td><a href="#" class="btn btn-primary">Edit Required Documents</a></t>';
        $details .= '</tr>'; 

        $details .= '<tr>';
        $details .= '<td colspan="3">';
        foreach($saved_documents as $doc){
            $details .= '<a href="Link'.'">'.$doc->Attachments.'</a><br/>';
        }
        $details .= '</td>';
        $details .= '</tr>';

      }

      $details .= "</table>";

      $this->supplierFetchData($email);

        if($save){
            return response()->json([
                "status" => True,
                "message" => "Form has been submitted successfully",
                "details" => $details,
            ]);
        } 

    }

    

    public function supplierFetchData(){

       return  $data = SupplierRegistrationDetailsModel::all();

        } 

        public function Edit_Business_Details(Request $request,$id){

        $countrylist = DB::select('select Name,PhoneCode from Countries');

        $Accessed_user =  DB::table('supplier_registration_details_models')->where('id', $id)->get();

        //getting categories
        $categories = DB::table("master_data")
        ->select('md_id','md_name')
        ->where('md_master_code_id',3)
        ->whereNotNull('md_description')
        ->where('md_description','!=','')
        ->get();

        //getting business types
        $Type_of_Business = DB::table("master_data")
        ->select('md_id','md_name')
        ->where('md_master_code_id',6)
        ->get();

        //getting business types
        $Documents = DB::table("master_data")
        ->select('md_id','md_name')
        ->where('md_master_code_id',1032)
        ->get();

            return  view('Edits.Business_Details',compact(['countrylist','Accessed_user','categories','Type_of_Business','Documents']));     
        }


        public function updateBusinessSupplierData(Request $request){

        $input = $request->all();
        $user_id = $input['user_id'];

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
            ]);
    }

    
    public function updateFinancialSupplierData(Request $request){

        $input = $request->all();
        $user_id = $input['user_id'];

        // dd($user_id);

        $post = SupplierRegistrationDetailsModel::find($request->user_id);


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


    public function updateCapacitySupplierData(Request $request){

        $input = $request->all();
        $user_id = $input['user_id'];

        $post = SupplierRegistrationDetailsModel::find($request->user_id);


        $post->Annual_turnover = $request->Annual_turnover;
        $post->Current_assets = $request->Current_assets;
        $post->Current_liabilities = $request->Current_liabilities;
        $post->Current_ratio = $request->Current_ratio;
        $post->Relevant_specialisation = $request->Relevant_specialisation;
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



    public function LoadUpdatedData(){ //working code
    
        $id = 137;
        $saved_user_id = 137;
        $ref = "876242023-10-16 13:16:30";


        // $saved_user_id =  DB::table('supplier_registration_details_models')->where('company_email', $email)->value('id');

        $saved_data = DB::table('supplier_registration_details_models')->where('id', $id)->get();

        $saved_documents =  DB::table('documents')->where('References', $ref)->get();        

        $details = '<table class="table table-bordered table-striped" id="smpl_tbl">';
  
        foreach($saved_data as $data){            

        $country_code = $data->country;
        $country = DB::table('Countries')->where('PhoneCode',$country_code)->value('Name');
  
          $details .= '<tr>';
          $details .= '<td colspan="3" "><h3>1.Business Details</h3></td>';
          $details .= '<td>'.'<a href="edit-business-details/'.$saved_user_id.'" class="btn btn-primary">Edit Business Details</a>' .'</td>';
          $details .= '</tr>'; 
  
         
          $details .= '<tr>';
          $details .= '<th>Country</th>';
          $details .= '<th>Category</th>';
          $details .= '<th>Sub-category</th>';
          $details .= '<th>BusinessName</th>';
          $details .= '</tr>';  
  
          $details .= '<tr>';  
          $details .= '<td>'.$country.'</td>';
          $details .= '<td>'.$data->Category.'</td>';
          $details .= '<td>'.$data->SubCategory.'</td>';
          $details .= '<td>'.$data->BusinessName.'</td>';
          $details .= '</tr>';  
  
          $details .= '<tr>';
          $details .= '<th>Type of Business</th>';
          $details .= '<th>Nature of Business</th>';
          $details .= '<th>Certificate of Registration Incorporation number</th>';
          $details .= '<th>Revenue Authority Taxpayer’s Identification Number</th>';
          $details .= '</tr>';  
  
  
          $details .= '<tr>';  
          $details .= '<td>'.$data->Type_of_Business.'</td>';
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
          $details .= '<td><a href="edit-financial-details/'.$saved_user_id.'" class="btn btn-primary">Edit Financial Details</a></t>';
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
          $details .= '<td><a href="#" class="btn btn-primary">Edit Capacity Levels</a></t>';
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
          $details .= '<td>'.$data->certificate_of_Registration_Incorporation.'</td>';
          $details .= '</tr>';
  
          $details .= '<tr>';
          $details .= '<th>A maximum of 10 Projects|contracts  :</th>';
          $details .= '</tr>';
  
  
          $details .= '<tr>';  
          $details .= '<td>'.$data->maximum_of_10_Projects_contracts.'</td>';
          $details .= '</tr>';
  
          $details .= '<tr>';
          $details .= '<td colspan="3"><h3>4.Required Documents</h3></td>';
          $details .= '<td><a href="#" class="btn btn-primary">Edit Required Documents</a></t>';
          $details .= '</tr>'; 
  
          $details .= '<tr>';
          $details .= '<td colspan="3">';
          foreach($saved_documents as $doc){
              $details .= '<a href="Link'.'">'.$doc->Attachments.'</a><br/>';
          }
          $details .= '</td>';
          $details .= '</tr>';
  
        }
  
        $details .= "</table>";
          
              return response()->json([
                  "status" => True,
                  "message" => "Data has been updated successfully",
                  "details" => $details,
              ]);
             
    }

    public function LoadFinancialUpdatedData(){
    
    $id = 137;
    $saved_user_id = 137;
    $ref = "876242023-10-16 13:16:30";

        // dd($id);
    $saved_data = DB::table('supplier_registration_details_models')->where('id', $id)->get();

    $saved_documents =  DB::table('documents')->where('References', $ref)->get();        

    $details = '<table class="table table-bordered table-striped" id="smpl_tbl">';

    foreach($saved_data as $data){

      $details .= '<tr>';
      $details .= '<td colspan="3" "><h3>1.Business Details</h3></td>';
      $details .= '<td>'.'<a href="edit-business-details/'.$saved_user_id.'" class="btn btn-primary">Edit Business Details</a>' .'</td>';
      $details .= '</tr>'; 

     
      $details .= '<tr>';
      $details .= '<th>Country</th>';
      $details .= '<th>Category</th>';
      $details .= '<th>Sub-category</th>';
      $details .= '<th>BusinessName</th>';
      $details .= '</tr>';  

      $details .= '<tr>';  
      $details .= '<td>'.$data->country.'</td>';
      $details .= '<td>'.$data->Category.'</td>';
      $details .= '<td>'.$data->SubCategory.'</td>';
      $details .= '<td>'.$data->BusinessName.'</td>';
      $details .= '</tr>';  

      $details .= '<tr>';
      $details .= '<th>Type of Business</th>';
      $details .= '<th>Nature of Business</th>';
      $details .= '<th>Certificate of Registration Incorporation number</th>';
      $details .= '<th>Revenue Authority Taxpayer’s Identification Number</th>';
      $details .= '</tr>';  


      $details .= '<tr>';  
      $details .= '<td>'.$data->Type_of_Business.'</td>';
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
      $details .= '<td><a href="edit-financial-details/'.$saved_user_id.'" class="btn btn-primary">Edit Financial Details</a></t>';
      $details .= '</tr>'; 


      $details .= '<tr>';
      $details .= '<th>Bank name </th>';
      $details .= '<th>Bank Account number</th>';
      $details .= '<th>Bank Branch </th>';
      $details .= '<th>Branch code  </th>';
      $details .= '</tr>';  


      $details .= '<tr>';  
      $details .= '<td>'.$data->Bank_name.'</td>';
      $details .= '<td>'.$data->Bank_Account.'</td>';
      $details .= '<td>'.$data->Bank_Branch.'</td>';
      $details .= '<td>'.$data->Branch_code.'</td>';
      $details .= '</tr>'; 


      $details .= '<tr>';
      $details .= '<th>Account currency </th>';
      $details .= '<th>Company financial contact person</th>';
      $details .= '<th>Contact person email</th>';
      $details .= '<th>Contact person phone number</th>';
      $details .= '</tr>';  


      $details .= '<tr>';  
      $details .= '<td>'.$data->Account_currency.'</td>';
      $details .= '<td>'.$data->company_financial_contact.'</td>';
      $details .= '<td>'.$data->contact_person_email.'</td>';
      $details .= '<td>'.$data->contact_person_phone_number.'</td>';
      $details .= '</tr>';

      
      $details .= '<tr>';
      $details .= '<td colspan="3"><h3>3.Capacity Levels</h3></td>';
      $details .= '<td><a href="edit-capacity-documents/'.$saved_user_id.'" class="btn btn-primary">Edit Capacity Levels</a></t>';
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
      $details .= '<td>'.$data->certificate_of_Registration_Incorporation.'</td>';
      $details .= '</tr>';

      $details .= '<tr>';
      $details .= '<th>A maximum of 10 Projects|contracts  :</th>';
      $details .= '</tr>';


      $details .= '<tr>';  
      $details .= '<td>'.$data->maximum_of_10_Projects_contracts.'</td>';
      $details .= '</tr>';

      $details .= '<tr>';
      $details .= '<td colspan="3"><h3>4.Required Documents</h3></td>';
      $details .= '<td><a href="#" class="btn btn-primary">Edit Required Documents</a></t>';
      $details .= '</tr>'; 

      $details .= '<tr>';
      $details .= '<td colspan="3">';
      foreach($saved_documents as $doc){
          $details .= '<a href="Link'.'">'.$doc->Attachments.'</a><br/>';
      }
      $details .= '</td>';
      $details .= '</tr>';

    }

    $details .= "</table>";
      
          return response()->json([
              "status" => True,
              "message" => "Data has been updated successfully",
              "details" => $details,
          ]);
         
}


    public function redirectedPage(){

       return view('Edits.redirect');
    }

    public function redirectedFinancialPage(){

    return view('Edits.redirectFinancial');
    }


    public function Edit_Financial_Details(Request $request,$id){

        $countrylist = DB::select('select Name,PhoneCode from Countries');

        $Accessed_user =  DB::table('supplier_registration_details_models')->where('id', $id)->get();

        //getting categories
        $categories = DB::table("master_data")
        ->select('md_id','md_name')
        ->where('md_master_code_id',3)
        ->whereNotNull('md_description')
        ->where('md_description','!=','')
        ->get();

        //getting business types
        $Type_of_Business = DB::table("master_data")
        ->select('md_id','md_name')
        ->where('md_master_code_id',6)
        ->get();

        //getting business types
        $Documents = DB::table("master_data")
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

        $Documents = DB::table("master_data")
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

        $md_code = DB::table('master_data')->select('md_code')->where('md_id','=',$category)->value('md_code');

        $list =  DB::table("master_data")
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


        // public function Updated_Capacity_Documents()
        //  {
        //     return view('Edits.Capacity_Documents_Details');
        // }

        public function Updated_Capacity_Documents(Request $request,$id){

            $countrylist = DB::select('select Name,PhoneCode from Countries');
    
            $Accessed_user =  DB::table('supplier_registration_details_models')->where('id', $id)->get();
    
            //getting categories
            $categories = DB::table("master_data")
            ->select('md_id','md_name')
            ->where('md_master_code_id',3)
            ->whereNotNull('md_description')
            ->where('md_description','!=','')
            ->get();
    
            //getting business types
            $Type_of_Business = DB::table("master_data")
            ->select('md_id','md_name')
            ->where('md_master_code_id',6)
            ->get();
    
            //getting business types
            $Documents = DB::table("master_data")
            ->select('md_id','md_name')
            ->where('md_master_code_id',1032)
            ->get();
    
                return  view('Edits.Capacity_Documents_Details',compact(['countrylist','Accessed_user','categories','Type_of_Business','Documents']));     
            }


        public function Update_Required_Documents(){

            $Documents = DB::table("master_data")
            ->select('md_id','md_name')
            ->where('md_master_code_id',1032)
            ->get();

            
            return view('Edits.Required_Documents',compact(['Documents']));
        }
}
