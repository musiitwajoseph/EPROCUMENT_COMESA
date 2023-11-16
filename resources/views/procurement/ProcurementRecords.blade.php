<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>COMESA ADMIN DASHBOARD </title>

    <!-- Bootstrap framework -->
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css" />
    <!-- jQuery UI theme -->
    <link rel="stylesheet" href="/assets/lib/jquery-ui/css/Aristo/Aristo.css" />
    <!-- breadcrumbs -->
    <link rel="stylesheet" href="/assets/lib/jBreadcrumbs/css/BreadCrumb.css" />
    <!-- tooltips-->
    <link rel="stylesheet" href="/assets/lib/qtip2/jquery.qtip.min.css" />
    <!-- colorbox -->
    <link rel="stylesheet" href="/assets/lib/colorbox/colorbox.css" />
    <!-- code prettify -->
    <link rel="stylesheet" href="/assets/lib/google-code-prettify/prettify.css" />
    <!-- sticky notifications -->
    <link rel="stylesheet" href="/assets/lib/sticky/sticky.css" />
    <!-- aditional icons -->
    <link rel="stylesheet" href="/assets/img/splashy/splashy.css" />
    <!-- flags -->
    <link rel="stylesheet" href="/assets/img/flags/flags.css" />
    <!-- datatables -->
    <link rel="stylesheet" href="/assets/lib/datatables/extras/TableTools/media/css/TableTools.css">

    <!-- font-awesome -->
    <link rel="stylesheet" href="/assets/img/font-awesome/css/font-awesome.min.css" />
    <!-- calendar -->
    <link rel="stylesheet" href="/assets/lib/fullcalendar/fullcalendar_gebo.css" />

    <!-- main styles -->
    <link rel="stylesheet" href="/assets/css/style.css" />
    <!-- theme color-->
    <link rel="stylesheet" href="/assets/css/blue.css" id="link_theme" />

    <link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>

    <!-- favicon -->
    <link rel="shortcut icon" href="/assets/favicon.ico" />
    
</head>

