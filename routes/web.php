<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\COMESA_CONTROLLER;
use App\Http\Controllers\ProcurementPlan;
use App\Http\Controllers\Requistioning;



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

    Route::get('admin-register',[COMESA_CONTROLLER::class,'admin_register'])->name('admin-register');
    Route::get('view-system-user',[COMESA_CONTROLLER::class,'view_system_user'])->name('view-system-user');
    Route::get('edit-system-user/{id}',[COMESA_CONTROLLER::class,'edit_system_user']);
    Route::post('store-edit-system-user',[COMESA_CONTROLLER::class,'store_edit_system_user'])->name('store-edit-system-user');
    Route::get('delete-system-user/{id}',[COMESA_CONTROLLER::class,'delete_system_user']);

    Route::get('edit-assigned-originator/{id}',[Requistioning::class,'edit_assigned_originator']);
    Route::post('store-edit-assigned-originator',[Requistioning::class,'store_edit_assigned_originator'])->name('store-edit-assigned-originator');
    Route::get('delete-assigned-originator/{id}',[Requistioning::class,'delete_assigned_originator']);



    Route::get('show_tb',[COMESA_CONTROLLER::class,'show_table']);
    Route::get('pending-record/{id}',[COMESA_CONTROLLER::class,'pending_record']);
    Route::get('approved-record/{id}',[COMESA_CONTROLLER::class,'approved_record']);
    Route::get('cancelled-record/{id}',[COMESA_CONTROLLER::class,'cancelled_record']);
    Route::get('fully-cancelled/{id}',[COMESA_CONTROLLER::class,'fully_cancelled_record']);
    Route::get('fully-approved/{id}',[COMESA_CONTROLLER::class,'fully_approved_record']);
    Route::get('user-data',[COMESA_CONTROLLER::class,'get_user_data'])->name('user-data');
    Route::get('OTP-validation',[COMESA_CONTROLLER::class,'OTP_Validation'])->name('OTP-validation');
    Route::get('admin-dashboard',[COMESA_CONTROLLER::class,'admin_dashboard'])->name('admin-dashboard');
    Route::get('approve-dashboard',[COMESA_CONTROLLER::class,'approve_dashboard'])->name('approve-dashboard');
    Route::get('view-approved-suppliers/{id}',[COMESA_CONTROLLER::class,'view_approved_suppliers']);

    Route::post('revert-application',[COMESA_CONTROLLER::class,'revert_application'])->name('revert-application');
    //  Procurement plan Routes :

   Route::get('procurement',[ProcurementPlan::class,'procuring'])->name('procurement');
   Route::get('disable-procurement',[ProcurementPlan::class,'disable_procurement'])->name('disable-procurement');

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
   Route::post('accomplish-task',[ProcurementPlan::class,'accomplish_task'])->name('accomplish-task');


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

   Route::post('add-new-record',[ProcurementPlan::class,'addnewrecord'])->name('add-new-record');
   Route::post('update-md-record',[ProcurementPlan::class,'updatemdrecord'])->name('update-md-record');
   Route::post('update-md-code',[ProcurementPlan::class,'updatemdcode'])->name('update-md-code');

    //  Procurement plan Routes :
    
    Route::post('upload-excel',[ProcurementPlan::class,'upload_excel'])->name('upload-excel');
    Route::post('upload-all-excels',[ProcurementPlan::class,'upload_all_excel'])->name('upload-all-excels');

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

   // SUPPLIER DOCUMENTS DETAILS

   Route::get('add-document',[COMESA_CONTROLLER::class,'add_document'])->name('add-document');
   Route::post('store-document',[COMESA_CONTROLLER::class,'store_document'])->name('store-document');
   Route::get('view-supplier-documents',[COMESA_CONTROLLER::class,'view_supplier_documents'])->name('view-supplier-documents');

   Route::get('delete-supplier-document/{id}',[COMESA_CONTROLLER::class,'delete_supplier_document']);
   Route::get('edit-supplier-document/{id}',[COMESA_CONTROLLER::class,'edit_supplier_document']);
   Route::post('edit-supplier-document',[COMESA_CONTROLLER::class,'edit_store_supplier_document'])->name('edit-supplier-document');

});


   Route::get('upload-supplier-details',[ProcurementPlan::class,'uploadSupplierDetails'])->name('upload-supplier-details');
   Route::post('send-supplier-uploaded-data',[ProcurementPlan::class,'send_supplier_uploaded_data'])->name('send-supplier-uploaded-data');
   Route::post('access-supplier-records',[COMESA_CONTROLLER::class,'access_supplier_records'])->name('access-supplier-records'); 

   //  Admin Middleware Routes Continuation

    Route::get('admin-login',[COMESA_CONTROLLER::class,'admin_login'])->name('admin-login');
    Route::get('admin-login',[COMESA_CONTROLLER::class,'admin_login'])->name('/');


    Route::get('admin-logout',[COMESA_CONTROLLER::class,'admin_logout'])->name('admin-logout');
    Route::post('admin.save',[COMESA_CONTROLLER::class,'admin_save'])->name('admin.save');
    Route::post('admin.check',[COMESA_CONTROLLER::class,'admin_check'])->name('admin.check');
    Route::post('approving',[COMESA_CONTROLLER::class,'approving_supplier']);
    Route::post('admin-verify-otp',[COMESA_CONTROLLER::class,'admin_verify_otp'])->name('admin-verify-otp');
    Route::post('cancel_approving',[COMESA_CONTROLLER::class,'cancel_approving_supplier']);
    Route::post('approve-cancel-all',[COMESA_CONTROLLER::class,'approve_cancel_all'])->name('approve-cancel-all');
    Route::post('approve-all-mass-assign',[COMESA_CONTROLLER::class,'mass_approve'])->name('approve-all-mass-assign');
    Route::post('reject-all-mass-assign',[COMESA_CONTROLLER::class,'mass_reject'])->name('reject-all-mass-assign');
    Route::post('verify-all-mass-assign',[COMESA_CONTROLLER::class,'verify_all_mass_assign'])->name('verify-all-mass-assign');

   //  EXCEL SHEETS UPLOAD

   // Route::get('excel-upload',[COMESA_CONTROLLER::class,'excel_upload']);

   Route::get('excel-upload',[COMESA_CONTROLLER::class,'excel_upload'])->name('excel-upload');
   Route::post('post-excel-sheet',[COMESA_CONTROLLER::class,'post_excel_sheet'])->name('post-excel-sheet');

   Route::get('download-procurement',[COMESA_CONTROLLER::class,'download_procurement_sheet'])->name('download-procurement');
   Route::get('download-supplier',[COMESA_CONTROLLER::class,'download_supplier_sheet'])->name('download-supplier');


   //  Testing routes to be deleted later
    Route::get('welcome',[COMESA_CONTROLLER::class,'welcomeHome']);



