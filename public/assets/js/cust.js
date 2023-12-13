

function app_approvals(){
    				
        var hidden_role = $('#hidden_role').val();
        var hidden_status = $('#hidden_status').val();
        var procurement_approval_status = $('#procurement_approval_status').val();

        if(hidden_role == "Approval Officer" && hidden_status == "null")
        {
            $('#supplier_menu').hide();
            $('#procurement_menu').hide();
            $('#requsition_menu').hide();
            $('#master_data_menu').hide();
            $('#user_data_menu').hide();
            $('#user_previledges_menu').hide();
            $('#dashboard_menu').hide();
            $('#mini_dashboard').hide();
            // Sections
            $('#Approved_suppliers').hide();
        }
        else if(hidden_role == "Approval Officer" && hidden_status == "Assigned" && procurement_approval_status == "Assigned" )
        {
        
            $('#requsition_menu').hide();
            $('#master_data_menu').hide();
            $('#user_data_menu').hide();
            $('#user_previledges_menu').hide();

            // Sections
            $('#Approved_suppliers').show();

            // Show
            $('#supplier_menu').show();
            $('.supplier_info').hide();
            $('#supplier_1').show();
            $('#dashboard_menu').hide();
            $('#mini_dashboard').show();
            $('#fully_approved_btn').hide();
            $('#fully_cancelled_btn').hide();

            // procurement_plan menu
            $('#procurement_menu').show();
            $('.procurement_plan').hide();
            $('#procurement_upload').show();

        }

        else if(hidden_role == "Approval Officer" && hidden_status != "Assigned" && procurement_approval_status == "Assigned")
        {

            $('#requsition_menu').hide();
            $('#master_data_menu').hide();
            $('#user_data_menu').hide();
            $('#user_previledges_menu').hide();

            // Sections
            $('#Approved_suppliers').show();

            // Show
            $('#supplier_menu').hide();
            $('.supplier_info').hide();
            $('#supplier_1').hide();
            $('#dashboard_menu').hide();
            $('#mini_dashboard').show();
            $('#fully_approved_btn').hide();
            $('#fully_cancelled_btn').hide();

            // procurement_plan menu
            $('#procurement_menu').show();
            $('.procurement_plan').hide();
            $('#procurement_upload').show();

        }

        else if(hidden_role == "Approval Officer"  && hidden_status == "Assigned" )
        {

            $('#procurement_menu').hide();
            $('#requsition_menu').hide();
            $('#master_data_menu').hide();
            $('#user_data_menu').hide();
            $('#user_previledges_menu').hide();
            // Sections
            $('#Approved_suppliers').hide();

            // Show
            $('#supplier_menu').show();
            $('.supplier_info').hide();
            $('#supplier_1').show();
            // $('#dashboard_menu').hide();
            $('#mini_dashboard').show();
            $('#fully_approved_btn').hide();
            $('#fully_cancelled_btn').hide();
        }



        if(hidden_role != "Approval Officer")
        {
            $('#accomplish_task').hide();
        }
}