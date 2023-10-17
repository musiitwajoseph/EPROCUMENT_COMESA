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
        ->select('md_id','md_name')
        ->where('md_master_code_id',1032)
        ->get();

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

           


            

            // Attachmentss  Documents Header
          
            //  'certificate_of_Registration_Incorporation'=>'required',
            //  'Revenue_Authority_TPIN_Certificate'=>'required',
            //  'Tax_Compliance_certificate'=>'required',
            //  'Article_of_Association'=>'required',
            //  'Company_profile'=>'required',
            //  'Bank_Refrence_letter'=>'required',
            //  'Audited_financial_reports'=>'required',
            //  'Recommendation_letters_from_current_clients'=>'required',
            //  'LPOs_offering_similar_services'=>'required',
            //  'A_balance_sheet_account'=>'required',
            //  'Labour_office_Registration_No'=>'required',
            //  'Labour_Office_Compliance_Status_certificate'=>'required',
            //  'Certificate_of_completion_delivery'=>'required',

            // Attachmentss  Documents

            // 'certificate_of_Registration_Incorporation_Attach'=>'required|mimes:pdf,zip',
            // 'Revenue_Authority_TPIN_Certificate_Attach'=>'required|mimes:pdf,zip',
            // 'Tax_Compliance_certificate_Attach'=>'required|mimes:pdf,zip',
            // 'Article_of_Association_Attach'=>'required|mimes:pdf,zip',
            // 'Company_profile_Attach'=>'required|mimes:pdf,zip',
            // 'Bank_Refrence_letter_Attach'=>'required|mimes:pdf,zip',
            // 'Audited_financial_reports_Attach'=>'required|mimes:pdf,zip',
            // 'Single_Business_Permit_Attach'=>'mimes:pdf,zip',
            // 'Manufacturers_authorization_letter_Attach'=>'mimes:pdf,zip',
            // 'Practicing_certification_Attach'=>'mimes:pdf,zip',
            // 'Recommendation_letters_from_current_clients_Attach'=>'required|mimes:pdf,zip',
            // 'LPOs_offering_similar_services_Attach'=>'required|mimes:pdf,zip',

            // 'A_balance_sheet_account_Attach'=>'required|mimes:pdf,zip',
            // 'Labour_office_Registration_No_Attach'=>'required|mimes:pdf,zip',
            // 'Labour_Office_Compliance_Status_certificate_Attach'=>'required|mimes:pdf,zip',
            // 'Certificate_of_completion_delivery_Attach'=>'required|mimes:pdf,zip',

        ]);


          

          $mytime =  date('Y-m-d H:i:s');
          $random_number_reference = rand(10000, 99999);

          $ref = $random_number_reference.''.$mytime;


          $PostData = new Document();
          $post = new SupplierRegistrationDetailsModel();

       

        //   $Post->Reference = $random_number_reference;
        // Storing other input files

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
    
        //  $post->certificate_of_Registration_Incorporation = $request->certificate_of_Registration_Incorporation;
        //  $post->Revenue_Authority_TPIN_Certificate = $request->Revenue_Authority_TPIN_Certificate;
        //  $post->Tax_Compliance_certificate = $request->Tax_Compliance_certificate;
        //  $post->Article_of_Association = $request->Article_of_Association;
        //  $post->Company_profile = $request->Company_profile;
        //  $post->Bank_Refrence_letter = $request->Bank_Refrence_letter;
        //  $post->Audited_financial_reports = $request->Audited_financial_reports;
        //  $post->Recommendation_letters_from_current_clients = $request->Recommendation_letters_from_current_clients;
        //  $post->LPOs_offering_similar_services = $request->LPOs_offering_similar_services;
        //  $post->A_balance_sheet_account = $request->A_balance_sheet_account;
        //  $post->Labour_office_Registration_No = $request->Labour_office_Registration_No;
        //  $post->Labour_Office_Compliance_Status_certificate = $request->Labour_Office_Compliance_Status_certificate;
        //  $post->Certificate_of_completion_delivery = $request->Certificate_of_completion_delivery;          



        // Stroring Attachmentss in the specified folder
        
        
        $Total_Documents = $request->Total_Documents;

        for($i=1; $i<=$Total_Documents; $i++){
            if($request->file('attachment'.$i)){
                $file = $request->{'attachment'.$i};
                $filename = 'CHANGED_'.date('YmdHi').'.'.$file->getClientOriginalExtension();
                $file->move('All_Documents',$filename);
                $PostData->Attachments = $filename;
            }

        }


        $PostData->References = $ref;
        // $Post->Reference = $ref;
        $PostData->save();
        $save = $post->save();

        if($save){
            return response()->json([
                "status" => True,
                "message" => "Form has been submitted successfully"
            ]);
        } 

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
}