<body class="full_width">
    
    <div id="maincontainer" class="clearfix">

        <header>

            {{-- @include('includes.TopNavTest'); --}}


            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="navbar-inner">
                    <div class="container-fluid">
                        <a class="brand pull-left" href="{{ route('admin-dashboard') }}">COMESA :: EPROCUREMENT</a>

                        <ul class="nav navbar-nav user_menu pull-right">


                            <li class="divider-vertical hidden-sm hidden-xs"></li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img
                                        src="/assets/img/user_avatar.png" alt=""
                                        class="user_avatar">{{ $LoggedUserAdmin['username'] }}<b
                                        class="caret"></b></a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="javascript:void(0);">My Profile</a></li>
                                    <li class="divider"></li>
                                    <li><a href="{{ route('admin-logout') }}">Log Out</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>



        </header>
        <div id="contentwrapper">
            <div class="main_content">

                <div id="jCrumbs" class="breadCrumb module">
                    <ul>
                        <li>
                            <a href="javascript:void(0);"><i class="glyphicon glyphicon-home"></i></a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">Admin Dashboard</a>
                        </li>
                    </ul>
                </div>


                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <h2 class="heading" style="color: blue">Procurement Plan {{$year}}</h2>

                
                        <section id="Approved_suppliers">
                            <h3 class="heading" style="color: rgb(26, 239, 54)">SPR TABLE</h3>

                            <div class="table-responsive">

                            <table class="table table-bordered table-striped" id="smpl_tbl">
                                <thead>
                                    <tr>
                                        <th>Crt.No. </th>
                                        <th>Description of Goods/Works & Services</th>
                                        <th>Category of Procurement</th>
                                        <th>Qty</th>
                                        <th>Unit of Measure</th>
                                        <th>Procurement Method</th>
                                        <th>Type of Contract</th>
                                        <th>Years in Business</th>
                                        <th>Allocated Amount</th>
                                        <th>Currency</th>
                                        <th>Procuring Unit</th>
                                        <th>Requisition Unit</th>
                                        <th>End user Requisition Date</th>
                                        <th colspan="2">Technical Requirements</th>
                                        <th colspan="2">Publication of Tender Documents</th>
                                        <th>Tender Openning</th>
                                        <th colspan="2">Tender Evaluation / Shortlisting Report</th>
                                        <th>Short List Notice Publication</th>
                                        <th colspan="2">Invitation to Shortlisted Firms to Submit Proposals </th>
                                        <th colspan="2">Evaluation of Bids under Shortlist Method</th>
                                        <th>Purchase / Contracts Committee Approval</th>
                                        <th colspan="2">Secretary General (SGs) Approval of PC /CC Reports</th>
                                        <th colspan="4">Contract Vetting</th>
                                        <th>SG/ASG(A&F)/ DHRA Approval</th>
                                        <th>Contract Signing Date</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($spr_table as $item)
                                        <tr>
                                            <td>{{ $item->crt_no }}</td>
                                            <td>{{ $item->description_of_goods_works_and_services }}</td>
                                            <td>{{ $item->category_of_procurement}}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{{ $item->unit_of_measure}}</td>
                                            <td>{{ $item->Procurement_method }}</td>
                                            <td>{{ $item->type_of_contract }}</td>
                                            <td>{{ $item->allocated_amount }}</td>
                                            <td>{{ $item->currency }}</td>
                                            <td>{{ $item->source_of_funding }}</td>
                                            <td>{{ $item->procuring_unit }}</td>
                                            <td>{{ $item->requisition_unit }}</td>
                                            <td>{{ $item->end_user_requisition_date }}</td>                                           
                                            <td>{{$item->technical_requirements_receipt_of_final_technical_requirements_date}}</td>
                                            <td>{{$item->technical_requirements_preparation_of_tender_document}}</td>
                                            <td>{{$item->publication_of_tender_documents_publication_date}}</td>
                                            <td>{{ $item->publication_of_tender_documents_closing_date }}</td>  
                                            <td>{{$item->tender_openning}}</td>
                                            <td>{{$item->tender_evaluation_shortlisting_report_start_date}}</td>
                                            <td>{{$item->tender_evaluation_shortlisting_Report_end_date}}</td>
                                            <td>{{$item->short_list_notice_publication}}</td>
                                            <td>{{$item->invitation_to_shortlisted_firms_to_submit_proposals_invitation_date}}</td>
                                            <td>{{$item->invitation_to_shortlisted_firms_to_submit_proposals_closing_date}}</td>
                                            <td>{{$item->evaluation_of_bids_under_shortlist_method_start_date}}</td>
                                            <td>{{$item->evaluation_of_bids_under_shortlist_method_end_date}}</td>
                                            <td>{{$item->purchase_contracts_committee_approval}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_submission_date}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_approval_date}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_approval_date}}</td>
                                            <td>{{$item->contract_vetting_submission_date}}</td>
                                            <td>{{$item->contract_vetting_approval_date}}</td>
                                            <td>{{$item->contract_amount}}</td>
                                            <td>{{$item->sg_asg_a_and_f_dhra_approval}}</td>
                                            <td>{{$item->contract_signing_date}}</td>

                                           
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            </div>
                          

                            <style>
                                .w-5 {
                                    display: none;
                                }
                            </style>

                        </section>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-12">

                        <section id="Approved_suppliers">
                            <h3 class="heading" style="color: rgb(26, 239, 54)">INFRASTRUCTURE DIVISION TABLE</h3>

                            <div class="table-responsive">

                            <table class="table table-bordered table-striped" id="smpl_tbl">
                                <thead>
                                    <tr>
                                        <th>Crt.No. </th>
                                        <th>Description of Goods/Works & Services</th>
                                        <th>Category of Procurement</th>
                                        <th>Qty</th>
                                        <th>Unit of Measure</th>
                                        <th>Procurement Method</th>
                                        <th>Type of Contract</th>
                                        <th>Years in Business</th>
                                        <th>Allocated Amount</th>
                                        <th>Currency</th>
                                        <th>Procuring Unit</th>
                                        <th>Requisition Unit</th>
                                        <th>End user Requisition Date</th>
                                        <th colspan="2">Technical Requirements</th>
                                        <th colspan="2">Publication of Tender Documents</th>
                                        <th>Tender Openning</th>
                                        <th colspan="2">Tender Evaluation / Shortlisting Report</th>
                                        <th>Short List Notice Publication</th>
                                        <th colspan="2">Invitation to Shortlisted Firms to Submit Proposals </th>
                                        <th colspan="2">Evaluation of Bids under Shortlist Method</th>
                                        <th>Purchase / Contracts Committee Approval</th>
                                        <th colspan="2">Secretary General (SGs) Approval of PC /CC Reports</th>
                                        <th colspan="3">Contract Vetting</th>
                                        <th>SG/ASG(A&F)/ DHRA Approval</th>
                                        <th>Contract Signing Date</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($infrastructure as $item)
                                        <tr>
                                            <td>{{ $item->crt_no }}</td>
                                            <td>{{ $item->description_of_goods_works_and_services }}</td>
                                            <td>{{ $item->category_of_procurement}}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{{ $item->unit_of_measure}}</td>
                                            <td>{{ $item->Procurement_method }}</td>
                                            <td>{{ $item->type_of_contract }}</td>
                                            <td>{{ $item->allocated_amount }}</td>
                                            <td>{{ $item->currency }}</td>
                                            <td>{{ $item->source_of_funding }}</td>
                                            <td>{{ $item->procuring_unit }}</td>
                                            <td>{{ $item->requisition_unit }}</td>
                                            <td>{{ $item->end_user_requisition_date }}</td>                                           
                                            <td>{{$item->technical_requirements_receipt_of_final_technical_requirements_date}}</td>
                                            <td>{{$item->technical_requirements_preparation_of_tender_document}}</td>
                                            <td>{{$item->publication_of_tender_documents_publication_date}}</td>
                                            <td>{{ $item->publication_of_tender_documents_closing_date }}</td>  
                                            <td>{{$item->tender_openning}}</td>
                                            <td>{{$item->tender_evaluation_shortlisting_report_start_date}}</td>
                                            <td>{{$item->tender_evaluation_shortlisting_Report_end_date}}</td>
                                            <td>{{$item->short_list_notice_publication}}</td>
                                            <td>{{$item->invitation_to_shortlisted_firms_to_submit_proposals_invitation_date}}</td>
                                            <td>{{$item->invitation_to_shortlisted_firms_to_submit_proposals_closing_date}}</td>
                                            <td>{{$item->evaluation_of_bids_under_shortlist_method_start_date}}</td>
                                            <td>{{$item->evaluation_of_bids_under_shortlist_method_end_date}}</td>
                                            <td>{{$item->purchase_contracts_committee_approval}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_submission_date}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_approval_date}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_approval_date}}</td>
                                            <td>{{$item->contract_vetting_submission_date}}</td>
                                            <td>{{$item->contract_vetting_approval_date}}</td>
                                            <td>{{$item->contract_amount}}</td>
                                            <td>{{$item->sg_asg_a_and_f_dhra_approval}}</td>
                                            <td>{{$item->contract_signing_date}}</td>

                                           
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            </div>
                          

                            <style>
                                .w-5 {
                                    display: none;
                                }
                            </style>

                        </section>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-12">

                        <section id="Approved_suppliers">
                            <h3 class="heading" style="color: rgb(26, 239, 54)">SATSD TABLE</h3>

                            <div class="table-responsive">

                            <table class="table table-bordered table-striped" id="smpl_tbl">
                                <thead>
                                    <tr>
                                        <th>Crt.No. </th>
                                        <th>Description of Goods/Works & Services</th>
                                        <th>Category of Procurement</th>
                                        <th>Qty</th>
                                        <th>Unit of Measure</th>
                                        <th>Procurement Method</th>
                                        <th>Type of Contract</th>
                                        <th>Years in Business</th>
                                        <th>Allocated Amount</th>
                                        <th>Currency</th>
                                        <th>Procuring Unit</th>
                                        <th>Requisition Unit</th>
                                        <th>End user Requisition Date</th>
                                        <th colspan="2">Technical Requirements</th>
                                        <th colspan="2">Publication of Tender Documents</th>
                                        <th>Tender Openning</th>
                                        <th colspan="2">Tender Evaluation / Shortlisting Report</th>
                                        <th>Short List Notice Publication</th>
                                        <th colspan="2">Invitation to Shortlisted Firms to Submit Proposals </th>
                                        <th colspan="2">Evaluation of Bids under Shortlist Method</th>
                                        <th>Purchase / Contracts Committee Approval</th>
                                        <th colspan="2">Secretary General (SGs) Approval of PC /CC Reports</th>
                                        <th colspan="4">Contract Vetting</th>
                                        <th>SG/ASG(A&F)/ DHRA Approval</th>
                                        <th>Contract Signing Date</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($SATSD as $item)
                                        <tr>
                                            <td>{{ $item->crt_no }}</td>
                                            <td>{{ $item->description_of_goods_works_and_services }}</td>
                                            <td>{{ $item->category_of_procurement}}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{{ $item->unit_of_measure}}</td>
                                            <td>{{ $item->Procurement_method }}</td>
                                            <td>{{ $item->type_of_contract }}</td>
                                            <td>{{ $item->allocated_amount }}</td>
                                            <td>{{ $item->currency }}</td>
                                            <td>{{ $item->source_of_funding }}</td>
                                            <td>{{ $item->procuring_unit }}</td>
                                            <td>{{ $item->requisition_unit }}</td>
                                            <td>{{ $item->end_user_requisition_date }}</td>                                           
                                            <td>{{$item->technical_requirements_receipt_of_final_technical_requirements_date}}</td>
                                            <td>{{$item->technical_requirements_preparation_of_tender_document}}</td>
                                            <td>{{$item->publication_of_tender_documents_publication_date}}</td>
                                            <td>{{ $item->publication_of_tender_documents_closing_date }}</td>  
                                            <td>{{$item->tender_openning}}</td>
                                            <td>{{$item->tender_evaluation_shortlisting_report_start_date}}</td>
                                            <td>{{$item->tender_evaluation_shortlisting_Report_end_date}}</td>
                                            <td>{{$item->short_list_notice_publication}}</td>
                                            <td>{{$item->invitation_to_shortlisted_firms_to_submit_proposals_invitation_date}}</td>
                                            <td>{{$item->invitation_to_shortlisted_firms_to_submit_proposals_closing_date}}</td>
                                            <td>{{$item->evaluation_of_bids_under_shortlist_method_start_date}}</td>
                                            <td>{{$item->evaluation_of_bids_under_shortlist_method_end_date}}</td>
                                            <td>{{$item->purchase_contracts_committee_approval}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_submission_date}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_approval_date}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_approval_date}}</td>
                                            <td>{{$item->contract_vetting_submission_date}}</td>
                                            <td>{{$item->contract_vetting_approval_date}}</td>
                                            <td>{{$item->contract_amount}}</td>
                                            <td>{{$item->sg_asg_a_and_f_dhra_approval}}</td>
                                            <td>{{$item->contract_signing_date}}</td>

                                           
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            </div>
                          

                            <style>
                                .w-5 {
                                    display: none;
                                }
                            </style>

                        </section>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-12">

                        <section id="Approved_suppliers">
                            <h3 class="heading" style="color: rgb(26, 239, 54)">RIFF PROJECT TABLE</h3>

                            <div class="table-responsive">

                            <table class="table table-bordered table-striped" id="smpl_tbl">
                                <thead>
                                    <tr>
                                        <th>Crt.No. </th>
                                        <th>Description of Goods/Works & Services</th>
                                        <th>Category of Procurement</th>
                                        <th>Qty</th>
                                        <th>Unit of Measure</th>
                                        <th>Procurement Method</th>
                                        <th>Type of Contract</th>
                                        <th>Years in Business</th>
                                        <th>Allocated Amount</th>
                                        <th>Currency</th>
                                        <th>Procuring Unit</th>
                                        <th>Requisition Unit</th>
                                        <th>End user Requisition Date</th>
                                        <th colspan="2">Technical Requirements</th>
                                        <th colspan="2">Publication of Tender Documents</th>
                                        <th>Tender Openning</th>
                                        <th colspan="2">Tender Evaluation / Shortlisting Report</th>
                                        <th>Short List Notice Publication</th>
                                        <th colspan="2">Invitation to Shortlisted Firms to Submit Proposals </th>
                                        <th colspan="2">Evaluation of Bids under Shortlist Method</th>
                                        <th>Purchase / Contracts Committee Approval</th>
                                        <th colspan="2">Secretary General (SGs) Approval of PC /CC Reports</th>
                                        <th colspan="4">Contract Vetting</th>
                                        <th>SG/ASG(A&F)/ DHRA Approval</th>
                                        <th>Contract Signing Date</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($RIFF as $item)
                                        <tr>
                                            <td>{{ $item->crt_no }}</td>
                                            <td>{{ $item->description_of_goods_works_and_services }}</td>
                                            <td>{{ $item->category_of_procurement}}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{{ $item->unit_of_measure}}</td>
                                            <td>{{ $item->Procurement_method }}</td>
                                            <td>{{ $item->type_of_contract }}</td>
                                            <td>{{ $item->allocated_amount }}</td>
                                            <td>{{ $item->currency }}</td>
                                            <td>{{ $item->source_of_funding }}</td>
                                            <td>{{ $item->procuring_unit }}</td>
                                            <td>{{ $item->requisition_unit }}</td>
                                            <td>{{ $item->end_user_requisition_date }}</td>                                           
                                            <td>{{$item->technical_requirements_receipt_of_final_technical_requirements_date}}</td>
                                            <td>{{$item->technical_requirements_preparation_of_tender_document}}</td>
                                            <td>{{$item->publication_of_tender_documents_publication_date}}</td>
                                            <td>{{ $item->publication_of_tender_documents_closing_date }}</td>  
                                            <td>{{$item->tender_openning}}</td>
                                            <td>{{$item->tender_evaluation_shortlisting_report_start_date}}</td>
                                            <td>{{$item->tender_evaluation_shortlisting_Report_end_date}}</td>
                                            <td>{{$item->short_list_notice_publication}}</td>
                                            <td>{{$item->invitation_to_shortlisted_firms_to_submit_proposals_invitation_date}}</td>
                                            <td>{{$item->invitation_to_shortlisted_firms_to_submit_proposals_closing_date}}</td>
                                            <td>{{$item->evaluation_of_bids_under_shortlist_method_start_date}}</td>
                                            <td>{{$item->evaluation_of_bids_under_shortlist_method_end_date}}</td>
                                            <td>{{$item->purchase_contracts_committee_approval}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_submission_date}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_approval_date}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_approval_date}}</td>
                                            <td>{{$item->contract_vetting_submission_date}}</td>
                                            <td>{{$item->contract_vetting_approval_date}}</td>
                                            <td>{{$item->contract_amount}}</td>
                                            <td>{{$item->sg_asg_a_and_f_dhra_approval}}</td>
                                            <td>{{$item->contract_signing_date}}</td>

                                           
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            </div>
                          

                            <style>
                                .w-5 {
                                    display: none;
                                }
                            </style>

                        </section>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-12">

                        <section id="Approved_suppliers">
                            <h3 class="heading" style="color: rgb(26, 239, 54)">CORPORATE COMMUNICATION UNIT TABLE</h3>

                            <div class="table-responsive">

                            <table class="table table-bordered table-striped" id="smpl_tbl">
                                <thead>
                                    <tr>
                                        <th>Crt.No. </th>
                                        <th>Description of Goods/Works & Services</th>
                                        <th>Category of Procurement</th>
                                        <th>Qty</th>
                                        <th>Unit of Measure</th>
                                        <th>Procurement Method</th>
                                        <th>Type of Contract</th>
                                        <th>Years in Business</th>
                                        <th>Allocated Amount</th>
                                        <th>Currency</th>
                                        <th>Procuring Unit</th>
                                        <th>Requisition Unit</th>
                                        <th>End user Requisition Date</th>
                                        <th colspan="2">Technical Requirements</th>
                                        <th colspan="2">Publication of Tender Documents</th>
                                        <th>Tender Openning</th>
                                        <th colspan="2">Tender Evaluation / Shortlisting Report</th>
                                        <th>Short List Notice Publication</th>
                                        <th colspan="2">Invitation to Shortlisted Firms to Submit Proposals </th>
                                        <th colspan="2">Evaluation of Bids under Shortlist Method</th>
                                        <th>Purchase / Contracts Committee Approval</th>
                                        <th colspan="2">Secretary General (SGs) Approval of PC /CC Reports</th>
                                        <th colspan="4">Contract Vetting</th>
                                        <th>SG/ASG(A&F)/ DHRA Approval</th>
                                        <th>Contract Signing Date</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($CORPORATE_COMMUNICATION as $item)
                                        <tr>
                                            <td>{{ $item->crt_no }}</td>
                                            <td>{{ $item->description_of_goods_works_and_services }}</td>
                                            <td>{{ $item->category_of_procurement}}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{{ $item->unit_of_measure}}</td>
                                            <td>{{ $item->Procurement_method }}</td>
                                            <td>{{ $item->type_of_contract }}</td>
                                            <td>{{ $item->allocated_amount }}</td>
                                            <td>{{ $item->currency }}</td>
                                            <td>{{ $item->source_of_funding }}</td>
                                            <td>{{ $item->procuring_unit }}</td>
                                            <td>{{ $item->requisition_unit }}</td>
                                            <td>{{ $item->end_user_requisition_date }}</td>                                           
                                            <td>{{$item->technical_requirements_receipt_of_final_technical_requirements_date}}</td>
                                            <td>{{$item->technical_requirements_preparation_of_tender_document}}</td>
                                            <td>{{$item->publication_of_tender_documents_publication_date}}</td>
                                            <td>{{ $item->publication_of_tender_documents_closing_date }}</td>  
                                            <td>{{$item->tender_openning}}</td>
                                            <td>{{$item->tender_evaluation_shortlisting_report_start_date}}</td>
                                            <td>{{$item->tender_evaluation_shortlisting_Report_end_date}}</td>
                                            <td>{{$item->short_list_notice_publication}}</td>
                                            <td>{{$item->invitation_to_shortlisted_firms_to_submit_proposals_invitation_date}}</td>
                                            <td>{{$item->invitation_to_shortlisted_firms_to_submit_proposals_closing_date}}</td>
                                            <td>{{$item->evaluation_of_bids_under_shortlist_method_start_date}}</td>
                                            <td>{{$item->evaluation_of_bids_under_shortlist_method_end_date}}</td>
                                            <td>{{$item->purchase_contracts_committee_approval}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_submission_date}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_approval_date}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_approval_date}}</td>
                                            <td>{{$item->contract_vetting_submission_date}}</td>
                                            <td>{{$item->contract_vetting_approval_date}}</td>
                                            <td>{{$item->contract_amount}}</td>
                                            <td>{{$item->sg_asg_a_and_f_dhra_approval}}</td>
                                            <td>{{$item->contract_signing_date}}</td>

                                           
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            </div>
                          

                            <style>
                                .w-5 {
                                    display: none;
                                }
                            </style>

                        </section>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-12">

                        <section id="Approved_suppliers">
                            <h3 class="heading" style="color: rgb(26, 239, 54)">LEGAL DIVISION TABLE</h3>

                            <div class="table-responsive">

                            <table class="table table-bordered table-striped" id="smpl_tbl">
                                <thead>
                                    <tr>
                                        <th>Crt.No. </th>
                                        <th>Description of Goods/Works & Services</th>
                                        <th>Category of Procurement</th>
                                        <th>Qty</th>
                                        <th>Unit of Measure</th>
                                        <th>Procurement Method</th>
                                        <th>Type of Contract</th>
                                        <th>Years in Business</th>
                                        <th>Allocated Amount</th>
                                        <th>Currency</th>
                                        <th>Procuring Unit</th>
                                        <th>Requisition Unit</th>
                                        <th>End user Requisition Date</th>
                                        <th colspan="2">Technical Requirements</th>
                                        <th colspan="2">Publication of Tender Documents</th>
                                        <th>Tender Openning</th>
                                        <th colspan="2">Tender Evaluation / Shortlisting Report</th>
                                        <th>Short List Notice Publication</th>
                                        <th colspan="2">Invitation to Shortlisted Firms to Submit Proposals </th>
                                        <th colspan="2">Evaluation of Bids under Shortlist Method</th>
                                        <th>Purchase / Contracts Committee Approval</th>
                                        <th colspan="2">Secretary General (SGs) Approval of PC /CC Reports</th>
                                        <th colspan="3">Contract Vetting</th>
                                        <th>SG/ASG(A&F)/ DHRA Approval</th>
                                        <th>Contract Signing Date</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($LEGAL_DIVISION as $item)
                                        <tr>
                                            <td>{{ $item->crt_no }}</td>
                                            <td>{{ $item->description_of_goods_works_and_services }}</td>
                                            <td>{{ $item->category_of_procurement}}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{{ $item->unit_of_measure}}</td>
                                            <td>{{ $item->Procurement_method }}</td>
                                            <td>{{ $item->type_of_contract }}</td>
                                            <td>{{ $item->allocated_amount }}</td>
                                            <td>{{ $item->currency }}</td>
                                            <td>{{ $item->source_of_funding }}</td>
                                            <td>{{ $item->procuring_unit }}</td>
                                            <td>{{ $item->requisition_unit }}</td>
                                            <td>{{ $item->end_user_requisition_date }}</td>                                           
                                            <td>{{$item->technical_requirements_receipt_of_final_technical_requirements_date}}</td>
                                            <td>{{$item->technical_requirements_preparation_of_tender_document}}</td>
                                            <td>{{$item->publication_of_tender_documents_publication_date}}</td>
                                            <td>{{ $item->publication_of_tender_documents_closing_date }}</td>  
                                            <td>{{$item->tender_openning}}</td>
                                            <td>{{$item->tender_evaluation_shortlisting_report_start_date}}</td>
                                            <td>{{$item->tender_evaluation_shortlisting_Report_end_date}}</td>
                                            <td>{{$item->short_list_notice_publication}}</td>
                                            <td>{{$item->invitation_to_shortlisted_firms_to_submit_proposals_invitation_date}}</td>
                                            <td>{{$item->invitation_to_shortlisted_firms_to_submit_proposals_closing_date}}</td>
                                            <td>{{$item->evaluation_of_bids_under_shortlist_method_start_date}}</td>
                                            <td>{{$item->evaluation_of_bids_under_shortlist_method_end_date}}</td>
                                            <td>{{$item->purchase_contracts_committee_approval}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_submission_date}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_approval_date}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_approval_date}}</td>
                                            <td>{{$item->contract_vetting_submission_date}}</td>
                                            <td>{{$item->contract_vetting_approval_date}}</td>
                                            <td>{{$item->contract_amount}}</td>
                                            <td>{{$item->sg_asg_a_and_f_dhra_approval}}</td>
                                            <td>{{$item->contract_signing_date}}</td>

                                           
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            </div>
                          

                            <style>
                                .w-5 {
                                    display: none;
                                }
                            </style>

                        </section>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-12">

                        <section id="Approved_suppliers">
                            <h3 class="heading" style="color: rgb(26, 239, 54)">REARESA TABLE</h3>

                            <div class="table-responsive">

                            <table class="table table-bordered table-striped" id="smpl_tbl">
                                <thead>
                                    <tr>
                                        <th>Crt.No. </th>
                                        <th>Description of Goods/Works & Services</th>
                                        <th>Category of Procurement</th>
                                        <th>Qty</th>
                                        <th>Unit of Measure</th>
                                        <th>Procurement Method</th>
                                        <th>Type of Contract</th>
                                        <th>Years in Business</th>
                                        <th>Allocated Amount</th>
                                        <th>Currency</th>
                                        <th>Procuring Unit</th>
                                        <th>Requisition Unit</th>
                                        <th>End user Requisition Date</th>
                                        <th colspan="2">Technical Requirements</th>
                                        <th colspan="2">Publication of Tender Documents</th>
                                        <th>Tender Openning</th>
                                        <th colspan="2">Tender Evaluation / Shortlisting Report</th>
                                        <th>Short List Notice Publication</th>
                                        <th colspan="2">Invitation to Shortlisted Firms to Submit Proposals </th>
                                        <th colspan="2">Evaluation of Bids under Shortlist Method</th>
                                        <th>Purchase / Contracts Committee Approval</th>
                                        <th colspan="2">Secretary General (SGs) Approval of PC /CC Reports</th>
                                        <th colspan="3">Contract Vetting</th>
                                        <th>SG/ASG(A&F)/ DHRA Approval</th>
                                        <th>Contract Signing Date</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($REARESA as $item)
                                        <tr>
                                            <td>{{ $item->crt_no }}</td>
                                            <td>{{ $item->description_of_goods_works_and_services }}</td>
                                            <td>{{ $item->category_of_procurement}}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{{ $item->unit_of_measure}}</td>
                                            <td>{{ $item->Procurement_method }}</td>
                                            <td>{{ $item->type_of_contract }}</td>
                                            <td>{{ $item->allocated_amount }}</td>
                                            <td>{{ $item->currency }}</td>
                                            <td>{{ $item->source_of_funding }}</td>
                                            <td>{{ $item->procuring_unit }}</td>
                                            <td>{{ $item->requisition_unit }}</td>
                                            <td>{{ $item->end_user_requisition_date }}</td>                                           
                                            <td>{{$item->technical_requirements_receipt_of_final_technical_requirements_date}}</td>
                                            <td>{{$item->technical_requirements_preparation_of_tender_document}}</td>
                                            <td>{{$item->publication_of_tender_documents_publication_date}}</td>
                                            <td>{{ $item->publication_of_tender_documents_closing_date }}</td>  
                                            <td>{{$item->tender_openning}}</td>
                                            <td>{{$item->tender_evaluation_shortlisting_report_start_date}}</td>
                                            <td>{{$item->tender_evaluation_shortlisting_Report_end_date}}</td>
                                            <td>{{$item->short_list_notice_publication}}</td>
                                            <td>{{$item->invitation_to_shortlisted_firms_to_submit_proposals_invitation_date}}</td>
                                            <td>{{$item->invitation_to_shortlisted_firms_to_submit_proposals_closing_date}}</td>
                                            <td>{{$item->evaluation_of_bids_under_shortlist_method_start_date}}</td>
                                            <td>{{$item->evaluation_of_bids_under_shortlist_method_end_date}}</td>
                                            <td>{{$item->purchase_contracts_committee_approval}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_submission_date}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_approval_date}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_approval_date}}</td>
                                            <td>{{$item->contract_vetting_submission_date}}</td>
                                            <td>{{$item->contract_vetting_approval_date}}</td>
                                            <td>{{$item->contract_amount}}</td>
                                            <td>{{$item->sg_asg_a_and_f_dhra_approval}}</td>
                                            <td>{{$item->contract_signing_date}}</td>

                                           
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            </div>
                          

                            <style>
                                .w-5 {
                                    display: none;
                                }
                            </style>

                        </section>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-12 col-md-12">

                        <section id="Approved_suppliers">
                            <h3 class="heading" style="color: rgb(26, 239, 54)">BRUSSELS LIASON OFFICE (BLO) TABLE</h3>

                            <div class="table-responsive">

                            <table class="table table-bordered table-striped" id="smpl_tbl">
                                <thead>
                                    <tr>
                                        <th>Crt.No. </th>
                                        <th>Description of Goods/Works & Services</th>
                                        <th>Category of Procurement</th>
                                        <th>Qty</th>
                                        <th>Unit of Measure</th>
                                        <th>Procurement Method</th>
                                        <th>Type of Contract</th>
                                        <th>Years in Business</th>
                                        <th>Allocated Amount</th>
                                        <th>Currency</th>
                                        <th>Procuring Unit</th>
                                        <th>Requisition Unit</th>
                                        <th>End user Requisition Date</th>
                                        <th colspan="2">Technical Requirements</th>
                                        <th colspan="2">Publication of Tender Documents</th>
                                        <th>Tender Openning</th>
                                        <th colspan="2">Tender Evaluation / Shortlisting Report</th>
                                        <th>Short List Notice Publication</th>
                                        <th colspan="2">Invitation to Shortlisted Firms to Submit Proposals </th>
                                        <th colspan="2">Evaluation of Bids under Shortlist Method</th>
                                        <th>Purchase / Contracts Committee Approval</th>
                                        <th colspan="2">Secretary General (SGs) Approval of PC /CC Reports</th>
                                        <th colspan="3">Contract Vetting</th>
                                        <th>SG/ASG(A&F)/ DHRA Approval</th>
                                        <th>Contract Signing Date</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($BRUSSELS_LIASON as $item)
                                        <tr>
                                            <td>{{ $item->crt_no }}</td>
                                            <td>{{ $item->description_of_goods_works_and_services }}</td>
                                            <td>{{ $item->category_of_procurement}}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{{ $item->unit_of_measure}}</td>
                                            <td>{{ $item->Procurement_method }}</td>
                                            <td>{{ $item->type_of_contract }}</td>
                                            <td>{{ $item->allocated_amount }}</td>
                                            <td>{{ $item->currency }}</td>
                                            <td>{{ $item->source_of_funding }}</td>
                                            <td>{{ $item->procuring_unit }}</td>
                                            <td>{{ $item->requisition_unit }}</td>
                                            <td>{{ $item->end_user_requisition_date }}</td>                                           
                                            <td>{{$item->technical_requirements_receipt_of_final_technical_requirements_date}}</td>
                                            <td>{{$item->technical_requirements_preparation_of_tender_document}}</td>
                                            <td>{{$item->publication_of_tender_documents_publication_date}}</td>
                                            <td>{{ $item->publication_of_tender_documents_closing_date }}</td>  
                                            <td>{{$item->tender_openning}}</td>
                                            <td>{{$item->tender_evaluation_shortlisting_report_start_date}}</td>
                                            <td>{{$item->tender_evaluation_shortlisting_Report_end_date}}</td>
                                            <td>{{$item->short_list_notice_publication}}</td>
                                            <td>{{$item->invitation_to_shortlisted_firms_to_submit_proposals_invitation_date}}</td>
                                            <td>{{$item->invitation_to_shortlisted_firms_to_submit_proposals_closing_date}}</td>
                                            <td>{{$item->evaluation_of_bids_under_shortlist_method_start_date}}</td>
                                            <td>{{$item->evaluation_of_bids_under_shortlist_method_end_date}}</td>
                                            <td>{{$item->purchase_contracts_committee_approval}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_submission_date}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_approval_date}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_approval_date}}</td>
                                            <td>{{$item->contract_vetting_submission_date}}</td>
                                            <td>{{$item->contract_vetting_approval_date}}</td>
                                            <td>{{$item->contract_amount}}</td>
                                            <td>{{$item->sg_asg_a_and_f_dhra_approval}}</td>
                                            <td>{{$item->contract_signing_date}}</td>

                                           
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            </div>
                          

                            <style>
                                .w-5 {
                                    display: none;
                                }
                            </style>

                        </section>
                    </div>
                </div>


            {{-- START OF OTHER TABLES --}}

                <div class="row">
                    <div class="col-sm-12 col-md-12">

                        <section id="Approved_suppliers">
                            <h3 class="heading" style="color: rgb(26, 239, 54)">ECOSOCC TABLE</h3>

                            <div class="table-responsive">

                            <table class="table table-bordered table-striped" id="smpl_tbl">
                                <thead>
                                    <tr>
                                        <th>Crt.No. </th>
                                        <th>Description of Goods/Works & Services</th>
                                        <th>Category of Procurement</th>
                                        <th>Qty</th>
                                        <th>Unit of Measure</th>
                                        <th>Procurement Method</th>
                                        <th>Type of Contract</th>
                                        <th>Years in Business</th>
                                        <th>Allocated Amount</th>
                                        <th>Currency</th>
                                        <th>Procuring Unit</th>
                                        <th>Requisition Unit</th>
                                        <th>End user Requisition Date</th>
                                        <th colspan="2">Technical Requirements</th>
                                        <th colspan="2">Publication of Tender Documents</th>
                                        <th>Tender Openning</th>
                                        <th colspan="2">Tender Evaluation / Shortlisting Report</th>
                                        <th>Short List Notice Publication</th>
                                        <th colspan="2">Invitation to Shortlisted Firms to Submit Proposals </th>
                                        <th colspan="2">Evaluation of Bids under Shortlist Method</th>
                                        <th>Purchase / Contracts Committee Approval</th>
                                        <th colspan="2">Secretary General (SGs) Approval of PC /CC Reports</th>
                                        <th colspan="3">Contract Vetting</th>
                                        <th>SG/ASG(A&F)/ DHRA Approval</th>
                                        <th>Contract Signing Date</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($ECOSOCC as $item)
                                        <tr>
                                            <td>{{ $item->crt_no }}</td>
                                            <td>{{ $item->description_of_goods_works_and_services }}</td>
                                            <td>{{ $item->category_of_procurement}}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{{ $item->unit_of_measure}}</td>
                                            <td>{{ $item->Procurement_method }}</td>
                                            <td>{{ $item->type_of_contract }}</td>
                                            <td>{{ $item->allocated_amount }}</td>
                                            <td>{{ $item->currency }}</td>
                                            <td>{{ $item->source_of_funding }}</td>
                                            <td>{{ $item->procuring_unit }}</td>
                                            <td>{{ $item->requisition_unit }}</td>
                                            <td>{{ $item->end_user_requisition_date }}</td>                                           
                                            <td>{{$item->technical_requirements_receipt_of_final_technical_requirements_date}}</td>
                                            <td>{{$item->technical_requirements_preparation_of_tender_document}}</td>
                                            <td>{{$item->publication_of_tender_documents_publication_date}}</td>
                                            <td>{{ $item->publication_of_tender_documents_closing_date }}</td>  
                                            <td>{{$item->tender_openning}}</td>
                                            <td>{{$item->tender_evaluation_shortlisting_report_start_date}}</td>
                                            <td>{{$item->tender_evaluation_shortlisting_Report_end_date}}</td>
                                            <td>{{$item->short_list_notice_publication}}</td>
                                            <td>{{$item->invitation_to_shortlisted_firms_to_submit_proposals_invitation_date}}</td>
                                            <td>{{$item->invitation_to_shortlisted_firms_to_submit_proposals_closing_date}}</td>
                                            <td>{{$item->evaluation_of_bids_under_shortlist_method_start_date}}</td>
                                            <td>{{$item->evaluation_of_bids_under_shortlist_method_end_date}}</td>
                                            <td>{{$item->purchase_contracts_committee_approval}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_submission_date}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_approval_date}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_approval_date}}</td>
                                            <td>{{$item->contract_vetting_submission_date}}</td>
                                            <td>{{$item->contract_vetting_approval_date}}</td>
                                            <td>{{$item->contract_amount}}</td>
                                            <td>{{$item->sg_asg_a_and_f_dhra_approval}}</td>
                                            <td>{{$item->contract_signing_date}}</td>

                                           
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            </div>
                          

                            <style>
                                .w-5 {
                                    display: none;
                                }
                            </style>

                        </section>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-12 col-md-12">

                        <section id="Approved_suppliers">
                            <h3 class="heading" style="color: rgb(26, 239, 54)">Governance Peace & Security  - GPS TABLE</h3>

                            <div class="table-responsive">

                            <table class="table table-bordered table-striped" id="smpl_tbl">
                                <thead>
                                    <tr>
                                        <th>Crt.No. </th>
                                        <th>Description of Goods/Works & Services</th>
                                        <th>Category of Procurement</th>
                                        <th>Qty</th>
                                        <th>Unit of Measure</th>
                                        <th>Procurement Method</th>
                                        <th>Type of Contract</th>
                                        <th>Years in Business</th>
                                        <th>Allocated Amount</th>
                                        <th>Currency</th>
                                        <th>Procuring Unit</th>
                                        <th>Requisition Unit</th>
                                        <th>End user Requisition Date</th>
                                        <th colspan="2">Technical Requirements</th>
                                        <th colspan="2">Publication of Tender Documents</th>
                                        <th>Tender Openning</th>
                                        <th colspan="2">Tender Evaluation / Shortlisting Report</th>
                                        <th>Short List Notice Publication</th>
                                        <th colspan="2">Invitation to Shortlisted Firms to Submit Proposals </th>
                                        <th colspan="2">Evaluation of Bids under Shortlist Method</th>
                                        <th>Purchase / Contracts Committee Approval</th>
                                        <th colspan="2">Secretary General (SGs) Approval of PC /CC Reports</th>
                                        <th colspan="3">Contract Vetting</th>
                                        <th>SG/ASG(A&F)/ DHRA Approval</th>
                                        <th>Contract Signing Date</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($Governance_Peace_and_Security as $item)
                                        <tr>
                                            <td>{{ $item->crt_no }}</td>
                                            <td>{{ $item->description_of_goods_works_and_services }}</td>
                                            <td>{{ $item->category_of_procurement}}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{{ $item->unit_of_measure}}</td>
                                            <td>{{ $item->Procurement_method }}</td>
                                            <td>{{ $item->type_of_contract }}</td>
                                            <td>{{ $item->allocated_amount }}</td>
                                            <td>{{ $item->currency }}</td>
                                            <td>{{ $item->source_of_funding }}</td>
                                            <td>{{ $item->procuring_unit }}</td>
                                            <td>{{ $item->requisition_unit }}</td>
                                            <td>{{ $item->end_user_requisition_date }}</td>                                           
                                            <td>{{$item->technical_requirements_receipt_of_final_technical_requirements_date}}</td>
                                            <td>{{$item->technical_requirements_preparation_of_tender_document}}</td>
                                            <td>{{$item->publication_of_tender_documents_publication_date}}</td>
                                            <td>{{ $item->publication_of_tender_documents_closing_date }}</td>  
                                            <td>{{$item->tender_openning}}</td>
                                            <td>{{$item->tender_evaluation_shortlisting_report_start_date}}</td>
                                            <td>{{$item->tender_evaluation_shortlisting_Report_end_date}}</td>
                                            <td>{{$item->short_list_notice_publication}}</td>
                                            <td>{{$item->invitation_to_shortlisted_firms_to_submit_proposals_invitation_date}}</td>
                                            <td>{{$item->invitation_to_shortlisted_firms_to_submit_proposals_closing_date}}</td>
                                            <td>{{$item->evaluation_of_bids_under_shortlist_method_start_date}}</td>
                                            <td>{{$item->evaluation_of_bids_under_shortlist_method_end_date}}</td>
                                            <td>{{$item->purchase_contracts_committee_approval}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_submission_date}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_approval_date}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_approval_date}}</td>
                                            <td>{{$item->contract_vetting_submission_date}}</td>
                                            <td>{{$item->contract_vetting_approval_date}}</td>
                                            <td>{{$item->contract_amount}}</td>
                                            <td>{{$item->sg_asg_a_and_f_dhra_approval}}</td>
                                            <td>{{$item->contract_signing_date}}</td>

                                           
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            </div>
                          

                            <style>
                                .w-5 {
                                    display: none;
                                }
                            </style>

                        </section>
                    </div>
                </div>


              <div class="row">
                    <div class="col-sm-12 col-md-12">

                        <section id="Approved_suppliers">CLIMATE CHANGE TABLE</h3>

                            <div class="table-responsive">

                            <table class="table table-bordered table-striped" id="smpl_tbl">
                                <thead>
                                    <tr>
                                        <th>Crt.No. </th>
                                        <th>Description of Goods/Works & Services</th>
                                        <th>Category of Procurement</th>
                                        <th>Qty</th>
                                        <th>Unit of Measure</th>
                                        <th>Procurement Method</th>
                                        <th>Type of Contract</th>
                                        <th>Years in Business</th>
                                        <th>Allocated Amount</th>
                                        <th>Currency</th>
                                        <th>Procuring Unit</th>
                                        <th>Requisition Unit</th>
                                        <th>End user Requisition Date</th>
                                        <th colspan="2">Technical Requirements</th>
                                        <th colspan="2">Publication of Tender Documents</th>
                                        <th>Tender Openning</th>
                                        <th colspan="2">Tender Evaluation / Shortlisting Report</th>
                                        <th>Short List Notice Publication</th>
                                        <th colspan="2">Invitation to Shortlisted Firms to Submit Proposals </th>
                                        <th colspan="2">Evaluation of Bids under Shortlist Method</th>
                                        <th>Purchase / Contracts Committee Approval</th>
                                        <th colspan="2">Secretary General (SGs) Approval of PC /CC Reports</th>
                                        <th colspan="3">Contract Vetting</th>
                                        <th>SG/ASG(A&F)/ DHRA Approval</th>
                                        <th>Contract Signing Date</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($GPS_CLIMATE_CHANGE as $item)
                                        <tr>
                                            <td>{{ $item->crt_no }}</td>
                                            <td>{{ $item->description_of_goods_works_and_services }}</td>
                                            <td>{{ $item->category_of_procurement}}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{{ $item->unit_of_measure}}</td>
                                            <td>{{ $item->Procurement_method }}</td>
                                            <td>{{ $item->type_of_contract }}</td>
                                            <td>{{ $item->allocated_amount }}</td>
                                            <td>{{ $item->currency }}</td>
                                            <td>{{ $item->source_of_funding }}</td>
                                            <td>{{ $item->procuring_unit }}</td>
                                            <td>{{ $item->requisition_unit }}</td>
                                            <td>{{ $item->end_user_requisition_date }}</td>                                           
                                            <td>{{$item->technical_requirements_receipt_of_final_technical_requirements_date}}</td>
                                            <td>{{$item->technical_requirements_preparation_of_tender_document}}</td>
                                            <td>{{$item->publication_of_tender_documents_publication_date}}</td>
                                            <td>{{ $item->publication_of_tender_documents_closing_date }}</td>  
                                            <td>{{$item->tender_openning}}</td>
                                            <td>{{$item->tender_evaluation_shortlisting_report_start_date}}</td>
                                            <td>{{$item->tender_evaluation_shortlisting_Report_end_date}}</td>
                                            <td>{{$item->short_list_notice_publication}}</td>
                                            <td>{{$item->invitation_to_shortlisted_firms_to_submit_proposals_invitation_date}}</td>
                                            <td>{{$item->invitation_to_shortlisted_firms_to_submit_proposals_closing_date}}</td>
                                            <td>{{$item->evaluation_of_bids_under_shortlist_method_start_date}}</td>
                                            <td>{{$item->evaluation_of_bids_under_shortlist_method_end_date}}</td>
                                            <td>{{$item->purchase_contracts_committee_approval}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_submission_date}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_approval_date}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_approval_date}}</td>
                                            <td>{{$item->contract_vetting_submission_date}}</td>
                                            <td>{{$item->contract_vetting_approval_date}}</td>
                                            <td>{{$item->contract_amount}}</td>
                                            <td>{{$item->sg_asg_a_and_f_dhra_approval}}</td>
                                            <td>{{$item->contract_signing_date}}</td>

                                           
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            </div>
                          

                            <style>
                                .w-5 {
                                    display: none;
                                }
                            </style>

                        </section>
                    </div>
             </div>


                <div class="row">
                    <div class="col-sm-12 col-md-12">

                        <section id="Approved_suppliers">
                            <h3 class="heading" style="color: rgb(26, 239, 54)">INTERNAL AUDIT TABLE</h3>

                            <div class="table-responsive">

                            <table class="table table-bordered table-striped" id="smpl_tbl">
                                <thead>
                                    <tr>
                                        <th>Crt.No. </th>
                                        <th>Description of Goods/Works & Services</th>
                                        <th>Category of Procurement</th>
                                        <th>Qty</th>
                                        <th>Unit of Measure</th>
                                        <th>Procurement Method</th>
                                        <th>Type of Contract</th>
                                        <th>Years in Business</th>
                                        <th>Allocated Amount</th>
                                        <th>Currency</th>
                                        <th>Procuring Unit</th>
                                        <th>Requisition Unit</th>
                                        <th>End user Requisition Date</th>
                                        <th colspan="2">Technical Requirements</th>
                                        <th colspan="2">Publication of Tender Documents</th>
                                        <th>Tender Openning</th>
                                        <th colspan="2">Tender Evaluation / Shortlisting Report</th>
                                        <th>Short List Notice Publication</th>
                                        <th colspan="2">Invitation to Shortlisted Firms to Submit Proposals </th>
                                        <th colspan="2">Evaluation of Bids under Shortlist Method</th>
                                        <th>Purchase / Contracts Committee Approval</th>
                                        <th colspan="2">Secretary General (SGs) Approval of PC /CC Reports</th>
                                        <th colspan="3">Contract Vetting</th>
                                        <th>SG/ASG(A&F)/ DHRA Approval</th>
                                        <th>Contract Signing Date</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($internal_audit as $item)
                                        <tr>
                                            <td>{{ $item->crt_no }}</td>
                                            <td>{{ $item->description_of_goods_works_and_services }}</td>
                                            <td>{{ $item->category_of_procurement}}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{{ $item->unit_of_measure}}</td>
                                            <td>{{ $item->Procurement_method }}</td>
                                            <td>{{ $item->type_of_contract }}</td>
                                            <td>{{ $item->allocated_amount }}</td>
                                            <td>{{ $item->currency }}</td>
                                            <td>{{ $item->source_of_funding }}</td>
                                            <td>{{ $item->procuring_unit }}</td>
                                            <td>{{ $item->requisition_unit }}</td>
                                            <td>{{ $item->end_user_requisition_date }}</td>                                           
                                            <td>{{$item->technical_requirements_receipt_of_final_technical_requirements_date}}</td>
                                            <td>{{$item->technical_requirements_preparation_of_tender_document}}</td>
                                            <td>{{$item->publication_of_tender_documents_publication_date}}</td>
                                            <td>{{ $item->publication_of_tender_documents_closing_date }}</td>  
                                            <td>{{$item->tender_openning}}</td>
                                            <td>{{$item->tender_evaluation_shortlisting_report_start_date}}</td>
                                            <td>{{$item->tender_evaluation_shortlisting_Report_end_date}}</td>
                                            <td>{{$item->short_list_notice_publication}}</td>
                                            <td>{{$item->invitation_to_shortlisted_firms_to_submit_proposals_invitation_date}}</td>
                                            <td>{{$item->invitation_to_shortlisted_firms_to_submit_proposals_closing_date}}</td>
                                            <td>{{$item->evaluation_of_bids_under_shortlist_method_start_date}}</td>
                                            <td>{{$item->evaluation_of_bids_under_shortlist_method_end_date}}</td>
                                            <td>{{$item->purchase_contracts_committee_approval}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_submission_date}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_approval_date}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_approval_date}}</td>
                                            <td>{{$item->contract_vetting_submission_date}}</td>
                                            <td>{{$item->contract_vetting_approval_date}}</td>
                                            <td>{{$item->contract_amount}}</td>
                                            <td>{{$item->sg_asg_a_and_f_dhra_approval}}</td>
                                            <td>{{$item->contract_signing_date}}</td>

                                           
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            </div>
                          

                            <style>
                                .w-5 {
                                    display: none;
                                }
                            </style>

                        </section>
                    </div>
                </div> 


                <div class="row">
                    <div class="col-sm-12 col-md-12">

                        <section id="Approved_suppliers">
                            <h3 class="heading" style="color: rgb(26, 239, 54)">ESTATES TABLE</h3>

                            <div class="table-responsive">

                            <table class="table table-bordered table-striped" id="smpl_tbl">
                                <thead>
                                    <tr>
                                        <th>Crt.No. </th>
                                        <th>Description of Goods/Works & Services</th>
                                        <th>Category of Procurement</th>
                                        <th>Qty</th>
                                        <th>Unit of Measure</th>
                                        <th>Procurement Method</th>
                                        <th>Type of Contract</th>
                                        <th>Years in Business</th>
                                        <th>Allocated Amount</th>
                                        <th>Currency</th>
                                        <th>Procuring Unit</th>
                                        <th>Requisition Unit</th>
                                        <th>End user Requisition Date</th>
                                        <th colspan="2">Technical Requirements</th>
                                        <th colspan="2">Publication of Tender Documents</th>
                                        <th>Tender Openning</th>
                                        <th colspan="2">Tender Evaluation / Shortlisting Report</th>
                                        <th>Short List Notice Publication</th>
                                        <th colspan="2">Invitation to Shortlisted Firms to Submit Proposals </th>
                                        <th colspan="2">Evaluation of Bids under Shortlist Method</th>
                                        <th>Purchase / Contracts Committee Approval</th>
                                        <th colspan="2">Secretary General (SGs) Approval of PC /CC Reports</th>
                                        <th colspan="3">Contract Vetting</th>
                                        <th>SG/ASG(A&F)/ DHRA Approval</th>
                                        <th>Contract Signing Date</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($ESTATES as $item)
                                        <tr>
                                            <td>{{ $item->crt_no }}</td>
                                            <td>{{ $item->description_of_goods_works_and_services }}</td>
                                            <td>{{ $item->category_of_procurement}}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{{ $item->unit_of_measure}}</td>
                                            <td>{{ $item->Procurement_method }}</td>
                                            <td>{{ $item->type_of_contract }}</td>
                                            <td>{{ $item->allocated_amount }}</td>
                                            <td>{{ $item->currency }}</td>
                                            <td>{{ $item->source_of_funding }}</td>
                                            <td>{{ $item->procuring_unit }}</td>
                                            <td>{{ $item->requisition_unit }}</td>
                                            <td>{{ $item->end_user_requisition_date }}</td>                                           
                                            <td>{{$item->technical_requirements_receipt_of_final_technical_requirements_date}}</td>
                                            <td>{{$item->technical_requirements_preparation_of_tender_document}}</td>
                                            <td>{{$item->publication_of_tender_documents_publication_date}}</td>
                                            <td>{{ $item->publication_of_tender_documents_closing_date }}</td>  
                                            <td>{{$item->tender_openning}}</td>
                                            <td>{{$item->tender_evaluation_shortlisting_report_start_date}}</td>
                                            <td>{{$item->tender_evaluation_shortlisting_Report_end_date}}</td>
                                            <td>{{$item->short_list_notice_publication}}</td>
                                            <td>{{$item->invitation_to_shortlisted_firms_to_submit_proposals_invitation_date}}</td>
                                            <td>{{$item->invitation_to_shortlisted_firms_to_submit_proposals_closing_date}}</td>
                                            <td>{{$item->evaluation_of_bids_under_shortlist_method_start_date}}</td>
                                            <td>{{$item->evaluation_of_bids_under_shortlist_method_end_date}}</td>
                                            <td>{{$item->purchase_contracts_committee_approval}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_submission_date}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_approval_date}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_approval_date}}</td>
                                            <td>{{$item->contract_vetting_submission_date}}</td>
                                            <td>{{$item->contract_vetting_approval_date}}</td>
                                            <td>{{$item->contract_amount}}</td>
                                            <td>{{$item->sg_asg_a_and_f_dhra_approval}}</td>
                                            <td>{{$item->contract_signing_date}}</td>

                                           
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            </div>
                          

                            <style>
                                .w-5 {
                                    display: none;
                                }
                            </style>

                        </section>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-12 col-md-12">

                        <section id="Approved_suppliers">
                            <h3 class="heading" style="color: rgb(26, 239, 54)">IRC TABLE</h3>

                            <div class="table-responsive">

                            <table class="table table-bordered table-striped" id="smpl_tbl">
                                <thead>
                                    <tr>
                                        <th>Crt.No. </th>
                                        <th>Description of Goods/Works & Services</th>
                                        <th>Category of Procurement</th>
                                        <th>Qty</th>
                                        <th>Unit of Measure</th>
                                        <th>Procurement Method</th>
                                        <th>Type of Contract</th>
                                        <th>Years in Business</th>
                                        <th>Allocated Amount</th>
                                        <th>Currency</th>
                                        <th>Procuring Unit</th>
                                        <th>Requisition Unit</th>
                                        <th>End user Requisition Date</th>
                                        <th colspan="2">Technical Requirements</th>
                                        <th colspan="2">Publication of Tender Documents</th>
                                        <th>Tender Openning</th>
                                        <th colspan="2">Tender Evaluation / Shortlisting Report</th>
                                        <th>Short List Notice Publication</th>
                                        <th colspan="2">Invitation to Shortlisted Firms to Submit Proposals </th>
                                        <th colspan="2">Evaluation of Bids under Shortlist Method</th>
                                        <th>Purchase / Contracts Committee Approval</th>
                                        <th colspan="2">Secretary General (SGs) Approval of PC /CC Reports</th>
                                        <th colspan="3">Contract Vetting</th>
                                        <th>SG/ASG(A&F)/ DHRA Approval</th>
                                        <th>Contract Signing Date</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($IRC as $item)
                                        <tr>
                                            <td>{{ $item->crt_no }}</td>
                                            <td>{{ $item->description_of_goods_works_and_services }}</td>
                                            <td>{{ $item->category_of_procurement}}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{{ $item->unit_of_measure}}</td>
                                            <td>{{ $item->Procurement_method }}</td>
                                            <td>{{ $item->type_of_contract }}</td>
                                            <td>{{ $item->allocated_amount }}</td>
                                            <td>{{ $item->currency }}</td>
                                            <td>{{ $item->source_of_funding }}</td>
                                            <td>{{ $item->procuring_unit }}</td>
                                            <td>{{ $item->requisition_unit }}</td>
                                            <td>{{ $item->end_user_requisition_date }}</td>                                           
                                            <td>{{$item->technical_requirements_receipt_of_final_technical_requirements_date}}</td>
                                            <td>{{$item->technical_requirements_preparation_of_tender_document}}</td>
                                            <td>{{$item->publication_of_tender_documents_publication_date}}</td>
                                            <td>{{ $item->publication_of_tender_documents_closing_date }}</td>  
                                            <td>{{$item->tender_openning}}</td>
                                            <td>{{$item->tender_evaluation_shortlisting_report_start_date}}</td>
                                            <td>{{$item->tender_evaluation_shortlisting_Report_end_date}}</td>
                                            <td>{{$item->short_list_notice_publication}}</td>
                                            <td>{{$item->invitation_to_shortlisted_firms_to_submit_proposals_invitation_date}}</td>
                                            <td>{{$item->invitation_to_shortlisted_firms_to_submit_proposals_closing_date}}</td>
                                            <td>{{$item->evaluation_of_bids_under_shortlist_method_start_date}}</td>
                                            <td>{{$item->evaluation_of_bids_under_shortlist_method_end_date}}</td>
                                            <td>{{$item->purchase_contracts_committee_approval}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_submission_date}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_approval_date}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_approval_date}}</td>
                                            <td>{{$item->contract_vetting_submission_date}}</td>
                                            <td>{{$item->contract_vetting_approval_date}}</td>
                                            <td>{{$item->contract_amount}}</td>
                                            <td>{{$item->sg_asg_a_and_f_dhra_approval}}</td>
                                            <td>{{$item->contract_signing_date}}</td>

                                           
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            </div>
                          

                            <style>
                                .w-5 {
                                    display: none;
                                }
                            </style>

                        </section>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-12 col-md-12">

                        <section id="Approved_suppliers">
                            <h3 class="heading" style="color: rgb(26, 239, 54)">TRADE AND CUSTOMS TABLE</h3>

                            <div class="table-responsive">

                            <table class="table table-bordered table-striped" id="smpl_tbl">
                                <thead>
                                    <tr>
                                        <th>Crt.No. </th>
                                        <th>Description of Goods/Works & Services</th>
                                        <th>Category of Procurement</th>
                                        <th>Qty</th>
                                        <th>Unit of Measure</th>
                                        <th>Procurement Method</th>
                                        <th>Type of Contract</th>
                                        <th>Years in Business</th>
                                        <th>Allocated Amount</th>
                                        <th>Currency</th>
                                        <th>Procuring Unit</th>
                                        <th>Requisition Unit</th>
                                        <th>End user Requisition Date</th>
                                        <th colspan="2">Technical Requirements</th>
                                        <th colspan="2">Publication of Tender Documents</th>
                                        <th>Tender Openning</th>
                                        <th colspan="2">Tender Evaluation / Shortlisting Report</th>
                                        <th>Short List Notice Publication</th>
                                        <th colspan="2">Invitation to Shortlisted Firms to Submit Proposals </th>
                                        <th colspan="2">Evaluation of Bids under Shortlist Method</th>
                                        <th>Purchase / Contracts Committee Approval</th>
                                        <th colspan="2">Secretary General (SGs) Approval of PC /CC Reports</th>
                                        <th colspan="3">Contract Vetting</th>
                                        <th>SG/ASG(A&F)/ DHRA Approval</th>
                                        <th>Contract Signing Date</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($TRADE_AND_CUSTOMS as $item)
                                        <tr>
                                            <td>{{ $item->crt_no }}</td>
                                            <td>{{ $item->description_of_goods_works_and_services }}</td>
                                            <td>{{ $item->category_of_procurement}}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{{ $item->unit_of_measure}}</td>
                                            <td>{{ $item->Procurement_method }}</td>
                                            <td>{{ $item->type_of_contract }}</td>
                                            <td>{{ $item->allocated_amount }}</td>
                                            <td>{{ $item->currency }}</td>
                                            <td>{{ $item->source_of_funding }}</td>
                                            <td>{{ $item->procuring_unit }}</td>
                                            <td>{{ $item->requisition_unit }}</td>
                                            <td>{{ $item->end_user_requisition_date }}</td>                                           
                                            <td>{{$item->technical_requirements_receipt_of_final_technical_requirements_date}}</td>
                                            <td>{{$item->technical_requirements_preparation_of_tender_document}}</td>
                                            <td>{{$item->publication_of_tender_documents_publication_date}}</td>
                                            <td>{{ $item->publication_of_tender_documents_closing_date }}</td>  
                                            <td>{{$item->tender_openning}}</td>
                                            <td>{{$item->tender_evaluation_shortlisting_report_start_date}}</td>
                                            <td>{{$item->tender_evaluation_shortlisting_Report_end_date}}</td>
                                            <td>{{$item->short_list_notice_publication}}</td>
                                            <td>{{$item->invitation_to_shortlisted_firms_to_submit_proposals_invitation_date}}</td>
                                            <td>{{$item->invitation_to_shortlisted_firms_to_submit_proposals_closing_date}}</td>
                                            <td>{{$item->evaluation_of_bids_under_shortlist_method_start_date}}</td>
                                            <td>{{$item->evaluation_of_bids_under_shortlist_method_end_date}}</td>
                                            <td>{{$item->purchase_contracts_committee_approval}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_submission_date}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_approval_date}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_approval_date}}</td>
                                            <td>{{$item->contract_vetting_submission_date}}</td>
                                            <td>{{$item->contract_vetting_approval_date}}</td>
                                            <td>{{$item->contract_amount}}</td>
                                            <td>{{$item->sg_asg_a_and_f_dhra_approval}}</td>
                                            <td>{{$item->contract_signing_date}}</td>

                                           
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            </div>
                          

                            <style>
                                .w-5 {
                                    display: none;
                                }
                            </style>

                        </section>
                    </div>
                </div>


                {{-- <div class="row">
                    <div class="col-sm-12 col-md-12">

                        <section id="Approved_suppliers">
                            <h3 class="heading" style="color: rgb(26, 239, 54)">BRUSSELS LIASON OFFICE (BLO) TABLE</h3>

                            <div class="table-responsive">

                            <table class="table table-bordered table-striped" id="smpl_tbl">
                                <thead>
                                    <tr>
                                        <th>Crt.No. </th>
                                        <th>Description of Goods/Works & Services</th>
                                        <th>Category of Procurement</th>
                                        <th>Qty</th>
                                        <th>Unit of Measure</th>
                                        <th>Procurement Method</th>
                                        <th>Type of Contract</th>
                                        <th>Years in Business</th>
                                        <th>Allocated Amount</th>
                                        <th>Currency</th>
                                        <th>Procuring Unit</th>
                                        <th>Requisition Unit</th>
                                        <th>End user Requisition Date</th>
                                        <th colspan="2">Technical Requirements</th>
                                        <th colspan="2">Publication of Tender Documents</th>
                                        <th>Tender Openning</th>
                                        <th colspan="2">Tender Evaluation / Shortlisting Report</th>
                                        <th>Short List Notice Publication</th>
                                        <th colspan="2">Invitation to Shortlisted Firms to Submit Proposals </th>
                                        <th colspan="2">Evaluation of Bids under Shortlist Method</th>
                                        <th>Purchase / Contracts Committee Approval</th>
                                        <th colspan="2">Secretary General (SGs) Approval of PC /CC Reports</th>
                                        <th colspan="3">Contract Vetting</th>
                                        <th>SG/ASG(A&F)/ DHRA Approval</th>
                                        <th>Contract Signing Date</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($TRADE_COM_11 as $item)
                                        <tr>
                                            <td>{{ $item->crt_no }}</td>
                                            <td>{{ $item->description_of_goods_works_and_services }}</td>
                                            <td>{{ $item->category_of_procurement}}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{{ $item->unit_of_measure}}</td>
                                            <td>{{ $item->Procurement_method }}</td>
                                            <td>{{ $item->type_of_contract }}</td>
                                            <td>{{ $item->allocated_amount }}</td>
                                            <td>{{ $item->currency }}</td>
                                            <td>{{ $item->source_of_funding }}</td>
                                            <td>{{ $item->procuring_unit }}</td>
                                            <td>{{ $item->requisition_unit }}</td>
                                            <td>{{ $item->end_user_requisition_date }}</td>                                           
                                            <td>{{$item->technical_requirements_receipt_of_final_technical_requirements_date}}</td>
                                            <td>{{$item->technical_requirements_preparation_of_tender_document}}</td>
                                            <td>{{$item->publication_of_tender_documents_publication_date}}</td>
                                            <td>{{ $item->publication_of_tender_documents_closing_date }}</td>  
                                            <td>{{$item->tender_openning}}</td>
                                            <td>{{$item->tender_evaluation_shortlisting_report_start_date}}</td>
                                            <td>{{$item->tender_evaluation_shortlisting_Report_end_date}}</td>
                                            <td>{{$item->short_list_notice_publication}}</td>
                                            <td>{{$item->invitation_to_shortlisted_firms_to_submit_proposals_invitation_date}}</td>
                                            <td>{{$item->invitation_to_shortlisted_firms_to_submit_proposals_closing_date}}</td>
                                            <td>{{$item->evaluation_of_bids_under_shortlist_method_start_date}}</td>
                                            <td>{{$item->evaluation_of_bids_under_shortlist_method_end_date}}</td>
                                            <td>{{$item->purchase_contracts_committee_approval}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_submission_date}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_approval_date}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_approval_date}}</td>
                                            <td>{{$item->contract_vetting_submission_date}}</td>
                                            <td>{{$item->contract_vetting_approval_date}}</td>
                                            <td>{{$item->contract_amount}}</td>
                                            <td>{{$item->sg_asg_a_and_f_dhra_approval}}</td>
                                            <td>{{$item->contract_signing_date}}</td>

                                           
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            </div>
                          

                            <style>
                                .w-5 {
                                    display: none;
                                }
                            </style>

                        </section>
                    </div>
                </div> --}}

                <div class="row">
                    <div class="col-sm-12 col-md-12">

                        <section id="Approved_suppliers">
                            <h3 class="heading" style="color: rgb(26, 239, 54)">TRADE COM  TABLE</h3>

                            <div class="table-responsive">

                            <table class="table table-bordered table-striped" id="smpl_tbl">
                                <thead>
                                    <tr>
                                        <th>Crt.No. </th>
                                        <th>Description of Goods/Works & Services</th>
                                        <th>Category of Procurement</th>
                                        <th>Qty</th>
                                        <th>Unit of Measure</th>
                                        <th>Procurement Method</th>
                                        <th>Type of Contract</th>
                                        <th>Years in Business</th>
                                        <th>Allocated Amount</th>
                                        <th>Currency</th>
                                        <th>Procuring Unit</th>
                                        <th>Requisition Unit</th>
                                        <th>End user Requisition Date</th>
                                        <th colspan="2">Technical Requirements</th>
                                        <th colspan="2">Publication of Tender Documents</th>
                                        <th>Tender Openning</th>
                                        <th colspan="2">Tender Evaluation / Shortlisting Report</th>
                                        <th>Short List Notice Publication</th>
                                        <th colspan="2">Invitation to Shortlisted Firms to Submit Proposals </th>
                                        <th colspan="2">Evaluation of Bids under Shortlist Method</th>
                                        <th>Purchase / Contracts Committee Approval</th>
                                        <th colspan="2">Secretary General (SGs) Approval of PC /CC Reports</th>
                                        <th colspan="3">Contract Vetting</th>
                                        <th>SG/ASG(A&F)/ DHRA Approval</th>
                                        <th>Contract Signing Date</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($TRADE_COM_11 as $item)
                                        <tr>
                                            <td>{{ $item->crt_no }}</td>
                                            <td>{{ $item->description_of_goods_works_and_services }}</td>
                                            <td>{{ $item->category_of_procurement}}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{{ $item->unit_of_measure}}</td>
                                            <td>{{ $item->Procurement_method }}</td>
                                            <td>{{ $item->type_of_contract }}</td>
                                            <td>{{ $item->allocated_amount }}</td>
                                            <td>{{ $item->currency }}</td>
                                            <td>{{ $item->source_of_funding }}</td>
                                            <td>{{ $item->procuring_unit }}</td>
                                            <td>{{ $item->requisition_unit }}</td>
                                            <td>{{ $item->end_user_requisition_date }}</td>                                           
                                            <td>{{$item->technical_requirements_receipt_of_final_technical_requirements_date}}</td>
                                            <td>{{$item->technical_requirements_preparation_of_tender_document}}</td>
                                            <td>{{$item->publication_of_tender_documents_publication_date}}</td>
                                            <td>{{ $item->publication_of_tender_documents_closing_date }}</td>  
                                            <td>{{$item->tender_openning}}</td>
                                            <td>{{$item->tender_evaluation_shortlisting_report_start_date}}</td>
                                            <td>{{$item->tender_evaluation_shortlisting_Report_end_date}}</td>
                                            <td>{{$item->short_list_notice_publication}}</td>
                                            <td>{{$item->invitation_to_shortlisted_firms_to_submit_proposals_invitation_date}}</td>
                                            <td>{{$item->invitation_to_shortlisted_firms_to_submit_proposals_closing_date}}</td>
                                            <td>{{$item->evaluation_of_bids_under_shortlist_method_start_date}}</td>
                                            <td>{{$item->evaluation_of_bids_under_shortlist_method_end_date}}</td>
                                            <td>{{$item->purchase_contracts_committee_approval}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_submission_date}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_approval_date}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_approval_date}}</td>
                                            <td>{{$item->contract_vetting_submission_date}}</td>
                                            <td>{{$item->contract_vetting_approval_date}}</td>
                                            <td>{{$item->contract_amount}}</td>
                                            <td>{{$item->sg_asg_a_and_f_dhra_approval}}</td>
                                            <td>{{$item->contract_signing_date}}</td>

                                           
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            </div>
                          

                            <style>
                                .w-5 {
                                    display: none;
                                }
                            </style>

                        </section>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-12">

                        <section id="Approved_suppliers">
                            <h3 class="heading" style="color: rgb(26, 239, 54)">EDF11  TFP TABLE</h3>

                            <div class="table-responsive">

                            <table class="table table-bordered table-striped" id="smpl_tbl">
                                <thead>
                                    <tr>
                                        <th>Crt.No. </th>
                                        <th>Description of Goods/Works & Services</th>
                                        <th>Category of Procurement</th>
                                        <th>Qty</th>
                                        <th>Unit of Measure</th>
                                        <th>Procurement Method</th>
                                        <th>Type of Contract</th>
                                        <th>Years in Business</th>
                                        <th>Allocated Amount</th>
                                        <th>Currency</th>
                                        <th>Procuring Unit</th>
                                        <th>Requisition Unit</th>
                                        <th>End user Requisition Date</th>
                                        <th colspan="2">Technical Requirements</th>
                                        <th colspan="2">Publication of Tender Documents</th>
                                        <th>Tender Openning</th>
                                        <th colspan="2">Tender Evaluation / Shortlisting Report</th>
                                        <th>Short List Notice Publication</th>
                                        <th colspan="2">Invitation to Shortlisted Firms to Submit Proposals </th>
                                        <th colspan="2">Evaluation of Bids under Shortlist Method</th>
                                        <th>Purchase / Contracts Committee Approval</th>
                                        <th colspan="2">Secretary General (SGs) Approval of PC /CC Reports</th>
                                        <th colspan="3">Contract Vetting</th>
                                        <th>SG/ASG(A&F)/ DHRA Approval</th>
                                        <th>Contract Signing Date</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($EDF11_TFP as $item)
                                        <tr>
                                            <td>{{ $item->crt_no }}</td>
                                            <td>{{ $item->description_of_goods_works_and_services }}</td>
                                            <td>{{ $item->category_of_procurement}}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{{ $item->unit_of_measure}}</td>
                                            <td>{{ $item->Procurement_method }}</td>
                                            <td>{{ $item->type_of_contract }}</td>
                                            <td>{{ $item->allocated_amount }}</td>
                                            <td>{{ $item->currency }}</td>
                                            <td>{{ $item->source_of_funding }}</td>
                                            <td>{{ $item->procuring_unit }}</td>
                                            <td>{{ $item->requisition_unit }}</td>
                                            <td>{{ $item->end_user_requisition_date }}</td>                                           
                                            <td>{{$item->technical_requirements_receipt_of_final_technical_requirements_date}}</td>
                                            <td>{{$item->technical_requirements_preparation_of_tender_document}}</td>
                                            <td>{{$item->publication_of_tender_documents_publication_date}}</td>
                                            <td>{{ $item->publication_of_tender_documents_closing_date }}</td>  
                                            <td>{{$item->tender_openning}}</td>
                                            <td>{{$item->tender_evaluation_shortlisting_report_start_date}}</td>
                                            <td>{{$item->tender_evaluation_shortlisting_Report_end_date}}</td>
                                            <td>{{$item->short_list_notice_publication}}</td>
                                            <td>{{$item->invitation_to_shortlisted_firms_to_submit_proposals_invitation_date}}</td>
                                            <td>{{$item->invitation_to_shortlisted_firms_to_submit_proposals_closing_date}}</td>
                                            <td>{{$item->evaluation_of_bids_under_shortlist_method_start_date}}</td>
                                            <td>{{$item->evaluation_of_bids_under_shortlist_method_end_date}}</td>
                                            <td>{{$item->purchase_contracts_committee_approval}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_submission_date}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_approval_date}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_approval_date}}</td>
                                            <td>{{$item->contract_vetting_submission_date}}</td>
                                            <td>{{$item->contract_vetting_approval_date}}</td>
                                            <td>{{$item->contract_amount}}</td>
                                            <td>{{$item->sg_asg_a_and_f_dhra_approval}}</td>
                                            <td>{{$item->contract_signing_date}}</td>

                                           
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            </div>
                          

                            <style>
                                .w-5 {
                                    display: none;
                                }
                            </style>

                        </section>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-12">

                        <section id="Approved_suppliers">
                            <h3 class="heading" style="color: rgb(26, 239, 54)">TRADE IN SERVICES TABLE</h3>

                            <div class="table-responsive">

                            <table class="table table-bordered table-striped" id="smpl_tbl">
                                <thead>
                                    <tr>
                                        <th>Crt.No. </th>
                                        <th>Description of Goods/Works & Services</th>
                                        <th>Category of Procurement</th>
                                        <th>Qty</th>
                                        <th>Unit of Measure</th>
                                        <th>Procurement Method</th>
                                        <th>Type of Contract</th>
                                        <th>Years in Business</th>
                                        <th>Allocated Amount</th>
                                        <th>Currency</th>
                                        <th>Procuring Unit</th>
                                        <th>Requisition Unit</th>
                                        <th>End user Requisition Date</th>
                                        <th colspan="2">Technical Requirements</th>
                                        <th colspan="2">Publication of Tender Documents</th>
                                        <th>Tender Openning</th>
                                        <th colspan="2">Tender Evaluation / Shortlisting Report</th>
                                        <th>Short List Notice Publication</th>
                                        <th colspan="2">Invitation to Shortlisted Firms to Submit Proposals </th>
                                        <th colspan="2">Evaluation of Bids under Shortlist Method</th>
                                        <th>Purchase / Contracts Committee Approval</th>
                                        <th colspan="2">Secretary General (SGs) Approval of PC /CC Reports</th>
                                        <th colspan="3">Contract Vetting</th>
                                        <th>SG/ASG(A&F)/ DHRA Approval</th>
                                        <th>Contract Signing Date</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($TRADE_IN_SERVICES as $item)
                                        <tr>
                                            <td>{{ $item->crt_no }}</td>
                                            <td>{{ $item->description_of_goods_works_and_services }}</td>
                                            <td>{{ $item->category_of_procurement}}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{{ $item->unit_of_measure}}</td>
                                            <td>{{ $item->Procurement_method }}</td>
                                            <td>{{ $item->type_of_contract }}</td>
                                            <td>{{ $item->allocated_amount }}</td>
                                            <td>{{ $item->currency }}</td>
                                            <td>{{ $item->source_of_funding }}</td>
                                            <td>{{ $item->procuring_unit }}</td>
                                            <td>{{ $item->requisition_unit }}</td>
                                            <td>{{ $item->end_user_requisition_date }}</td>                                           
                                            <td>{{$item->technical_requirements_receipt_of_final_technical_requirements_date}}</td>
                                            <td>{{$item->technical_requirements_preparation_of_tender_document}}</td>
                                            <td>{{$item->publication_of_tender_documents_publication_date}}</td>
                                            <td>{{ $item->publication_of_tender_documents_closing_date }}</td>  
                                            <td>{{$item->tender_openning}}</td>
                                            <td>{{$item->tender_evaluation_shortlisting_report_start_date}}</td>
                                            <td>{{$item->tender_evaluation_shortlisting_Report_end_date}}</td>
                                            <td>{{$item->short_list_notice_publication}}</td>
                                            <td>{{$item->invitation_to_shortlisted_firms_to_submit_proposals_invitation_date}}</td>
                                            <td>{{$item->invitation_to_shortlisted_firms_to_submit_proposals_closing_date}}</td>
                                            <td>{{$item->evaluation_of_bids_under_shortlist_method_start_date}}</td>
                                            <td>{{$item->evaluation_of_bids_under_shortlist_method_end_date}}</td>
                                            <td>{{$item->purchase_contracts_committee_approval}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_submission_date}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_approval_date}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_approval_date}}</td>
                                            <td>{{$item->contract_vetting_submission_date}}</td>
                                            <td>{{$item->contract_vetting_approval_date}}</td>
                                            <td>{{$item->contract_amount}}</td>
                                            <td>{{$item->sg_asg_a_and_f_dhra_approval}}</td>
                                            <td>{{$item->contract_signing_date}}</td>

                                           
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            </div>
                          

                            <style>
                                .w-5 {
                                    display: none;
                                }
                            </style>

                        </section>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-12">

                        <section id="Approved_suppliers">
                            <h3 class="heading" style="color: rgb(26, 239, 54)">SSCBT1 TABLE</h3>

                            <div class="table-responsive">

                            <table class="table table-bordered table-striped" id="smpl_tbl">
                                <thead>
                                    <tr>
                                        <th>Crt.No. </th>
                                        <th>Description of Goods/Works & Services</th>
                                        <th>Category of Procurement</th>
                                        <th>Qty</th>
                                        <th>Unit of Measure</th>
                                        <th>Procurement Method</th>
                                        <th>Type of Contract</th>
                                        <th>Years in Business</th>
                                        <th>Allocated Amount</th>
                                        <th>Currency</th>
                                        <th>Procuring Unit</th>
                                        <th>Requisition Unit</th>
                                        <th>End user Requisition Date</th>
                                        <th colspan="2">Technical Requirements</th>
                                        <th colspan="2">Publication of Tender Documents</th>
                                        <th>Tender Openning</th>
                                        <th colspan="2">Tender Evaluation / Shortlisting Report</th>
                                        <th>Short List Notice Publication</th>
                                        <th colspan="2">Invitation to Shortlisted Firms to Submit Proposals </th>
                                        <th colspan="2">Evaluation of Bids under Shortlist Method</th>
                                        <th>Purchase / Contracts Committee Approval</th>
                                        <th colspan="2">Secretary General (SGs) Approval of PC /CC Reports</th>
                                        <th colspan="3">Contract Vetting</th>
                                        <th>SG/ASG(A&F)/ DHRA Approval</th>
                                        <th>Contract Signing Date</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($SSCBT1 as $item)
                                        <tr>
                                            <td>{{ $item->crt_no }}</td>
                                            <td>{{ $item->description_of_goods_works_and_services }}</td>
                                            <td>{{ $item->category_of_procurement}}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{{ $item->unit_of_measure}}</td>
                                            <td>{{ $item->Procurement_method }}</td>
                                            <td>{{ $item->type_of_contract }}</td>
                                            <td>{{ $item->allocated_amount }}</td>
                                            <td>{{ $item->currency }}</td>
                                            <td>{{ $item->source_of_funding }}</td>
                                            <td>{{ $item->procuring_unit }}</td>
                                            <td>{{ $item->requisition_unit }}</td>
                                            <td>{{ $item->end_user_requisition_date }}</td>                                           
                                            <td>{{$item->technical_requirements_receipt_of_final_technical_requirements_date}}</td>
                                            <td>{{$item->technical_requirements_preparation_of_tender_document}}</td>
                                            <td>{{$item->publication_of_tender_documents_publication_date}}</td>
                                            <td>{{ $item->publication_of_tender_documents_closing_date }}</td>  
                                            <td>{{$item->tender_openning}}</td>
                                            <td>{{$item->tender_evaluation_shortlisting_report_start_date}}</td>
                                            <td>{{$item->tender_evaluation_shortlisting_Report_end_date}}</td>
                                            <td>{{$item->short_list_notice_publication}}</td>
                                            <td>{{$item->invitation_to_shortlisted_firms_to_submit_proposals_invitation_date}}</td>
                                            <td>{{$item->invitation_to_shortlisted_firms_to_submit_proposals_closing_date}}</td>
                                            <td>{{$item->evaluation_of_bids_under_shortlist_method_start_date}}</td>
                                            <td>{{$item->evaluation_of_bids_under_shortlist_method_end_date}}</td>
                                            <td>{{$item->purchase_contracts_committee_approval}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_submission_date}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_approval_date}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_approval_date}}</td>
                                            <td>{{$item->contract_vetting_submission_date}}</td>
                                            <td>{{$item->contract_vetting_approval_date}}</td>
                                            <td>{{$item->contract_amount}}</td>
                                            <td>{{$item->sg_asg_a_and_f_dhra_approval}}</td>
                                            <td>{{$item->contract_signing_date}}</td>

                                           
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            </div>
                          

                            <style>
                                .w-5 {
                                    display: none;
                                }
                            </style>

                        </section>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-12">

                        <section id="Approved_suppliers">
                            <h3 class="heading" style="color: rgb(26, 239, 54)">TCPB11 TABLE</h3>

                            <div class="table-responsive">

                            <table class="table table-bordered table-striped" id="smpl_tbl">
                                <thead>
                                    <tr>
                                        <th>Crt.No. </th>
                                        <th>Description of Goods/Works & Services</th>
                                        <th>Category of Procurement</th>
                                        <th>Qty</th>
                                        <th>Unit of Measure</th>
                                        <th>Procurement Method</th>
                                        <th>Type of Contract</th>
                                        <th>Years in Business</th>
                                        <th>Allocated Amount</th>
                                        <th>Currency</th>
                                        <th>Procuring Unit</th>
                                        <th>Requisition Unit</th>
                                        <th>End user Requisition Date</th>
                                        <th colspan="2">Technical Requirements</th>
                                        <th colspan="2">Publication of Tender Documents</th>
                                        <th>Tender Openning</th>
                                        <th colspan="2">Tender Evaluation / Shortlisting Report</th>
                                        <th>Short List Notice Publication</th>
                                        <th colspan="2">Invitation to Shortlisted Firms to Submit Proposals </th>
                                        <th colspan="2">Evaluation of Bids under Shortlist Method</th>
                                        <th>Purchase / Contracts Committee Approval</th>
                                        <th colspan="2">Secretary General (SGs) Approval of PC /CC Reports</th>
                                        <th colspan="3">Contract Vetting</th>
                                        <th>SG/ASG(A&F)/ DHRA Approval</th>
                                        <th>Contract Signing Date</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($TCPB11 as $item)
                                        <tr>
                                            <td>{{ $item->crt_no }}</td>
                                            <td>{{ $item->description_of_goods_works_and_services }}</td>
                                            <td>{{ $item->category_of_procurement}}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{{ $item->unit_of_measure}}</td>
                                            <td>{{ $item->Procurement_method }}</td>
                                            <td>{{ $item->type_of_contract }}</td>
                                            <td>{{ $item->allocated_amount }}</td>
                                            <td>{{ $item->currency }}</td>
                                            <td>{{ $item->source_of_funding }}</td>
                                            <td>{{ $item->procuring_unit }}</td>
                                            <td>{{ $item->requisition_unit }}</td>
                                            <td>{{ $item->end_user_requisition_date }}</td>                                           
                                            <td>{{$item->technical_requirements_receipt_of_final_technical_requirements_date}}</td>
                                            <td>{{$item->technical_requirements_preparation_of_tender_document}}</td>
                                            <td>{{$item->publication_of_tender_documents_publication_date}}</td>
                                            <td>{{ $item->publication_of_tender_documents_closing_date }}</td>  
                                            <td>{{$item->tender_openning}}</td>
                                            <td>{{$item->tender_evaluation_shortlisting_report_start_date}}</td>
                                            <td>{{$item->tender_evaluation_shortlisting_Report_end_date}}</td>
                                            <td>{{$item->short_list_notice_publication}}</td>
                                            <td>{{$item->invitation_to_shortlisted_firms_to_submit_proposals_invitation_date}}</td>
                                            <td>{{$item->invitation_to_shortlisted_firms_to_submit_proposals_closing_date}}</td>
                                            <td>{{$item->evaluation_of_bids_under_shortlist_method_start_date}}</td>
                                            <td>{{$item->evaluation_of_bids_under_shortlist_method_end_date}}</td>
                                            <td>{{$item->purchase_contracts_committee_approval}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_submission_date}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_approval_date}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_approval_date}}</td>
                                            <td>{{$item->contract_vetting_submission_date}}</td>
                                            <td>{{$item->contract_vetting_approval_date}}</td>
                                            <td>{{$item->contract_amount}}</td>
                                            <td>{{$item->sg_asg_a_and_f_dhra_approval}}</td>
                                            <td>{{$item->contract_signing_date}}</td>

                                           
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            </div>
                          

                            <style>
                                .w-5 {
                                    display: none;
                                }
                            </style>

                        </section>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-12 col-md-12">

                        <section id="Approved_suppliers">
                            <h3 class="heading" style="color: rgb(26, 239, 54)">GENDER AND SOCIAL AFFAIRS DIVISION TABLE</h3>

                            <div class="table-responsive">

                            <table class="table table-bordered table-striped" id="smpl_tbl">
                                <thead>
                                    <tr>
                                        <th>Crt.No. </th>
                                        <th>Description of Goods/Works & Services</th>
                                        <th>Category of Procurement</th>
                                        <th>Qty</th>
                                        <th>Unit of Measure</th>
                                        <th>Procurement Method</th>
                                        <th>Type of Contract</th>
                                        <th>Years in Business</th>
                                        <th>Allocated Amount</th>
                                        <th>Currency</th>
                                        <th>Procuring Unit</th>
                                        <th>Requisition Unit</th>
                                        <th>End user Requisition Date</th>
                                        <th colspan="2">Technical Requirements</th>
                                        <th colspan="2">Publication of Tender Documents</th>
                                        <th>Tender Openning</th>
                                        <th colspan="2">Tender Evaluation / Shortlisting Report</th>
                                        <th>Short List Notice Publication</th>
                                        <th colspan="2">Invitation to Shortlisted Firms to Submit Proposals </th>
                                        <th colspan="2">Evaluation of Bids under Shortlist Method</th>
                                        <th>Purchase / Contracts Committee Approval</th>
                                        <th colspan="2">Secretary General (SGs) Approval of PC /CC Reports</th>
                                        <th colspan="3">Contract Vetting</th>
                                        <th>SG/ASG(A&F)/ DHRA Approval</th>
                                        <th>Contract Signing Date</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($GENDER_AND_SOCIAL_AFFAIRS_DIVISION as $item)
                                        <tr>
                                            <td>{{ $item->crt_no }}</td>
                                            <td>{{ $item->description_of_goods_works_and_services }}</td>
                                            <td>{{ $item->category_of_procurement}}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{{ $item->unit_of_measure}}</td>
                                            <td>{{ $item->Procurement_method }}</td>
                                            <td>{{ $item->type_of_contract }}</td>
                                            <td>{{ $item->allocated_amount }}</td>
                                            <td>{{ $item->currency }}</td>
                                            <td>{{ $item->source_of_funding }}</td>
                                            <td>{{ $item->procuring_unit }}</td>
                                            <td>{{ $item->requisition_unit }}</td>
                                            <td>{{ $item->end_user_requisition_date }}</td>                                           
                                            <td>{{$item->technical_requirements_receipt_of_final_technical_requirements_date}}</td>
                                            <td>{{$item->technical_requirements_preparation_of_tender_document}}</td>
                                            <td>{{$item->publication_of_tender_documents_publication_date}}</td>
                                            <td>{{ $item->publication_of_tender_documents_closing_date }}</td>  
                                            <td>{{$item->tender_openning}}</td>
                                            <td>{{$item->tender_evaluation_shortlisting_report_start_date}}</td>
                                            <td>{{$item->tender_evaluation_shortlisting_Report_end_date}}</td>
                                            <td>{{$item->short_list_notice_publication}}</td>
                                            <td>{{$item->invitation_to_shortlisted_firms_to_submit_proposals_invitation_date}}</td>
                                            <td>{{$item->invitation_to_shortlisted_firms_to_submit_proposals_closing_date}}</td>
                                            <td>{{$item->evaluation_of_bids_under_shortlist_method_start_date}}</td>
                                            <td>{{$item->evaluation_of_bids_under_shortlist_method_end_date}}</td>
                                            <td>{{$item->purchase_contracts_committee_approval}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_submission_date}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_approval_date}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_approval_date}}</td>
                                            <td>{{$item->contract_vetting_submission_date}}</td>
                                            <td>{{$item->contract_vetting_approval_date}}</td>
                                            <td>{{$item->contract_amount}}</td>
                                            <td>{{$item->sg_asg_a_and_f_dhra_approval}}</td>
                                            <td>{{$item->contract_signing_date}}</td>

                                           
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            </div>
                          

                            <style>
                                .w-5 {
                                    display: none;
                                }
                            </style>

                        </section>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-12 col-md-12">

                        <section id="Approved_suppliers">
                            <h3 class="heading" style="color: rgb(26, 239, 54)">IT DIVISION TABLE</h3>

                            <div class="table-responsive">

                            <table class="table table-bordered table-striped" id="smpl_tbl">
                                <thead>
                                    <tr>
                                        <th>Crt.No. </th>
                                        <th>Description of Goods/Works & Services</th>
                                        <th>Category of Procurement</th>
                                        <th>Qty</th>
                                        <th>Unit of Measure</th>
                                        <th>Procurement Method</th>
                                        <th>Type of Contract</th>
                                        <th>Years in Business</th>
                                        <th>Allocated Amount</th>
                                        <th>Currency</th>
                                        <th>Procuring Unit</th>
                                        <th>Requisition Unit</th>
                                        <th>End user Requisition Date</th>
                                        <th colspan="2">Technical Requirements</th>
                                        <th colspan="2">Publication of Tender Documents</th>
                                        <th>Tender Openning</th>
                                        <th colspan="2">Tender Evaluation / Shortlisting Report</th>
                                        <th>Short List Notice Publication</th>
                                        <th colspan="2">Invitation to Shortlisted Firms to Submit Proposals </th>
                                        <th colspan="2">Evaluation of Bids under Shortlist Method</th>
                                        <th>Purchase / Contracts Committee Approval</th>
                                        <th colspan="2">Secretary General (SGs) Approval of PC /CC Reports</th>
                                        <th colspan="3">Contract Vetting</th>
                                        <th>SG/ASG(A&F)/ DHRA Approval</th>
                                        <th>Contract Signing Date</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($IT_DIVISION as $item)
                                        <tr>
                                            <td>{{ $item->crt_no }}</td>
                                            <td>{{ $item->description_of_goods_works_and_services }}</td>
                                            <td>{{ $item->category_of_procurement}}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{{ $item->unit_of_measure}}</td>
                                            <td>{{ $item->Procurement_method }}</td>
                                            <td>{{ $item->type_of_contract }}</td>
                                            <td>{{ $item->allocated_amount }}</td>
                                            <td>{{ $item->currency }}</td>
                                            <td>{{ $item->source_of_funding }}</td>
                                            <td>{{ $item->procuring_unit }}</td>
                                            <td>{{ $item->requisition_unit }}</td>
                                            <td>{{ $item->end_user_requisition_date }}</td>                                           
                                            <td>{{$item->technical_requirements_receipt_of_final_technical_requirements_date}}</td>
                                            <td>{{$item->technical_requirements_preparation_of_tender_document}}</td>
                                            <td>{{$item->publication_of_tender_documents_publication_date}}</td>
                                            <td>{{ $item->publication_of_tender_documents_closing_date }}</td>  
                                            <td>{{$item->tender_openning}}</td>
                                            <td>{{$item->tender_evaluation_shortlisting_report_start_date}}</td>
                                            <td>{{$item->tender_evaluation_shortlisting_Report_end_date}}</td>
                                            <td>{{$item->short_list_notice_publication}}</td>
                                            <td>{{$item->invitation_to_shortlisted_firms_to_submit_proposals_invitation_date}}</td>
                                            <td>{{$item->invitation_to_shortlisted_firms_to_submit_proposals_closing_date}}</td>
                                            <td>{{$item->evaluation_of_bids_under_shortlist_method_start_date}}</td>
                                            <td>{{$item->evaluation_of_bids_under_shortlist_method_end_date}}</td>
                                            <td>{{$item->purchase_contracts_committee_approval}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_submission_date}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_approval_date}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_approval_date}}</td>
                                            <td>{{$item->contract_vetting_submission_date}}</td>
                                            <td>{{$item->contract_vetting_approval_date}}</td>
                                            <td>{{$item->contract_amount}}</td>
                                            <td>{{$item->sg_asg_a_and_f_dhra_approval}}</td>
                                            <td>{{$item->contract_signing_date}}</td>

                                           
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            </div>
                          

                            <style>
                                .w-5 {
                                    display: none;
                                }
                            </style>

                        </section>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-12 col-md-12">

                        <section id="Approved_suppliers">
                            <h3 class="heading" style="color: rgb(26, 239, 54)">HUMAN RESOURCE TABLE</h3>

                            <div class="table-responsive">

                            <table class="table table-bordered table-striped" id="smpl_tbl">
                                <thead>
                                    <tr>
                                        <th>Crt.No. </th>
                                        <th>Description of Goods/Works & Services</th>
                                        <th>Category of Procurement</th>
                                        <th>Qty</th>
                                        <th>Unit of Measure</th>
                                        <th>Procurement Method</th>
                                        <th>Type of Contract</th>
                                        <th>Years in Business</th>
                                        <th>Allocated Amount</th>
                                        <th>Currency</th>
                                        <th>Procuring Unit</th>
                                        <th>Requisition Unit</th>
                                        <th>End user Requisition Date</th>
                                        <th colspan="2">Technical Requirements</th>
                                        <th colspan="2">Publication of Tender Documents</th>
                                        <th>Tender Openning</th>
                                        <th colspan="2">Tender Evaluation / Shortlisting Report</th>
                                        <th>Short List Notice Publication</th>
                                        <th colspan="2">Invitation to Shortlisted Firms to Submit Proposals </th>
                                        <th colspan="2">Evaluation of Bids under Shortlist Method</th>
                                        <th>Purchase / Contracts Committee Approval</th>
                                        <th colspan="2">Secretary General (SGs) Approval of PC /CC Reports</th>
                                        <th colspan="3">Contract Vetting</th>
                                        <th>SG/ASG(A&F)/ DHRA Approval</th>
                                        <th>Contract Signing Date</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($HUMAN_RESOURCE as $item)
                                        <tr>
                                            <td>{{ $item->crt_no }}</td>
                                            <td>{{ $item->description_of_goods_works_and_services }}</td>
                                            <td>{{ $item->category_of_procurement}}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{{ $item->unit_of_measure}}</td>
                                            <td>{{ $item->Procurement_method }}</td>
                                            <td>{{ $item->type_of_contract }}</td>
                                            <td>{{ $item->allocated_amount }}</td>
                                            <td>{{ $item->currency }}</td>
                                            <td>{{ $item->source_of_funding }}</td>
                                            <td>{{ $item->procuring_unit }}</td>
                                            <td>{{ $item->requisition_unit }}</td>
                                            <td>{{ $item->end_user_requisition_date }}</td>                                           
                                            <td>{{$item->technical_requirements_receipt_of_final_technical_requirements_date}}</td>
                                            <td>{{$item->technical_requirements_preparation_of_tender_document}}</td>
                                            <td>{{$item->publication_of_tender_documents_publication_date}}</td>
                                            <td>{{ $item->publication_of_tender_documents_closing_date }}</td>  
                                            <td>{{$item->tender_openning}}</td>
                                            <td>{{$item->tender_evaluation_shortlisting_report_start_date}}</td>
                                            <td>{{$item->tender_evaluation_shortlisting_Report_end_date}}</td>
                                            <td>{{$item->short_list_notice_publication}}</td>
                                            <td>{{$item->invitation_to_shortlisted_firms_to_submit_proposals_invitation_date}}</td>
                                            <td>{{$item->invitation_to_shortlisted_firms_to_submit_proposals_closing_date}}</td>
                                            <td>{{$item->evaluation_of_bids_under_shortlist_method_start_date}}</td>
                                            <td>{{$item->evaluation_of_bids_under_shortlist_method_end_date}}</td>
                                            <td>{{$item->purchase_contracts_committee_approval}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_submission_date}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_approval_date}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_approval_date}}</td>
                                            <td>{{$item->contract_vetting_submission_date}}</td>
                                            <td>{{$item->contract_vetting_approval_date}}</td>
                                            <td>{{$item->contract_amount}}</td>
                                            <td>{{$item->sg_asg_a_and_f_dhra_approval}}</td>
                                            <td>{{$item->contract_signing_date}}</td>

                                           
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            </div>
                          

                            <style>
                                .w-5 {
                                    display: none;
                                }
                            </style>

                        </section>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-12 col-md-12">

                        <section id="Approved_suppliers">
                            <h3 class="heading" style="color: rgb(26, 239, 54)">Finance and Budgeting TABLE</h3>

                            <div class="table-responsive">

                            <table class="table table-bordered table-striped" id="smpl_tbl">
                                <thead>
                                    <tr>
                                        <th>Crt.No. </th>
                                        <th>Description of Goods/Works & Services</th>
                                        <th>Category of Procurement</th>
                                        <th>Qty</th>
                                        <th>Unit of Measure</th>
                                        <th>Procurement Method</th>
                                        <th>Type of Contract</th>
                                        <th>Years in Business</th>
                                        <th>Allocated Amount</th>
                                        <th>Currency</th>
                                        <th>Procuring Unit</th>
                                        <th>Requisition Unit</th>
                                        <th>End user Requisition Date</th>
                                        <th colspan="2">Technical Requirements</th>
                                        <th colspan="2">Publication of Tender Documents</th>
                                        <th>Tender Openning</th>
                                        <th colspan="2">Tender Evaluation / Shortlisting Report</th>
                                        <th>Short List Notice Publication</th>
                                        <th colspan="2">Invitation to Shortlisted Firms to Submit Proposals </th>
                                        <th colspan="2">Evaluation of Bids under Shortlist Method</th>
                                        <th>Purchase / Contracts Committee Approval</th>
                                        <th colspan="2">Secretary General (SGs) Approval of PC /CC Reports</th>
                                        <th colspan="3">Contract Vetting</th>
                                        <th>SG/ASG(A&F)/ DHRA Approval</th>
                                        <th>Contract Signing Date</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($Finance_and_Budgeting as $item)
                                        <tr>
                                            <td>{{ $item->crt_no }}</td>
                                            <td>{{ $item->description_of_goods_works_and_services }}</td>
                                            <td>{{ $item->category_of_procurement}}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{{ $item->unit_of_measure}}</td>
                                            <td>{{ $item->Procurement_method }}</td>
                                            <td>{{ $item->type_of_contract }}</td>
                                            <td>{{ $item->allocated_amount }}</td>
                                            <td>{{ $item->currency }}</td>
                                            <td>{{ $item->source_of_funding }}</td>
                                            <td>{{ $item->procuring_unit }}</td>
                                            <td>{{ $item->requisition_unit }}</td>
                                            <td>{{ $item->end_user_requisition_date }}</td>                                           
                                            <td>{{$item->technical_requirements_receipt_of_final_technical_requirements_date}}</td>
                                            <td>{{$item->technical_requirements_preparation_of_tender_document}}</td>
                                            <td>{{$item->publication_of_tender_documents_publication_date}}</td>
                                            <td>{{ $item->publication_of_tender_documents_closing_date }}</td>  
                                            <td>{{$item->tender_openning}}</td>
                                            <td>{{$item->tender_evaluation_shortlisting_report_start_date}}</td>
                                            <td>{{$item->tender_evaluation_shortlisting_Report_end_date}}</td>
                                            <td>{{$item->short_list_notice_publication}}</td>
                                            <td>{{$item->invitation_to_shortlisted_firms_to_submit_proposals_invitation_date}}</td>
                                            <td>{{$item->invitation_to_shortlisted_firms_to_submit_proposals_closing_date}}</td>
                                            <td>{{$item->evaluation_of_bids_under_shortlist_method_start_date}}</td>
                                            <td>{{$item->evaluation_of_bids_under_shortlist_method_end_date}}</td>
                                            <td>{{$item->purchase_contracts_committee_approval}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_submission_date}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_approval_date}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_approval_date}}</td>
                                            <td>{{$item->contract_vetting_submission_date}}</td>
                                            <td>{{$item->contract_vetting_approval_date}}</td>
                                            <td>{{$item->contract_amount}}</td>
                                            <td>{{$item->sg_asg_a_and_f_dhra_approval}}</td>
                                            <td>{{$item->contract_signing_date}}</td>

                                           
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            </div>
                          

                            <style>
                                .w-5 {
                                    display: none;
                                }
                            </style>

                        </section>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-12">

                        <section id="Approved_suppliers">
                            <h3 class="heading" style="color: rgb(26, 239, 54)">Industry and Agriculture TABLE</h3>

                            <div class="table-responsive">

                            <table class="table table-bordered table-striped" id="smpl_tbl">
                                <thead>
                                    <tr>
                                        <th>Crt.No. </th>
                                        <th>Description of Goods/Works & Services</th>
                                        <th>Category of Procurement</th>
                                        <th>Qty</th>
                                        <th>Unit of Measure</th>
                                        <th>Procurement Method</th>
                                        <th>Type of Contract</th>
                                        <th>Years in Business</th>
                                        <th>Allocated Amount</th>
                                        <th>Currency</th>
                                        <th>Procuring Unit</th>
                                        <th>Requisition Unit</th>
                                        <th>End user Requisition Date</th>
                                        <th colspan="2">Technical Requirements</th>
                                        <th colspan="2">Publication of Tender Documents</th>
                                        <th>Tender Openning</th>
                                        <th colspan="2">Tender Evaluation / Shortlisting Report</th>
                                        <th>Short List Notice Publication</th>
                                        <th colspan="2">Invitation to Shortlisted Firms to Submit Proposals </th>
                                        <th colspan="2">Evaluation of Bids under Shortlist Method</th>
                                        <th>Purchase / Contracts Committee Approval</th>
                                        <th colspan="2">Secretary General (SGs) Approval of PC /CC Reports</th>
                                        <th colspan="3">Contract Vetting</th>
                                        <th>SG/ASG(A&F)/ DHRA Approval</th>
                                        <th>Contract Signing Date</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($Industry_and_Agriculture as $item)
                                        <tr>
                                            <td>{{ $item->crt_no }}</td>
                                            <td>{{ $item->description_of_goods_works_and_services }}</td>
                                            <td>{{ $item->category_of_procurement}}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{{ $item->unit_of_measure}}</td>
                                            <td>{{ $item->Procurement_method }}</td>
                                            <td>{{ $item->type_of_contract }}</td>
                                            <td>{{ $item->allocated_amount }}</td>
                                            <td>{{ $item->currency }}</td>
                                            <td>{{ $item->source_of_funding }}</td>
                                            <td>{{ $item->procuring_unit }}</td>
                                            <td>{{ $item->requisition_unit }}</td>
                                            <td>{{ $item->end_user_requisition_date }}</td>                                           
                                            <td>{{$item->technical_requirements_receipt_of_final_technical_requirements_date}}</td>
                                            <td>{{$item->technical_requirements_preparation_of_tender_document}}</td>
                                            <td>{{$item->publication_of_tender_documents_publication_date}}</td>
                                            <td>{{ $item->publication_of_tender_documents_closing_date }}</td>  
                                            <td>{{$item->tender_openning}}</td>
                                            <td>{{$item->tender_evaluation_shortlisting_report_start_date}}</td>
                                            <td>{{$item->tender_evaluation_shortlisting_Report_end_date}}</td>
                                            <td>{{$item->short_list_notice_publication}}</td>
                                            <td>{{$item->invitation_to_shortlisted_firms_to_submit_proposals_invitation_date}}</td>
                                            <td>{{$item->invitation_to_shortlisted_firms_to_submit_proposals_closing_date}}</td>
                                            <td>{{$item->evaluation_of_bids_under_shortlist_method_start_date}}</td>
                                            <td>{{$item->evaluation_of_bids_under_shortlist_method_end_date}}</td>
                                            <td>{{$item->purchase_contracts_committee_approval}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_submission_date}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_approval_date}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_approval_date}}</td>
                                            <td>{{$item->contract_vetting_submission_date}}</td>
                                            <td>{{$item->contract_vetting_approval_date}}</td>
                                            <td>{{$item->contract_amount}}</td>
                                            <td>{{$item->sg_asg_a_and_f_dhra_approval}}</td>
                                            <td>{{$item->contract_signing_date}}</td>

                                           
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            </div>
                          

                            <style>
                                .w-5 {
                                    display: none;
                                }
                            </style>

                        </section>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-12">

                        <section id="Approved_suppliers">
                            <h3 class="heading" style="color: rgb(26, 239, 54)">Procurement & Supplies Unit TABLE</h3>

                            <div class="table-responsive">

                            <table class="table table-bordered table-striped" id="smpl_tbl">
                                <thead>
                                    <tr>
                                        <th>Crt.No. </th>
                                        <th>Description of Goods/Works & Services</th>
                                        <th>Category of Procurement</th>
                                        <th>Qty</th>
                                        <th>Unit of Measure</th>
                                        <th>Procurement Method</th>
                                        <th>Type of Contract</th>
                                        <th>Years in Business</th>
                                        <th>Allocated Amount</th>
                                        <th>Currency</th>
                                        <th>Procuring Unit</th>
                                        <th>Requisition Unit</th>
                                        <th>End user Requisition Date</th>
                                        <th colspan="2">Technical Requirements</th>
                                        <th colspan="2">Publication of Tender Documents</th>
                                        <th>Tender Openning</th>
                                        <th colspan="2">Tender Evaluation / Shortlisting Report</th>
                                        <th>Short List Notice Publication</th>
                                        <th colspan="2">Invitation to Shortlisted Firms to Submit Proposals </th>
                                        <th colspan="2">Evaluation of Bids under Shortlist Method</th>
                                        <th>Purchase / Contracts Committee Approval</th>
                                        <th colspan="2">Secretary General (SGs) Approval of PC /CC Reports</th>
                                        <th colspan="3">Contract Vetting</th>
                                        <th>SG/ASG(A&F)/ DHRA Approval</th>
                                        <th>Contract Signing Date</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($Procurement_and_Supplies as $item)
                                        <tr>
                                            <td>{{ $item->crt_no }}</td>
                                            <td>{{ $item->description_of_goods_works_and_services }}</td>
                                            <td>{{ $item->category_of_procurement}}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{{ $item->unit_of_measure}}</td>
                                            <td>{{ $item->Procurement_method }}</td>
                                            <td>{{ $item->type_of_contract }}</td>
                                            <td>{{ $item->allocated_amount }}</td>
                                            <td>{{ $item->currency }}</td>
                                            <td>{{ $item->source_of_funding }}</td>
                                            <td>{{ $item->procuring_unit }}</td>
                                            <td>{{ $item->requisition_unit }}</td>
                                            <td>{{ $item->end_user_requisition_date }}</td>                                           
                                            <td>{{$item->technical_requirements_receipt_of_final_technical_requirements_date}}</td>
                                            <td>{{$item->technical_requirements_preparation_of_tender_document}}</td>
                                            <td>{{$item->publication_of_tender_documents_publication_date}}</td>
                                            <td>{{ $item->publication_of_tender_documents_closing_date }}</td>  
                                            <td>{{$item->tender_openning}}</td>
                                            <td>{{$item->tender_evaluation_shortlisting_report_start_date}}</td>
                                            <td>{{$item->tender_evaluation_shortlisting_Report_end_date}}</td>
                                            <td>{{$item->short_list_notice_publication}}</td>
                                            <td>{{$item->invitation_to_shortlisted_firms_to_submit_proposals_invitation_date}}</td>
                                            <td>{{$item->invitation_to_shortlisted_firms_to_submit_proposals_closing_date}}</td>
                                            <td>{{$item->evaluation_of_bids_under_shortlist_method_start_date}}</td>
                                            <td>{{$item->evaluation_of_bids_under_shortlist_method_end_date}}</td>
                                            <td>{{$item->purchase_contracts_committee_approval}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_submission_date}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_approval_date}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_approval_date}}</td>
                                            <td>{{$item->contract_vetting_submission_date}}</td>
                                            <td>{{$item->contract_vetting_approval_date}}</td>
                                            <td>{{$item->contract_amount}}</td>
                                            <td>{{$item->sg_asg_a_and_f_dhra_approval}}</td>
                                            <td>{{$item->contract_signing_date}}</td>

                                           
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            </div>
                          

                            <style>
                                .w-5 {
                                    display: none;
                                }
                            </style>

                        </section>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-12">

                        <section id="Approved_suppliers">
                            <h3 class="heading" style="color: rgb(26, 239, 54)">Statistics TABLE</h3>

                            <div class="table-responsive">

                            <table class="table table-bordered table-striped" id="smpl_tbl">
                                <thead>
                                    <tr>
                                        <th>Crt.No. </th>
                                        <th>Description of Goods/Works & Services</th>
                                        <th>Category of Procurement</th>
                                        <th>Qty</th>
                                        <th>Unit of Measure</th>
                                        <th>Procurement Method</th>
                                        <th>Type of Contract</th>
                                        <th>Years in Business</th>
                                        <th>Allocated Amount</th>
                                        <th>Currency</th>
                                        <th>Procuring Unit</th>
                                        <th>Requisition Unit</th>
                                        <th>End user Requisition Date</th>
                                        <th colspan="2">Technical Requirements</th>
                                        <th colspan="2">Publication of Tender Documents</th>
                                        <th>Tender Openning</th>
                                        <th colspan="2">Tender Evaluation / Shortlisting Report</th>
                                        <th>Short List Notice Publication</th>
                                        <th colspan="2">Invitation to Shortlisted Firms to Submit Proposals </th>
                                        <th colspan="2">Evaluation of Bids under Shortlist Method</th>
                                        <th>Purchase / Contracts Committee Approval</th>
                                        <th colspan="2">Secretary General (SGs) Approval of PC /CC Reports</th>
                                        <th colspan="3">Contract Vetting</th>
                                        <th>SG/ASG(A&F)/ DHRA Approval</th>
                                        <th>Contract Signing Date</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($Statistics as $item)
                                        <tr>
                                            <td>{{ $item->crt_no }}</td>
                                            <td>{{ $item->description_of_goods_works_and_services }}</td>
                                            <td>{{ $item->category_of_procurement}}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{{ $item->unit_of_measure}}</td>
                                            <td>{{ $item->Procurement_method }}</td>
                                            <td>{{$item->type_of_contract }}</td>
                                            <td>{{$item->allocated_amount }}</td>
                                            <td>{{$item->currency }}</td>
                                            <td>{{$item->source_of_funding }}</td>
                                            <td>{{$item->procuring_unit }}</td>
                                            <td>{{$item->requisition_unit }}</td>
                                            <td>{{$item->end_user_requisition_date }}</td>                                           
                                            <td>{{$item->technical_requirements_receipt_of_final_technical_requirements_date}}</td>
                                            <td>{{$item->technical_requirements_preparation_of_tender_document}}</td>
                                            <td>{{$item->publication_of_tender_documents_publication_date}}</td>
                                            <td>{{$item->publication_of_tender_documents_closing_date }}</td>  
                                            <td>{{$item->tender_openning}}</td>
                                            <td>{{$item->tender_evaluation_shortlisting_report_start_date}}</td>
                                            <td>{{$item->tender_evaluation_shortlisting_Report_end_date}}</td>
                                            <td>{{$item->short_list_notice_publication}}</td>
                                            <td>{{$item->invitation_to_shortlisted_firms_to_submit_proposals_invitation_date}}</td>
                                            <td>{{$item->invitation_to_shortlisted_firms_to_submit_proposals_closing_date}}</td>
                                            <td>{{$item->evaluation_of_bids_under_shortlist_method_start_date}}</td>
                                            <td>{{$item->evaluation_of_bids_under_shortlist_method_end_date}}</td>
                                            <td>{{$item->purchase_contracts_committee_approval}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_submission_date}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_approval_date}}</td>
                                            <td>{{$item->secretary_general_approval_of_pc_cc_reports_approval_date}}</td>
                                            <td>{{$item->contract_vetting_submission_date}}</td>
                                            <td>{{$item->contract_vetting_approval_date}}</td>
                                            <td>{{$item->contract_amount}}</td>
                                            <td>{{$item->sg_asg_a_and_f_dhra_approval}}</td>
                                            <td>{{$item->contract_signing_date}}</td>

                                           
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            </div>
                          

                            <style>
                                .w-5 {
                                    display: none;
                                }
                            </style>

                        </section>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <a href="/assets/javascript:void(0)" class="sidebar_switch on_switch bs_ttip" data-placement="auto right"
        data-viewport="body" title="Hide Sidebar">Sidebar switch</a>

    @include('includes.side-bar')

    <script src="/assets/js/jquery.min.js"></script>
    <script type="text/javascript">
        // Jquery entering here
    </script>








    <script src="/assets/js/jquery-migrate.min.js"></script>
    <script src="/assets/lib/jquery-ui/jquery-ui-1.10.0.custom.min.js"></script>
    <!-- touch events for jquery ui-->
    <script src="/assets/js/forms/jquery.ui.touch-punch.min.js"></script>
    <!-- easing plugin -->
    <script src="/assets/js/jquery.easing.1.3.min.js"></script>
    <!-- smart resize event -->
    <script src="/assets/js/jquery.debouncedresize.min.js"></script>
    <!-- js cookie plugin -->
    <script src="/assets/js/jquery_cookie_min.js"></script>
    <!-- main bootstrap js -->
    <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- bootstrap plugins -->
    <script src="/assets/js/bootstrap.plugins.min.js"></script>
    <!-- typeahead -->
    <script src="/assets/lib/typeahead/typeahead.min.js"></script>
    <!-- code prettifier -->
    <script src="/assets/lib/google-code-prettify/prettify.min.js"></script>
    <!-- sticky messages -->
    <script src="/assets/lib/sticky/sticky.min.js"></script>
    <!-- lightbox -->
    <script src="/assets/lib/colorbox/jquery.colorbox.min.js"></script>
    <!-- jBreadcrumbs -->
    <script src="/assets/lib/jBreadcrumbs/js/jquery.jBreadCrumb.1.1.min.js"></script>
    <!-- hidden elements width/height -->
    <script src="/assets/js/jquery.actual.min.js"></script>
    <!-- custom scrollbar -->
    <script src="/assets/lib/slimScroll/jquery.slimscroll.js"></script>
    <!-- fix for ios orientation change -->
    <script src="/assets/js/ios-orientationchange-fix.js"></script>
    <!-- to top -->
    <script src="/assets/lib/UItoTop/jquery.ui.totop.min.js"></script>
    <!-- mobile nav -->
    <script src="/assets/js/selectNav.js"></script>
    <!-- moment.js date library -->
    <script src="/assets/lib/moment/moment.min.js"></script>

    <!-- common functions -->
    <script src="/assets/js/pages/gebo_common.js"></script>

    <!-- multi-column layout -->
    <script src="/assets/js/jquery.imagesloaded.min.js"></script>
    <script src="/assets/js/jquery.wookmark.js"></script>
    <!-- responsive table -->
    <script src="/assets/js/jquery.mediaTable.min.js"></script>
    <!-- small charts -->
    <script src="/assets/js/jquery.peity.min.js"></script>
    <!-- charts -->
    <script src="/assets/lib/flot/jquery.flot.min.js"></script>
    <script src="/assets/lib/flot/jquery.flot.resize.min.js"></script>
    <script src="/assets/lib/flot/jquery.flot.pie.min.js"></script>
    <script src="/assets/lib/flot.tooltip/jquery.flot.tooltip.min.js"></script>
    <!-- calendar -->
    <script src="/assets/lib/fullcalendar/fullcalendar.min.js"></script>
    <!-- sortable/filterable list -->
    <script src="/assets/lib/list_js/list.min.js"></script>
    <script src="/assets/lib/list_js/plugins/paging/list.paging.min.js"></script>
    <!-- dashboard functions -->
    <script src="/assets/js/pages/gebo_dashboard.js"></script>



</body>

</html>
