<div class="sidebar">
    <div class="sidebar_inner_scroll">
        <div class="sidebar_inner">
            <div id="side_accordion" class="panel-group">


                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="#collapseOne" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                            <i class="glyphicon glyphicon-folder-close"></i> Dashboard
                        </a>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="#collapseTwo" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                            <i class="glyphicon glyphicon-th"></i> Supplier
                        </a>
                    </div>

                    <div class="accordion-body collapse" id="collapseTwo">
                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked">
                                <li><a id="approved_btn_supppliers" href="{{ route('approve-dashboard')}}">Approved Suppliers</a></li>
                                <li><a id="pending_btn_supppliers" href="j{{ route('approve-dashboard')}}">Pending Supplier</a></li>
                                <li><a id="rejected_btn_supppliers" href="{{ route('approve-dashboard')}}">Rejected Suppliers</a></li>
                                <li><a id="rejected_btn_supppliers" href="{{ route('upload-supplier-details')}}">Import Suppliers Records</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="#collapseThree" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                            <i class="glyphicon glyphicon-book"></i> Procurement Plan
                        </a>
                    </div>
                    <div class="accordion-body collapse" id="collapseThree">
                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href=" {{route('procurement')}}">Upload Procurement Plan</a></li>
                                <li><a href="{{ route('procurement-records')}} ">View Procurement Records</a></li>
                            </ul>   
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="#collapseLong" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                            <i class="glyphicon glyphicon-leaf"></i> Master Data
                        </a>
                    </div>
                    <div class="accordion-body collapse" id="collapseLong">
                        <div class="panel-body">
                                <li><a href=" {{route('master-table')}}">View master Data</a></li>
                                <li><a href=" {{route('master-code')}}">View master Code</a></li>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="#collapseuser" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                            <i class="glyphicon glyphicon-plus"></i> User Data
                        </a>
                    </div>
                    <div class="accordion-body collapse" id="collapseuser">
                        <div class="panel-body">
                            <li><a href=" {{route('add-user')}}">Add User Role</a></li>
                            <li><a href=" {{route('view-user')}}">View User Role</a></li>
                            <li><a href=" {{route('import-user')}}">Import user Role</a></li>
                        </div>
                    </div>
                </div>


                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="#collapseuser_rights" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                            <i class="splashy-view_table"></i> User Rights and Priveledges
                        </a>
                    </div>

                    <div class="accordion-body collapse" id="collapseuser_rights">
                        <div class="panel-body">
                            <li><a href=" {{route('user-rights-priveledges')}}">View User Rights</a></li>
                            <li><a href=" {{route('add-user-previledges')}}">Assign User previledges</a></li>
                            <li><a href=" {{route('add-user-right')}}">Add new User Rights</a></li>
                        </div>
                    </div>
                </div>

            </div>
        </div> 
    </div>
</div>