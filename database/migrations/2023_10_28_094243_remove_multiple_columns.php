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
        
  
            Schema::table('supplier_registration_details_models', function (Blueprint $table) {

                $table->dropColumn(['certificate_of_Registration_Incorporation', 'Revenue_Authority_TPIN_Certificate',
                'Tax_Compliance_certificate','Article_of_Association','Company_profile','Bank_Refrence_letter',
                'Audited_financial_reports','Recommendation_letters_from_current_clients','LPOs_offering_similar_services',
                'A_balance_sheet_account','Labour_office_Registration_No','Labour_Office_Compliance_Status_certificate',
                'Certificate_of_completion_delivery']);
            });
        }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
