

function app_approvals() {

    var hidden_role = $('#hidden_role').val();
    var hidden_status = $('#hidden_status').val();
    var procurement_approval_status = $('#procurement_approval_status').val();

    if (hidden_role == "Approval Officer" && hidden_status == "null") {
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
    else if (hidden_role == "Approval Officer" && hidden_status == "Assigned" && procurement_approval_status == "Assigned") {

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

    else if (hidden_role == "Approval Officer" && hidden_status != "Assigned" && procurement_approval_status == "Assigned") {

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

    else if (hidden_role == "Approval Officer" && hidden_status == "Assigned") {

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

    if (hidden_role != "Approval Officer") {
        $('#accomplish_task').hide();
    }

}

// Real Logic for User previledges for Originator


$(document).ready(function () {

    var admin_role = $('#hidden_role').val();

    $.ajax({
        type: 'GET',
        url: '/admin-rights-previledges',
        data: { admin_role: admin_role },

        success: function (data) {
            if (data.status) {
                if (data.admin_role == 'Originator') {
                    if (data.originator_status == 'display') {
                        // Dashboard menu.
                        $('#dashboard_menu').hide();

                         // Supplier menu.
                        $('#supplier_menu').hide();

                         // Procurement plan menu.
                        $('#procurement_menu').hide();

                        // Requistion menu
                        $('#start_requistioning').show();
                        $('#spv').hide();
                        $('#assign_requistion_role').hide();
                        $('#assign_head_unit').hide();
                        $('#review_requistion_FA').hide();
                        $('#Assign_procurement_officer').hide();
                        $('#Assigned_requistions').hide();
                        $('#recommended_requistions').hide();
                        $('#review_requistion_planned').hide();
                        $('#review_requistion_not_planned').hide();
                        $('#review_requistion_director_hr').hide();
                        $('#asg_finance').hide();
                        $('#requistion_asg').hide();

                        // Master_data menu
                        $('#master_data_menu').hide();
                        $('#view_master_data').hide();
                        $('#view_master_code').hide();
                        // User data menu
                        $('#user_data_menu').hide();
                        $('#admin_register').hide();
                        $('#add_user_role').hide();
                        $('#view_user').hide();
                        // User previledges menu
                        $('#user_previledges_menu').hide();
                        $('#user_rights_previledges').hide();
                        $('#assign_user_previledges').hide();
                        $('#add_new_user_rights').hide();


                    }
                    else {
                        // Supplier menu.
                        $('#supplier_menu').hide();
                        // Procurement Plan.
                        $('#procurement_menu').hide();
                        // Requistioning menu.
                        $('#requsition_menu').hide();
                        $('#spv').hide();
                        $('#start_requistioning').hide();
                        $('#assign_requistion_role').hide();
                        $('#assign_head_unit').hide();
                        $('#review_requistion').hide();
                        $('#review_requistion_FA').hide();
                       

                        // Master_data menu
                        $('#master_data_menu').hide();
                        $('#view_master_data').hide();
                        $('#view_master_code').hide();
                        // User data menu
                        $('#user_data_menu').hide();
                        $('#admin_register').hide();
                        $('#add_user_role').hide();
                        $('#view_user').hide();
                        // User previledges menu
                        $('#user_previledges_menu').hide();
                        $('#user_rights_previledges').hide();
                        $('#assign_user_previledges').hide();
                        $('#add_new_user_rights').hide();

                    }
                }

                else if(data.admin_role == 'Head of project/unit/division')
                {
                    if (data.originator_status == 'display') {
                        // Dashboard menu.
                        $('#dashboard_menu').hide();

                         // Supplier menu.
                        $('#supplier_menu').hide();

                         // Procurement plan menu.
                        $('#procurement_menu').hide();

                        // Requistioning menu.
                        $('#spv').hide();
                        $('#assign_requistion_role').hide();
                        $('#assign_head_unit').hide();
                        $('#start_requistioning').hide();
                        $('#review_requistion_FA').hide();
                        $('#Assign_procurement_officer').hide();
                        $('#Assigned_requistions').hide();
                        $('#recommended_requistions').hide();
                        $('#review_requistion_director_hr').hide();
                        $('#asg_finance').hide();
                        $('#requistion_asg').hide();



                        // Master_data menu
                        $('#master_data_menu').hide();
                        $('#view_master_data').hide();
                        $('#view_master_code').hide();
                        // User data menu
                        $('#user_data_menu').hide();
                        $('#admin_register').hide();
                        $('#add_user_role').hide();
                        $('#view_user').hide();
                        // User previledges menu
                        $('#user_previledges_menu').hide();
                        $('#user_rights_previledges').hide();
                        $('#assign_user_previledges').hide();
                        $('#add_new_user_rights').hide();

                    }

                    else {
                         // Dashboard menu.
                         $('#dashboard_menu').hide();
                         
                        // Supplier menu.
                        $('#supplier_menu').hide();
                        // Procurement Plan.
                        $('#procurement_menu').hide();

                        // Requistioning menu.
                        $('#requsition_menu').hide();
                        $('#spv').hide();
                        $('#start_requistioning').hide();
                        $('#assign_requistion_role').hide();
                        $('#assign_head_unit').hide();
                        $('#review_requistion_FA').hide();



                        // Master_data menu
                        $('#master_data_menu').hide();
                        $('#view_master_data').hide();
                        $('#view_master_code').hide();
                        // User data menu
                        $('#user_data_menu').hide();
                        $('#admin_register').hide();
                        $('#add_user_role').hide();
                        $('#view_user').hide();
                        // User previledges menu
                        $('#user_previledges_menu').hide();
                        $('#user_rights_previledges').hide();
                        $('#assign_user_previledges').hide();
                        $('#add_new_user_rights').hide();

                    }
                }
                else if(data.admin_role == 'Finance Accountant')
                {
                    if (data.originator_status == 'display') {
                        // Dashboard menu.
                        $('#dashboard_menu').hide();

                         // Supplier menu.
                        $('#supplier_menu').hide();

                         // Procurement plan menu.
                        $('#procurement_menu').hide();

                        // Requistioning menu.
                        $('#spv').hide();
                        $('#assign_requistion_role').hide();
                        $('#assign_head_unit').hide();
                        $('#start_requistioning').hide();
                        $('#Assign_procurement_officer').hide();
                        $('#Assigned_requistions').hide();
                        $('#recommended_requistions').hide();
                        $('#review_requistion_director_hr').hide();
                        $('#asg_finance').hide();
                        $('#requistion_asg').hide();
                        $('#review_requistion_planned').hide();
                        $('#review_requistion_not_planned').hide();


                        // Master_data menu
                        $('#master_data_menu').hide();
                        $('#view_master_data').hide();
                        $('#view_master_code').hide();
                        // User data menu
                        $('#user_data_menu').hide();
                        $('#admin_register').hide();
                        $('#add_user_role').hide();
                        $('#view_user').hide();
                        // User previledges menu
                        $('#user_previledges_menu').hide();
                        $('#user_rights_previledges').hide();
                        $('#assign_user_previledges').hide();
                        $('#add_new_user_rights').hide();

                    }

                    else {
                         // Dashboard menu.
                         $('#dashboard_menu').hide();
                         
                        // Supplier menu.
                        $('#supplier_menu').hide();
                        // Procurement Plan.
                        $('#procurement_menu').hide();

                        // Requistioning menu.
                        $('#requistioning').hide();
                        $('#requsition_menu').hide();
                        $('#review_requistion').hide();

                        $('#spv').hide();
                        $('#start_requistioning').hide();
                        $('#assign_requistion_role').hide();
                        $('#assign_head_unit').hide();


                        // Master_data menu
                        $('#master_data_menu').hide();
                        $('#view_master_data').hide();
                        $('#view_master_code').hide();
                        // User data menu
                        $('#user_data_menu').hide();
                        $('#admin_register').hide();
                        $('#add_user_role').hide();
                        $('#view_user').hide();
                        // User previledges menu
                        $('#user_previledges_menu').hide();
                        $('#user_rights_previledges').hide();
                        $('#assign_user_previledges').hide();
                        $('#add_new_user_rights').hide();

                    }
                }
                else if(data.admin_role == 'Director HR')
                {
                    if (data.originator_status == 'display') {
                        // Dashboard menu.
                        $('#dashboard_menu').hide();

                         // Supplier menu.
                        $('#supplier_menu').hide();

                         // Procurement plan menu.
                        $('#procurement_menu').show();
                        $('#procurement_upload').hide();
                        $('#disable_procurement_plan').hide();
                        $('#view_timelines').hide();
                        $('#timelines').hide();
                        $('#assign_approvale_officer').hide();

                        // Requistioning menu.
                        $('#requsition_menu').show();
                        $('#review_requistion').hide();
                        $('#spv').hide();
                        $('#assign_requistion_role').hide();
                        $('#assign_head_unit').hide();
                        $('#start_requistioning').hide();
                        $('#review_requistion_FA').hide();
                        $('#Assign_procurement_officer').hide();
                        $('#Assigned_requistions').hide();
                        $('#recommended_requistions').hide();
                        $('#review_requistion_planned').hide();
                        $('#review_requistion_not_planned').hide();
                        $('#asg_finance').hide();
                        $('#requistion_asg').hide();

                        // Master_data menu
                        $('#master_data_menu').hide();
                        $('#view_master_data').hide();
                        $('#view_master_code').hide();
                        // User data menu
                        $('#user_data_menu').hide();
                        $('#admin_register').hide();
                        $('#add_user_role').hide();
                        $('#view_user').hide();
                        // User previledges menu
                        $('#user_previledges_menu').hide();
                        $('#user_rights_previledges').hide();
                        $('#assign_user_previledges').hide();
                        $('#add_new_user_rights').hide();

                    }

                    else {
                         // Dashboard menu.
                         $('#dashboard_menu').hide();
                         
                        // Supplier menu.
                        $('#supplier_menu').hide();
                        // Procurement Plan.
                        $('#procurement_menu').hide();

                        // Requistioning menu.
                        $('#requistioning').hide();
                        $('#requsition_menu').hide();
                        $('#review_requistion').hide();

                        $('#spv').hide();
                        $('#start_requistioning').hide();
                        $('#assign_requistion_role').hide();
                        $('#assign_head_unit').hide();


                        // Master_data menu
                        $('#master_data_menu').hide();
                        $('#view_master_data').hide();
                        $('#view_master_code').hide();
                        // User data menu
                        $('#user_data_menu').hide();
                        $('#admin_register').hide();
                        $('#add_user_role').hide();
                        $('#view_user').hide();
                        // User previledges menu
                        $('#user_previledges_menu').hide();
                        $('#user_rights_previledges').hide();
                        $('#assign_user_previledges').hide();
                        $('#add_new_user_rights').hide();

                    }
                }
                else if(data.admin_role == 'ASG Finance')
                {
                    if (data.originator_status == 'display') {
                        // Dashboard menu.
                        $('#dashboard_menu').hide();

                         // Supplier menu.
                        $('#supplier_menu').hide();

                         // Procurement plan menu.
                        $('#procurement_menu').show();
                        $('#procurement_upload').hide();
                        $('#disable_procurement_plan').hide();
                        $('#view_timelines').hide();
                        $('#timelines').hide();
                        $('#assign_approvale_officer').hide();

                        // Requistioning menu.
                        $('#requsition_menu').show();
                        $('#review_requistion').hide();
                        $('#spv').hide();
                        $('#assign_requistion_role').hide();
                        $('#assign_head_unit').hide();
                        $('#start_requistioning').hide();
                        $('#review_requistion_FA').hide();
                        $('#Assign_procurement_officer').hide();
                        $('#Assigned_requistions').hide();
                        $('#recommended_requistions').hide();
                        $('#review_requistion_planned').hide();
                        $('#review_requistion_not_planned').hide();
                        $('#review_requistion_director_hr').hide();
                        $('#requistion_asg').hide();


                        // Master_data menu
                        $('#master_data_menu').hide();
                        $('#view_master_data').hide();
                        $('#view_master_code').hide();
                        // User data menu
                        $('#user_data_menu').hide();
                        $('#admin_register').hide();
                        $('#add_user_role').hide();
                        $('#view_user').hide();
                        // User previledges menu
                        $('#user_previledges_menu').hide();
                        $('#user_rights_previledges').hide();
                        $('#assign_user_previledges').hide();
                        $('#add_new_user_rights').hide();

                    }

                    else {
                         // Dashboard menu.
                         $('#dashboard_menu').hide();
                         
                        // Supplier menu.
                        $('#supplier_menu').hide();
                        // Procurement Plan.
                        $('#procurement_menu').hide();

                        // Requistioning menu.
                        $('#requistioning').hide();
                        $('#requsition_menu').hide();
                        $('#review_requistion').hide();

                        $('#spv').hide();
                        $('#start_requistioning').hide();
                        $('#assign_requistion_role').hide();
                        $('#assign_head_unit').hide();


                        // Master_data menu
                        $('#master_data_menu').hide();
                        $('#view_master_data').hide();
                        $('#view_master_code').hide();
                        // User data menu
                        $('#user_data_menu').hide();
                        $('#admin_register').hide();
                        $('#add_user_role').hide();
                        $('#view_user').hide();
                        // User previledges menu
                        $('#user_previledges_menu').hide();
                        $('#user_rights_previledges').hide();
                        $('#assign_user_previledges').hide();
                        $('#add_new_user_rights').hide();

                    }
                }
                else if(data.admin_role == 'SG')
                {
                    if (data.originator_status == 'display') {
                        // Dashboard menu.
                        $('#dashboard_menu').hide();

                         // Supplier menu.
                        $('#supplier_menu').hide();

                         // Procurement plan menu.
                        $('#procurement_menu').show();
                        $('#procurement_upload').hide();
                        $('#disable_procurement_plan').hide();
                        $('#view_timelines').hide();
                        $('#timelines').hide();
                        $('#assign_approvale_officer').hide();

                        // Requistioning menu.
                        $('#requsition_menu').show();
                        $('#review_requistion').hide();
                        $('#spv').hide();
                        $('#assign_requistion_role').hide();
                        $('#assign_head_unit').hide();
                        $('#start_requistioning').hide();
                        $('#review_requistion_FA').hide();
                        $('#Assign_procurement_officer').hide();
                        $('#Assigned_requistions').hide();
                        $('#recommended_requistions').hide();
                        $('#review_requistion_planned').hide();
                        $('#review_requistion_not_planned').hide();
                        $('#review_requistion_director_hr').hide();
                        $('#asg_finance').hide();

                        // Master_data menu
                        $('#master_data_menu').hide();
                        $('#view_master_data').hide();
                        $('#view_master_code').hide();
                        // User data menu
                        $('#user_data_menu').hide();
                        $('#admin_register').hide();
                        $('#add_user_role').hide();
                        $('#view_user').hide();
                        // User previledges menu
                        $('#user_previledges_menu').hide();
                        $('#user_rights_previledges').hide();
                        $('#assign_user_previledges').hide();
                        $('#add_new_user_rights').hide();

                    }

                    else {
                         // Dashboard menu.
                         $('#dashboard_menu').hide();
                         
                        // Supplier menu.
                        $('#supplier_menu').hide();
                        // Procurement Plan.
                        $('#procurement_menu').hide();

                        // Requistioning menu.
                        $('#requistioning').hide();
                        $('#requsition_menu').hide();
                        $('#review_requistion').hide();

                        $('#spv').hide();
                        $('#start_requistioning').hide();
                        $('#assign_requistion_role').hide();
                        $('#assign_head_unit').hide();


                        // Master_data menu
                        $('#master_data_menu').hide();
                        $('#view_master_data').hide();
                        $('#view_master_code').hide();
                        // User data menu
                        $('#user_data_menu').hide();
                        $('#admin_register').hide();
                        $('#add_user_role').hide();
                        $('#view_user').hide();
                        // User previledges menu
                        $('#user_previledges_menu').hide();
                        $('#user_rights_previledges').hide();
                        $('#assign_user_previledges').hide();
                        $('#add_new_user_rights').hide();

                    }
                }
                // else if(data.admin_role == 'Head of Procurement')
                // {
                //     if (data.originator_status == 'display') {
                //         // Dashboard menu.
                //         $('#dashboard_menu').hide();

                //          // Supplier menu.
                //         $('#supplier_menu').hide();

                //          // Procurement plan menu.
                //         $('#procurement_menu').hide();

                //         // Requistioning menu.
                //         $('#requsition_menu').show();
                //         $('#review_requistion').hide();
                //         $('#spv').hide();
                //         $('#assign_requistion_role').hide();
                //         $('#assign_head_unit').hide();
                //         $('#start_requistioning').hide();


                //         // Master_data menu
                //         $('#master_data_menu').hide();
                //         $('#view_master_data').hide();
                //         $('#view_master_code').hide();
                //         // User data menu
                //         $('#user_data_menu').hide();
                //         $('#admin_register').hide();
                //         $('#add_user_role').hide();
                //         $('#view_user').hide();
                //         // User previledges menu
                //         $('#user_previledges_menu').hide();
                //         $('#user_rights_previledges').hide();
                //         $('#assign_user_previledges').hide();
                //         $('#add_new_user_rights').hide();

                //     }

                //     else {
                //          // Dashboard menu.
                //          $('#dashboard_menu').hide();
                         
                //         // Supplier menu.
                //         $('#supplier_menu').hide();
                //         // Procurement Plan.
                //         $('#procurement_menu').hide();

                //         // Requistioning menu.
                //         $('#requistioning').hide();
                //         $('#requsition_menu').hide();
                //         $('#review_requistion').hide();

                //         $('#spv').hide();
                //         $('#start_requistioning').hide();
                //         $('#assign_requistion_role').hide();
                //         $('#assign_head_unit').hide();


                //         // Master_data menu
                //         $('#master_data_menu').hide();
                //         $('#view_master_data').hide();
                //         $('#view_master_code').hide();
                //         // User data menu
                //         $('#user_data_menu').hide();
                //         $('#admin_register').hide();
                //         $('#add_user_role').hide();
                //         $('#view_user').hide();
                //         // User previledges menu
                //         $('#user_previledges_menu').hide();
                //         $('#user_rights_previledges').hide();
                //         $('#assign_user_previledges').hide();
                //         $('#add_new_user_rights').hide();

                //     }
                // }
            }
        },
        error: function (data) {
            $('body').html(data.responseText);
        }
    });
});