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
 });



//  Admin Middleware Routes

 Route::group(['middleware'=>['AdminAuth']], function(){

    Route::get('show_tb',[COMESA_CONTROLLER::class,'show_table']);
    Route::get('pending-record/{id}',[COMESA_CONTROLLER::class,'pending_record']);
    Route::get('approved-record/{id}',[COMESA_CONTROLLER::class,'approved_record']);
    Route::get('cancelled-record/{id}',[COMESA_CONTROLLER::class,'cancelled_record']);
    Route::get('user-data',[COMESA_CONTROLLER::class,'get_user_data'])->name('user-data');
    Route::get('admin-register',[COMESA_CONTROLLER::class,'admin_register'])->name('admin-register');
    Route::get('OTP-validation',[COMESA_CONTROLLER::class,'OTP_Validation'])->name('OTP-validation');
    Route::get('admin-dashboard',[COMESA_CONTROLLER::class,'admin_dashboard'])->name('admin-dashboard');
    Route::get('approve-dashboard',[COMESA_CONTROLLER::class,'approve_dashboard'])->name('approve-dashboard');

   //  Procurement plan Routes :

   Route::get('procurement',[ProcurementPlan::class,'procuring'])->name('procurement');

 });

      // Procurement Plan Routes

      Route::post('upload-procurement',[ProcurementPlan::class,'upload_procurement_plan'])->name('upload-procurement');


      
   //  Admin Middleware Routes Continuation

    Route::get('admin-login',[COMESA_CONTROLLER::class,'admin_login'])->name('admin-login');
    Route::get('admin-logout',[COMESA_CONTROLLER::class,'admin_logout'])->name('admin-logout');
    Route::post('admin.save',[COMESA_CONTROLLER::class,'admin_save'])->name('admin.save');
    Route::post('admin.check',[COMESA_CONTROLLER::class,'admin_check'])->name('admin.check');
    Route::post('approving',[COMESA_CONTROLLER::class,'approving_supplier']);
    Route::post('admin-verify-otp',[COMESA_CONTROLLER::class,'admin_verify_otp'])->name('admin-verify-otp');
    Route::post('cancel_approving',[COMESA_CONTROLLER::class,'cancel_approving_supplier']);

    Route::get('welcome',[COMESA_CONTROLLER::class,'welcomeHome']);



   //  Testing the upload data using excel sheet


   Route::get('excel-upload',[COMESA_CONTROLLER::class,'excel_upload']);
   Route::post('upload-excel',[COMESA_CONTROLLER::class,'upload_excel'])->name('upload-excel');


   // Procurement Plan Controller Route


  