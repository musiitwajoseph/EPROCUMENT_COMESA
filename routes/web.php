<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\COMESA_CONTROLLER;



//SUPPLIER ROUTES
Route::get('dashboard',[COMESA_CONTROLLER::class, 'dashboard']);
Route::get('supplier-registration',[COMESA_CONTROLLER::class, 'supplierRegistration'])->name('supplier-registration');
Route::get('supplier-dashboard',[COMESA_CONTROLLER::class, 'supplierDashboard']);

Route::post('generate-otp',[COMESA_CONTROLLER::class, 'generateOTP'])->name('generate-otp');


Route::get('demo-form',[COMESA_CONTROLLER::class,'demoform']);
Route::post('fetch-email',[COMESA_CONTROLLER::class,'fetch_email']);
Route::post('regenerate-otp',[COMESA_CONTROLLER::class,'regenerate']);


Route::post('SupplierRegistration-Details',[COMESA_CONTROLLER::class,'SupplierRegistrationDetails'])->name('SupplierRegistration-Details');
Route::post('supplier-dashboard',[COMESA_CONTROLLER::class, 'supplierDashboard']);

Route::post('Countries',[COMESA_CONTROLLER::class,'FetchedCountries']);
Route::post('LoadCountries',[COMESA_CONTROLLER::class,'LoadCountries']);
Route::post('subcategories',[COMESA_CONTROLLER::class,'subcategories']);

Route::get('Data',[COMESA_CONTROLLER::class,'FetchData']);
Route::get('test',[COMESA_CONTROLLER::class,'FetchData']);

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



Route::get('UpdatedBusiness',[COMESA_CONTROLLER::class, 'redirectedPage']);
Route::post('LoadUpdatedInformation',[COMESA_CONTROLLER::class,'LoadUpdatedData']);

Route::get('UpdatedFinancialBusiness',[COMESA_CONTROLLER::class, 'redirectedFinancialPage']);
Route::post('LoadFinancialUpdatedInformation',[COMESA_CONTROLLER::class,'LoadFinancialUpdatedData']);
// =====================================

// Route::get('edit-capacity-documents',[COMESA_CONTROLLER::class,'Updated_Capacity_Documents']);



Route::get('edit-required-documents',[COMESA_CONTROLLER::class,'Update_Required_Documents']);
Route::post('update-required-document-data',[COMESA_CONTROLLER::class, 'updateRequiredDetailsData']);