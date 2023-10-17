<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_registration_details_models', function (Blueprint $table) {

          $table->id();
        $table->text('country')->default('null');
        $table->text('Category')->default('null');
        $table->text('SubCategory')->default('null');
        $table->text('Type_of_Business')->default('null');
        $table->text('Nature_of_Business')->default('null');
        $table->text('BusinessName')->default('null');
        $table->text('Certificate_of_Registration')->default('null');
        $table->text('Tax_compliance_certificate_expiration')->default('null');
        $table->text('Revenue_Authority_Taxpayers_Identification_Number')->default('null');
        $table->text('company_email')->default('null');
        $table->text('physical_address')->default('null');
        $table->text('National_Pension_Authority')->default('null');
        $table->text('NAPSA_Compliance_Status_certificate')->default('null');
        $table->text('contact_person')->default('null');
        $table->text('company_telephone')->default('null');
        $table->text('contact_person_telephone')->default('null');
        $table->text('Bank_name')->default('null');
        $table->text('Bank_Account')->default('null');
        $table->text('Bank_Branch')->default('null');
        $table->text('Branch_code')->default('null');
        $table->text('Account_currency')->default('null');
        $table->text('company_financial_contact')->default('null');
        $table->text('contact_person_email')->default('null');
        $table->text('contact_person_phone_number')->default('null');
        $table->text('Annual_turnover')->default('null');
        $table->text('Current_assets')->default('null');
        $table->text('Current_liabilities')->default('null');
        $table->text('Current_ratio')->default('null');
        $table->text('Relevant_specialisation')->default('null');
        $table->text('maximum_of_10_Projects_contracts')->default('null');
        $table->text('No_of_years_in_business')->default('null');
        $table->text('Number_of_employees')->default('null');
        $table->text('Other_employees')->default('null');
        $table->text('certificate_of_Registration_Incorporation')->default('null');
        $table->text('Revenue_Authority_TPIN_Certificate')->default('null');
        $table->text('Tax_Compliance_certificate')->default('null');
        $table->text('Article_of_Association')->default('null');
        $table->text('Company_profile')->default('null');
        $table->text('Bank_Refrence_letter')->default('null');
        $table->text('Audited_financial_reports')->default('null');
        $table->text('Recommendation_letters_from_current_clients')->default('null');
        $table->text('LPOs_offering_similar_services')->default('null');
        $table->text('A_balance_sheet_account')->default('null');
        $table->text('Labour_office_Registration_No')->default('null');
        $table->text('Labour_Office_Compliance_Status_certificate')->default('null');
        $table->text('Certificate_of_completion_delivery')->default('null');
        $table->text('Reference')->default('null');


//  $table->text('certificate_of_Registration_Incorporation')->default('null');
//  $table->text('certificate_of_Registration_Incorporation_Attach')->default('null');
//  $table->text('KRA_PIN_certificate')->default('null');
//  $table->text('KRA_PIN_certificate_Attach')->default('null');
//  $table->text('Tax_Compliance_certificate')->default('null');
//  $table->text('Tax_Compliance_certificate_Attach')->default('null');
//  $table->text('Article_of_Association')->default('null');
//  $table->text('Article_of_Association_Attach')->default('null');
//  $table->text('Bank_Refrence_letter')->default('null');
//  $table->text('Bank_Refrence_letter_Attach')->default('null');
//  $table->text('Audited_financial_reports')->default('null');
//  $table->text('Audited_financial_reports_Attach')->default('null');
//  $table->text('Recommendation_letters_from_current_clients')->default('null');
//  $table->text('Recommendation_letters_from_current_clients_Attach')->default('null');
//  $table->text('LPOs_offering_similar_services')->default('null');
//  $table->text('LPOs_offering_similar_services_Attach')->default('null');
//  $table->text('Single_Business_Permit')->default('null');
//  $table->text('Single_Business_Permit_Attach')->default('null');
//  $table->text('Manufacturers_authorization_letter')->default('null');
//  $table->text('Manufacturers_authorization_letter_Attach')->default('null');
//  $table->text('Practicing_certification')->default('null');
//  $table->text('Practicing_certification_Attach')->default('null');

$table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supplier_registration_details_models');
    }
};
