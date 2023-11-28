<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\COMESA_CONTROLLER;
use App\Http\Controllers\ProcurementPlan;



//SUPPLIER ROUTES

Route::get('supplier-registration',[COMESA_CONTROLLER::class, 'supplierRegistration'])->name('supplier-registration');

Route::post('fetch-email',[COMESA_CONTROLLER::class,'fetch_email']);
Route::post('regenerate-otp',[COMESA_CONTROLLER::class,'regenerate']);
Route::post('generate-otp',[COMESA_CONTROLLER::class, 'generateOTP'])->name('generate-otp');

Route::post('SupplierRegistration-Details',[COMESA_CONTROLLER::class,'SupplierRegistrationDetails'])->name('SupplierRegistration-Details');

Route::post('Countries',[COMESA_CONTROLLER::class,'FetchedCountries']);
Route::post('LoadCountries',[COMESA_CONTROLLER::class,'LoadCountries']);
Route::post('subcategories',[COMESA_CONTROLLER::class,'subcategories']);

Route::post('fetch-supplier-data',[COMESA_CONTROLLER::class, 'supplierFetchData']);


// Edit edit-financial-details

Route::get('edit-capacity-details',[COMESA_CONTROLLER::class,'Edit_Capacity_Details']);
Route::get('edit-business-details/{id}',[COMESA_CONTROLLER::class,'Edit_Business_Details']);
Route::get('edit-financial-details/{id}',[COMESA_CONTROLLER::class,'Edit_Financial_Details']);
Route::get('edit-capacity-documents/{id}',[COMESA_CONTROLLER::class,'Updated_Capacity_Documents']);
Route::get('edit-required-details',[COMESA_CONTROLLER::class,'Edit_Required_Details']);

// Edit Updating Data in the Database

Route::post('update-business-supplier-data',[COMESA_CONTROLLER::class, 'updateBusinessSupplierData']);
Route::post('update-financial-supplier-data',[COMESA_CONTROLLER::class, 'updateFinancialSupplierData']);
Route::post('update-capacity-supplier-data',[COMESA_CONTROLLER::class, 'updateCapacitySupplierData']);

Route::get('UpdatedBusiness/{id}',[COMESA_CONTROLLER::class, 'redirectedPage']);
Route::post('LoadUpdatedInformation',[COMESA_CONTROLLER::class,'LoadUpdatedData']);

Route::get('UpdatedFinancialBusiness/{id}',[COMESA_CONTROLLER::class, 'redirectedFinancialPage']);
Route::post('LoadFinancialUpdatedInformation',[COMESA_CONTROLLER::class,'LoadFinancialUpdatedData']);


// Edit Required Documents Data in the Database

Route::get('edit-required-documents/{id}',[COMESA_CONTROLLER::class,'Update_Required_Documents']);
Route::post('update-required-document-data',[COMESA_CONTROLLER::class, 'updateRequiredDetailsData']);



// Download Store pdf Attachments from suppliers

Route::get('/download/{file}',[COMESA_CONTROLLER::class,'download']);
Route::get('/download/{file}',[COMESA_CONTROLLER::class,'download']);



// Submitting form 

Route::post('update-and-submit',[COMESA_CONTROLLER::class,'SupplierFormSubmission']);
Route::get('send_mail_pdf', [COMESA_CONTROLLER::class, 'sendMailWithPDF'])->name('send_mail_pdf');

Route::get('/resume', [COMESA_CONTROLLER::class, 'index']);
Route::get('/userdata/{id}', [COMESA_CONTROLLER::class, 'userdata']);




// Supplier Login Credentials:

Route::get('supplier-login',[COMESA_CONTROLLER::class,'SupplierLogin'])->name('supplier-login');
Route::post('auth.save',[COMESA_CONTROLLER::class,'save'])->name('auth.save');
Route::post('auth.check',[COMESA_CONTROLLER::class,'checkUser'])->name('auth.check');