// REQUISITION 

// 1.planned requsition
Route::get('start-requistion',[Requistioning::class,'start_requistion'])->name('start-requistion');
   
Route::get('SPV',[Requistioning::class,'SPV'])->name('SPV');
Route::post('SPV-save',[Requistioning::class,'SPV_save'])->name('SPV-save');
Route::get('Assign-requistion-role',[Requistioning::class,'assign_requistion_role'])->name('Assign-requistion-role');


Route::get('Assign-head-unit',[Requistioning::class,'assign_head_unit'])->name('Assign-head-unit');
Route::post('assign-head-unit',[Requistioning::class,'assign_head_division'])->name('assign-head-unit');


Route::post('assign-procurement-division',[Requistioning::class,'assign_procurement_division'])->name('assign-procurement-division');

Route::get('purchase-requistion',[Requistioning::class,'purchase_requistion'])->name('purchase-requistion');
Route::post('store-purchase-requistion',[Requistioning::class,'store_purchase_requistion'])->name('store-purchase-requistion');

Route::post('load-procurement-plan',[Requistioning::class,'load_procurement_plan'])->name('load-procurement-plan');

Route::get('proceed/{id}',[Requistioning::class,'proceed_requistioning']);

Route::get('review-requistion/{id}',[Requistioning::class,'review_requistioning']);
Route::get('review-requistion-FA/{id}',[Requistioning::class,'review_requistioning_FA']);


Route::get('approve-requistion/{id}',[Requistioning::class,'approve_requistion']);
Route::get('reject-requistion/{id}',[Requistioning::class,'reject_requistion']);

Route::get('approve-requistion-FA/{id}',[Requistioning::class,'approve_requistion_FA']);
Route::get('reject-requistion-FA/{id}',[Requistioning::class,'reject_requistion_FA']);


Route::get('Assign-procurement-officer',[Requistioning::class,'assign_procurement_officer_view'])->name('Assign-procurement-officer');
Route::get('assign-procurement-link',[Requistioning::class,'assign_procurement_link'])->name('assign-procurement-link');

Route::get('assigning-procurement-officer/{id}',[Requistioning::class,'assigning_procurement_officer_requistion']);

Route::post('store-assigning-procurement-officer',[Requistioning::class,'store_assigning_procurement_officer_requistion'])->name('store-assigning-procurement-officer');

Route::get('Procurement-officer-assigned-requsitions',[Requistioning::class,'Procurement_officer_assigned_requsitions'])->name('Procurement-officer-assigned-requsitions');
Route::post('load-all-assigned-requsitions',[Requistioning::class,'load_all_assigned_requsitions'])->name('load-all-assigned-requsitions');
Route::get('load-specific-assigned-requsition/{id}',[Requistioning::class,'load_specific_assigned_requsitions']);

