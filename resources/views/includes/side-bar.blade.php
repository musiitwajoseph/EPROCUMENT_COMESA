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
                            <i class="glyphicon glyphicon-th"></i> Approvals
                        </a>
                    </div>

                    <div class="accordion-body collapse" id="collapseTwo">
                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked">
                                <li><a id="approved_btn_supppliers" href="javascript:void(0);">Approved Suppliers</a></li>
                                <li><a id="pending_btn_supppliers" href="javascript:void(0);">Pending Supplier</a></li>
                                <li><a id="rejected_btn_supppliers" href="javascript:void(0);">Rejected Suppliers</a></li>
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
                
                
                
                

            </div>
        </div> 
    </div>
</div>