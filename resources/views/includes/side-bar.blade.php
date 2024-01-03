<div class="sidebar">
    <div class="sidebar_inner_scroll">
        <div class="sidebar_inner">
            <div id="side_accordion" class="panel-group">

                <input type="hidden" id="hidden_role" value="{{ $LoggedUserAdmin['user_role'] }}">
                <input type="hidden" id="hidden_status" value="{{ $LoggedUserAdmin['user_status'] }}">
                <input type="hidden" id="hidden_id" value="{{ $LoggedUserAdmin['id'] }}">
                <input type="hidden" id="hidden_originator_name" value="{{ $LoggedUserAdmin['firstname']}} {{ $LoggedUserAdmin['lastname'] }}">


                <input type="hidden" id="procurement_approval_status"
                    value="{{ $LoggedUserAdmin['procurement_approval_status'] }}">


                <div class="panel panel-default" id="Dashboard">
                    <div class="panel-heading">
                        <a href="#collapseOne" data-parent="#side_accordion" data-toggle="collapse"
                            class="accordion-toggle">
                            <i class="glyphicon glyphicon-folder-close"></i> Dashboard
                        </a>
                    </div>
                </div>


                <div id="supplier_menu">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="#collapseTwo" data-parent="#side_accordion" data-toggle="collapse"
                                class="accordion-toggle">
                                <i class="glyphicon glyphicon-th"></i> Supplier
                            </a>
                        </div>

                        <div class="accordion-body collapse" id="collapseTwo">
                            <div class="panel-body">
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a id="supplier_1" class="supplier_info"
                                            href="{{ route('approve-dashboard') }}">Supplier
                                            Approvals</a></li>

                                    {{-- <li><a href="{{'approved_by_admin/'.$LoggedUserAdmin['id']" class="btn btn-sm btn-danger" </i></a></li> --}}

                                    <li><a id="supplier_1" class=""
                                            href="{{ url('view-approved-suppliers/' . $LoggedUserAdmin['id']) }}">
                                            View Approved records</a></li>

                                    <li><a id="supplier2" class="supplier_info"
                                            href="{{ route('assign-officer') }}">Assign Approval Officer</a></li>
                                    <li><a id="supplier3" class="supplier_info"
                                            href="{{ route('upload-supplier-details') }}">Import Suppliers Records</a>
                                    </li>
                                    <li><a id="supplier3" class="supplier_info" href="{{ route('add-document') }}">Add
                                            Supplier document</a></li>
                                    <li><a id="supplier4" class="supplier_info"
                                            href="{{ route('view-supplier-documents') }}">View Supplier documents</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


                <div id="procurement_menu">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="#collapseThree" data-parent="#side_accordion" data-toggle="collapse"
                                class="accordion-toggle">
                                <i class="glyphicon glyphicon-book"></i> Procurement Plan
                            </a>
                        </div>
                        <div class="accordion-body collapse" id="collapseThree">
                            <div class="panel-body">
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a class="procurement_plan" id="procurement_upload"
                                            href=" {{ route('procurement') }}">Upload Procurement Plan</a></li>
                                    <li><a class="procurement_plan" id="assign_approvale_officer"
                                            href="{{ route('procurement-assign-view') }}">Assign
                                            Approval Officer</a> </li>
                                    <li><a class="procurement_plan" id="procurement_approval_innner"
                                            href="{{ route('approve-procurement') }}">Procurement Approval</a> </li>
                                    <li><a class="procurement_plan" href="{{ route('procurement-records') }} ">View
                                            Procurement Records</a></li>
                                    <li><a class="procurement_plan" id="timelines" href=" {{ route('timelines') }}">Timelines</a></li>
                                    <li><a class="procurement_plan" id="view_timelines" href="{{ route('display-timelines') }}">View
                                            Timelines</a></li>

                                    <li><a class="procurement_plan" id="disable_procurement_plan"
                                            href=" {{ route('disable-procurement') }}">Disable procurement Plan </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


                <div id="requsition_menu">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="#requistioning" data-parent="#side_accordion" data-toggle="collapse"
                                class="accordion-toggle">
                                <i class="glyphicon glyphicon-print"></i> Requistioning
                            </a>
                        </div>
                        <div class="accordion-body collapse" id="requistioning">
                            <div class="panel-body">
                                {{-- <li><a href=" {{ route('purchase-requistion') }}">Make Requistion</a></li> --}}
                                <li id="start_requistioning"><a href=" {{ route('start-requistion') }}">Start Requistion</a></li>
                                <li id="spv"><a href="{{ route('SPV') }} ">SPV</a></li>
                                <li id="assign_requistion_role"><a href="{{ route('Assign-requistion-role') }} ">Assign requistion Unit </a></li>
                                <li id="assign_head_unit"><a href="{{ route('Assign-head-unit') }} ">Assign Head of Unit </a></li>
                                <li id="review_requistion_planned"><a href="{{ url('review-requistion/'. $LoggedUserAdmin['id']) }} ">Review Planned Requistions </a></li>
                                <li id="review_requistion_not_planned"><a href="{{ url('review-requistion-planned/'. $LoggedUserAdmin['id']) }} ">Not Planned Requistions </a></li>
                                <li id="review_requistion_FA"><a href="{{ url('review-requistion-FA/'. $LoggedUserAdmin['id']) }} ">Review requistion FA </a></li>
                                <li id="Assign_procurement_officer"><a href="{{ route('Assign-procurement-officer') }} ">Assign Procurement Officer </a></li>
                                <li id="Assigned_requistions"><a href="{{ route('Procurement-officer-assigned-requsitions') }} ">Assigned requistions </a></li>
                                <li id="recommended_requistions"><a href="{{ route('recommended-requistions') }} ">Recommended requistions </a></li>
                                <li id="review_requistion_director_hr"><a href="{{ route('review-requistion-planned-director-hr') }} ">Review Requistion Director HR </a></li>
                                <li id="asg_finance"><a href="{{ route('review-requistion-planned-asg-finance') }} ">Requistion ASG Finance</a></li>
                                <li id="requistion_asg"><a href="{{ route('review-requistion-planned-sg') }} ">Requistion SG</a></li>
                            </div>
                        </div>
                    </div>
                </div>



                <div id="master_data_menu">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="#collapseLong" data-parent="#side_accordion" data-toggle="collapse"
                                class="accordion-toggle">
                                <i class="glyphicon glyphicon-leaf"></i> Master Data
                            </a>
                        </div>
                        <div class="accordion-body collapse" id="collapseLong">
                            <div class="panel-body">
                                <li id="view_master_data"><a href=" {{ route('master-table') }}">View master Data</a></li>
                                <li id="view_master_code"><a href=" {{ route('master-code') }}">View master Code</a></li>
                            </div>
                        </div>
                    </div>
                </div>


                <div id="user_data_menu">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="#collapseuser" data-parent="#side_accordion" data-toggle="collapse"
                                class="accordion-toggle">
                                <i class="glyphicon glyphicon-plus"></i> User Data
                            </a>
                        </div>
                        <div class="accordion-body collapse" id="collapseuser">
                            <div class="panel-body">
                                <li id="admin_register"><a href="{{ route('admin-register') }}">Create new User</a></li>
                                <li id="add_user_role"><a href=" {{ route('add-user') }}">Add User Role</a></li>
                                <li id="view_user"><a href=" {{ route('view-user') }}">View User Role</a></li>
                            </div>
                        </div>
                    </div>
                </div>


                <div id="user_previledges_menu">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="#collapseuser_rights" data-parent="#side_accordion" data-toggle="collapse"
                                class="accordion-toggle">
                                <i class="splashy-view_table"></i> User Rights and Priveledges
                            </a>
                        </div>

                        <div class="accordion-body collapse" id="collapseuser_rights">
                            <div class="panel-body">
                                <li id="user_rights_previledges"><a href=" {{ route('user-rights-priveledges') }}">View User Rights</a></li>
                                <li id="assign_user_previledges"><a href=" {{ route('add-user-previledges') }}">Assign User previledges</a></li>
                                <li id="add_new_user_rights"><a href=" {{ route('add-user-right') }}">Add new User Rights</a></li>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