Route::get('supplier-logout',[COMESA_CONTROLLER::class,'supplier_logout'])->name('supplier-logout');
Route::get('reload-captcha',[COMESA_CONTROLLER::class,'ReloadCaptcha'])->name('reload-captcha');
Route::get('Supplier-OTP',[COMESA_CONTROLLER::class,'Supplier_OTP'])->name('Supplier-OTP');
Route::post('supplier-verify-otp',[COMESA_CONTROLLER::class,'supplier_verify_otp'])->name('supplier-verify-otp');


//  Supplier Middleware Routes

 Route::group(['middleware'=>['SupplierCheck']], function(){

    Route::get('supplier-dashboard',[COMESA_CONTROLLER::class, 'supplierDashboard'])->name('supplier-dashboard');
    Route::get('status',[COMESA_CONTROLLER::class,'status'])->name('status');
    Route::get('submitted-record/{id}',[COMESA_CONTROLLER::class, 'submitted_record']);
    Route::get('supplier-record/{id}',[COMESA_CONTROLLER::class,'supplier_record']);
 });


//  Admin Middleware Routes

 Route::group(['middleware'=>['AdminAuth']], function(){

    Route::get('show_tb',[COMESA_CONTROLLER::class,'show_table']);
    Route::get('pending-record/{id}',[COMESA_CONTROLLER::class,'pending_record']);
    Route::get('approved-record/{id}',[COMESA_CONTROLLER::class,'approved_record']);
    Route::get('cancelled-record/{id}',[COMESA_CONTROLLER::class,'cancelled_record']);
    Route::get('fully-cancelled/{id}',[COMESA_CONTROLLER::class,'fully_cancelled_record']);
    Route::get('fully-approved/{id}',[COMESA_CONTROLLER::class,'fully_approved_record']);
    Route::get('user-data',[COMESA_CONTROLLER::class,'get_user_data'])->name('user-data');
    Route::get('admin-register',[COMESA_CONTROLLER::class,'admin_register'])->name('admin-register');
    Route::get('OTP-validation',[COMESA_CONTROLLER::class,'OTP_Validation'])->name('OTP-validation');
    Route::get('admin-dashboard',[COMESA_CONTROLLER::class,'admin_dashboard'])->name('admin-dashboard');
    Route::get('approve-dashboard',[COMESA_CONTROLLER::class,'approve_dashboard'])->name('approve-dashboard');

    //  Procurement plan Routes :

   Route::get('procurement',[ProcurementPlan::class,'procuring'])->name('procurement');
   Route::get('procurement-records',[ProcurementPlan::class,'procurement_records'])->name('procurement-records');
   Route::get('master-table',[ProcurementPlan::class,'master_table'])->name('master-table');
   Route::get('edit-record/{id}',[ProcurementPlan::class,'edit_record']);
   Route::get('delete-record/{id}',[ProcurementPlan::class,'delete_record']);
   Route::get('add-record',[ProcurementPlan::class,'addrecordmaster'])->name('add-record');

   Route::get('assign-officer',[ProcurementPlan::class,'assign_officer'])->name('assign-officer');
   Route::post('store-assign-officer',[ProcurementPlan::class,'store_assign_officer'])->name('store-assign-officer');
   Route::post('check-approval-officer/{id}',[ProcurementPlan::class,'checkapprovalofficer'])->name('check-approval-officer');

   // WORK FLOW PROCUREMENT PLAN

   Route::post('fully-cancel',[ProcurementPlan::class,'fully_cancel'])->name('fully-cancel');
   Route::post('fully-approve',[ProcurementPlan::class,'fully_approve'])->name('fully-approve');



   // Master Code routes :

   Route::get('master-code',[ProcurementPlan::class,'master_code'])->name('master-code');
   Route::get('add-master-code',[ProcurementPlan::class,'add_master_code'])->name('add-master-code');
   Route::get('edit-code/{id}',[ProcurementPlan::class,'edit_code']);
   Route::get('delete-code/{id}',[ProcurementPlan::class,'delete_code']);

   // Time lines

   Route::get('display-timelines',[ProcurementPlan::class,'display_timeline'])->name('display-timelines');
   Route::get('timelines',[ProcurementPlan::class,'timelines'])->name('timelines');
   Route::post('store-timeline',[ProcurementPlan::class,'store_timelines'])->name('store-timeline');


   Route::post('send-master-code',[ProcurementPlan::class,'send_master_code'])->name('send-master-code');

   // 

   Route::post('add-new-record',[ProcurementPlan::class,'addnewrecord'])->name('add-new-record');
   Route::post('update-md-record',[ProcurementPlan::class,'updatemdrecord'])->name('update-md-record');
   Route::post('update-md-code',[ProcurementPlan::class,'updatemdcode'])->name('update-md-code');

    //  Procurement plan Routes :

    Route::get('excel-upload',[COMESA_CONTROLLER::class,'excel_upload']);
    Route::post('upload-excel',[ProcurementPlan::class,'upload_excel'])->name('upload-excel');


   //  User role and rights previledges

   Route::get('add-user',[COMESA_CONTROLLER::class,'add_user_view'])->name('add-user');
   Route::get('import-user',[COMESA_CONTROLLER::class,'import_user_view'])->name('import-user');
   Route::get('view-user',[COMESA_CONTROLLER::class,'view_user_details'])->name('view-user');
   Route::get('user-rights-priveledges',[COMESA_CONTROLLER::class,'user_right_priveledges'])->name('user-rights-priveledges');
   Route::get('edit-user-priveledges/{id}',[COMESA_CONTROLLER::class,'edit_user_previledges']);
   Route::get('view-user-priveledges/{id}',[COMESA_CONTROLLER::class,'view_user_previledges']);

   Route::get('edit-user-role/{id}',[COMESA_CONTROLLER::class,'edit_user_role']);
   Route::get('delete-user-role/{id}',[COMESA_CONTROLLER::class,'delete_user_role']);

   Route::post('add-user-role',[COMESA_CONTROLLER::class,'add_user_role'])->name('add-user-role');
   Route::post('import-user-role',[COMESA_CONTROLLER::class,'import_user_role_file'])->name('import-user-role');
   Route::post('edit-user-role-record',[COMESA_CONTROLLER::class,'edit_user_role_record'])->name('edit-user-role-record');


   Route::get('add-user-previledges',[COMESA_CONTROLLER::class,'add_user_previledges'])->name('add-user-previledges');
   Route::post('store-user-previledges',[COMESA_CONTROLLER::class,'store_user_previledges'])->name('store-user-previledges');

   Route::get('add-user-right',[COMESA_CONTROLLER::class,'add_user_right'])->name('add-user-right');
   Route::post('store-user-right',[COMESA_CONTROLLER::class,'store_user_right'])->name('store-user-right');


   Route::post('store-previledge-db/{id}',[COMESA_CONTROLLER::class,'store_user_previledges_db'])->name('store-previledge-db');
});


   Route::get('upload-supplier-details',[ProcurementPlan::class,'uploadSupplierDetails'])->name('upload-supplier-details');
   Route::post('send-supplier-uploaded-data',[ProcurementPlan::class,'send_supplier_uploaded_data'])->name('send-supplier-uploaded-data');
   Route::post('access-supplier-records',[COMESA_CONTROLLER::class,'access_supplier_records'])->name('access-supplier-records'); 

   //  Admin Middleware Routes Continuation

    Route::get('admin-login',[COMESA_CONTROLLER::class,'admin_login'])->name('admin-login');
    Route::get('admin-logout',[COMESA_CONTROLLER::class,'admin_logout'])->name('admin-logout');
    Route::post('admin.save',[COMESA_CONTROLLER::class,'admin_save'])->name('admin.save');
    Route::post('admin.check',[COMESA_CONTROLLER::class,'admin_check'])->name('admin.check');
    Route::post('approving',[COMESA_CONTROLLER::class,'approving_supplier']);
    Route::post('admin-verify-otp',[COMESA_CONTROLLER::class,'admin_verify_otp'])->name('admin-verify-otp');
    Route::post('cancel_approving',[COMESA_CONTROLLER::class,'cancel_approving_supplier']);

   //  Testing routes to be deleted later
    Route::get('welcome',[COMESA_CONTROLLER::class,'welcomeHome']);



   



   




  