Route::post('assigned-procurement-officer-reject',[Requistioning::class,'assigned_procurement_officer_reject'])->name('assigned-procurement-officer-reject');
Route::post('assigned-procurement-officer-approve',[Requistioning::class,'assigned_procurement_officer_approve'])->name('assigned-procurement-officer-approve');
Route::post('assigned-procurement-officer-request-info',[Requistioning::class,'assigned_procurement_officer_request_info'])->name('assigned-procurement-officer-request-info');

Route::get('recommended-requistions',[Requistioning::class,'recommended_requistions'])->name('recommended-requistions');
Route::get('approve-recommended-requistions/{id}',[Requistioning::class,'approve_recommended_requistions']);
Route::get('reject-recommended-requistions/{id}',[Requistioning::class,'reject_recommended_requistions']);

// 2.planned requsition

Route::post('load-item-not-planned',[Requistioning::class,'load_item_not_planned'])->name('load-item-not-planned');
Route::post('store-load-item-not-planned',[Requistioning::class,'store_load_item_not_planned'])->name('store-load-item-not-planned');


Route::get('review-requistion-planned/{id}',[Requistioning::class,'review_requistioning_planned']);
Route::get('review-requistion-planned-director-hr',[Requistioning::class,'review_requistioning_planned_director_hr'])->name('review-requistion-planned-director-hr');
// Route::get('review-requistion-FA/{id}',[Requistioning::class,'review_requistioning_FA']);


Route::get('approve-requistion-not-planned/{id}',[Requistioning::class,'approve_requistion_not_planned']);
Route::get('reject-requistion-not-planned/{id}',[Requistioning::class,'reject_requistion_not_planned']);

Route::get('approve-requistion-not-planned-director-hr/{id}',[Requistioning::class,'approve_requistion_not_planned_director_hr']);
Route::get('reject-requistion-not-planned-director-hr/{id}',[Requistioning::class,'reject_requistion_not_planned_director_hr']);

// 3.asg finance

Route::get('review-requistion-planned-asg-finance',[Requistioning::class,'review_requistioning_planned_asg_finance'])->name('review-requistion-planned-asg-finance');

Route::get('approve-requistion-not-planned/{id}',[Requistioning::class,'approve_requistion_not_planned']);
Route::get('reject-requistion-not-planned/{id}',[Requistioning::class,'reject_requistion_not_planned']);

Route::get('approve-requistion-not-planned-asg-finance/{id}',[Requistioning::class,'approve_requistion_not_planned_asg_finance']);
Route::get('reject-requistion-not-planned-asg-finance/{id}',[Requistioning::class,'reject_requistion_not_planned_asg_finance']);


// 4.sg finance

Route::get('review-requistion-planned-sg',[Requistioning::class,'review_requistioning_planned_sg'])->name('review-requistion-planned-sg');

Route::get('approve-requistion-not-planned-sg/{id}',[Requistioning::class,'approve_requistion_not_planned_sg']);
Route::get('reject-requistion-not-planned-sg/{id}',[Requistioning::class,'reject_requistion_not_planned_sg']);



// PROCUREMENT WORK FLOW 

Route::get('procurement-assign-view',[ProcurementPlan::class,'procurement_assign_view'])->name('procurement-assign-view');
Route::post('assign-procurement-officer',[ProcurementPlan::class,'assign_procurement_officer'])->name('assign-procurement-officer');
   
Route::get('approve-procurement',[ProcurementPlan::class,'approve_procurement'])->name('approve-procurement');
Route::post('H-O-P-approve-procurement',[ProcurementPlan::class,'Head_of_procurement_approval_pp'])->name('H-O-P-approve-procurement');

Route::get('dummy',[ProcurementPlan::class,'dummy'])->name('dummy');

Route::post('approve-procurement-record',[ProcurementPlan::class,'approve_procurement_records'])->name('approve-procurement-record');
Route::post('reject-procurement-record',[ProcurementPlan::class,'reject_procurement_records'])->name('reject-procurement-record');

Route::get('approved_by_admin/{id}',[COMESA_CONTROLLER::class,'approved_by_admin'])->name('approved_by_admin');

Route::post('hide',[ProcurementPlan::class,'hide'])->name('hide');
Route::post('search-status',[ProcurementPlan::class,'search_status'])->name('search-status');


Route::post('role-user-auth',[COMESA_CONTROLLER::class,'role_user_auth']);


   // Advanced User rights , roles  and Previledges 

Route::get('admin-rights-previledges',[Requistioning::class,'admin_rights_previledges'])->name('admin-rights-previledges');


// Testing new system

// Route::get('admin-new-login',[COMESA_CONTROLLER::class,'admin_dashboard_new'])->name('admin-new-login');

// Outside the Admin middleware

