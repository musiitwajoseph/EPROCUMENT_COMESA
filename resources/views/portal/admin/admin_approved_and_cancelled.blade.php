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

			<meta name="csrf-token" content="{{ csrf_token() }}" />

        <!-- favicon -->
            <link rel="shortcut icon" href="/assets/favicon.ico" />



<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

   </head>
    <body class="full_width">
        <div class="style_switcher">
			<div class="sepH_c">
				<p>Colors:</p>
				<div class="clearfix">
					<a href="/assets/javascript:void(0)" class="style_item jQclr blue_theme style_active" title="blue">blue</a>
					<a href="/assets/javascript:void(0)" class="style_item jQclr dark_theme" title="dark">dark</a>
					<a href="/assets/javascript:void(0)" class="style_item jQclr green_theme" title="green">green</a>
					<a href="/assets/javascript:void(0)" class="style_item jQclr brown_theme" title="brown">brown</a>
					<a href="/assets/javascript:void(0)" class="style_item jQclr eastern_blue_theme" title="eastern_blue">eastern blue</a>
					<a href="/assets/javascript:void(0)" class="style_item jQclr tamarillo_theme" title="tamarillo">tamarillo</a>
				</div>
			</div>
			<div class="sepH_c">
				<p>Backgrounds:</p>
				<div class="clearfix">
					<span class="style_item jQptrn style_active ptrn_def" title=""></span>
					<span class="ssw_ptrn_a style_item jQptrn" title="ptrn_a"></span>
					<span class="ssw_ptrn_b style_item jQptrn" title="ptrn_b"></span>
					<span class="ssw_ptrn_c style_item jQptrn" title="ptrn_c"></span>
					<span class="ssw_ptrn_d style_item jQptrn" title="ptrn_d"></span>
					<span class="ssw_ptrn_e style_item jQptrn" title="ptrn_e"></span>
				</div>
			</div>
			<div class="sepH_c">
				<p>Layout:</p>
				<div class="clearfix">
					<label class="radio-inline"><input name="ssw_layout" id="ssw_layout_fluid" value="" checked="" type="radio"> Fluid</label>
					<label class="radio-inline"><input name="ssw_layout" id="ssw_layout_fixed" value="gebo-fixed" type="radio"> Fixed</label>
				</div>
			</div>
			<div class="sepH_c">
				<p>Sidebar position:</p>
				<div class="clearfix">
					<label class="radio-inline"><input name="ssw_sidebar" id="ssw_sidebar_left" value="" checked="" type="radio"> Left</label>
					<label class="radio-inline"><input name="ssw_sidebar" id="ssw_sidebar_right" value="sidebar_right" type="radio"> Right</label>
				</div>
			</div>
			<div class="sepH_c">
				<p>Show top menu on:</p>
				<div class="clearfix">
					<label class="radio-inline"><input name="ssw_menu" id="ssw_menu_click" value="" checked="" type="radio"> Click</label>
					<label class="radio-inline"><input name="ssw_menu" id="ssw_menu_hover" value="menu_hover" type="radio"> Hover</label>
				</div>
			</div>

			<div class="gh_button-group">
				<a href="/assets/#" id="showCss" class="btn btn-primary btn-sm">Show CSS</a>
				<a href="/assets/#" id="resetDefault" class="btn btn-default btn-sm">Reset</a>
			</div>
			<div class="hide">
				<ul id="ssw_styles">
					<li class="small ssw_mbColor sepH_a" style="display:none">body {<span class="ssw_mColor sepH_a" style="display:none"> color: #<span></span>;</span> <span class="ssw_bColor" style="display:none">background-color: #<span></span> </span>}</li>
					<li class="small ssw_lColor sepH_a" style="display:none">a { color: #<span></span> }</li>
				</ul>
			</div>
		</div>		<div id="maincontainer" class="clearfix">

            <header>

				<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
					<div class="navbar-inner">
						<div class="container-fluid">
							<a class="brand pull-left" href="{{ route('admin-dashboard')}}">COMESA :: EPROCUREMENT</a>
						   
							<ul class="nav navbar-nav user_menu pull-right">
								
								
								<li class="divider-vertical hidden-sm hidden-xs"></li>                                                              
                                                                                                                                                                                                            
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="/assets/img/user_avatar.png" alt="" class="user_avatar">{{$LoggedUserAdmin['username']}}<b class="caret"></b></a>
									<ul class="dropdown-menu dropdown-menu-right">
										<li><a href="javascript:void(0);">My Profile</a></li>
										<li class="divider"></li>
										<li><a href="{{route('admin-logout')}}">Log Out</a></li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</nav>




				<div class="modal fade" id="myMail">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h3 class="modal-title">New Messages</h3>
							</div>
							<div class="modal-body">
								<table class="table table-condensed table-striped" data-provides="rowlink">
									<thead>
										<tr>
											<th>Sender</th>
											<th>Subject</th>
											<th>Date</th>
											<th>Size</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Declan Pamphlett</td>
											<td><a href="/assets/javascript:void(0)">Lorem ipsum dolor sit amet</a></td>
											<td>23/05/2015</td>
											<td>25KB</td>
										</tr>
										<tr>
											<td>Erin Church</td>
											<td><a href="/assets/javascript:void(0)">Lorem ipsum dolor sit amet</a></td>
											<td>24/05/2015</td>
											<td>15KB</td>
										</tr>
										<tr>
											<td>Koby Auld</td>
											<td><a href="/assets/javascript:void(0)">Lorem ipsum dolor sit amet</a></td>
											<td>25/05/2015</td>
											<td>28KB</td>
										</tr>
										<tr>
											<td>Anthony Pound</td>
											<td><a href="/assets/javascript:void(0)">Lorem ipsum dolor sit amet</a></td>
											<td>25/05/2015</td>
											<td>33KB</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default">Go to mailbox</button>
							</div>
						</div>
					</div>
				</div>

				<div class="modal fade" id="myTasks">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h3 class="modal-title">New Tasks</h3>
							</div>
							<div class="modal-body">
								<table class="table table-condensed table-striped" data-provides="rowlink">
									<thead>
										<tr>
											<th>id</th>
											<th>Summary</th>
											<th>Updated</th>
											<th>Priority</th>
											<th>Status</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>P-23</td>
											<td><a href="/assets/javascript:void(0)">Admin should not break if URL…</a></td>
											<td>23/05/2015</td>
											<td><span class="label label-danger">High</span></td>
											<td>Open</td>
										</tr>
										<tr>
											<td>P-18</td>
											<td><a href="/assets/javascript:void(0)">Displaying submenus in custom…</a></td>
											<td>22/05/2015</td>
											<td><span class="label label-warning">Medium</span></td>
											<td>Reopen</td>
										</tr>
										<tr>
											<td>P-25</td>
											<td><a href="/assets/javascript:void(0)">Featured image on post types…</a></td>
											<td>22/05/2015</td>
											<td><span class="label label-success">Low</span></td>
											<td>Updated</td>
										</tr>
										<tr>
											<td>P-10</td>
											<td><a href="/assets/javascript:void(0)">Multiple feed fixes and…</a></td>
											<td>17/05/2015</td>
											<td><span class="label label-warning">Medium</span></td>
											<td>Open</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default">Go to task manager</button>
							</div>
						</div>
					</div>
				</div>

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

        <style>
            th{
                text-align: center;
                color: rgb(23, 137, 23);
                text-transform: uppercase;
            }
        </style>
					@include('includes.user_info')
	<div class="row" id="dashboard_menu"> 
		<div class="col-sm-12 tac">
			
            <h1 style="text-align: center;color:#FFF;margin:3rem;background-color:blue;">Recommended to be Apprroved</h1>
            <table class="table table-bordered table-striped" id="smpl_tbl">

				<input type="hidden" name="id_hidden" id="id_hidden" value={{$id}}>

				@csrf

                <tr>
                    <td colspan="4"><h3>1.Business Details</h3></td>
                </tr>

            <tr>
            <th>Country</th>
            <th>Category</th>
            <th>Sub-category</th>
            <th>BusinessName</th>
            </tr>  

            <tr>
                <td>{{$country_name}}</td>
                <td>{{$category}}</td>
                <td>{{$subcategory}}</td>
                <td>{{$info->BusinessName}}</td>
            </tr>  

                <tr>
                <th>Type of Business</th>
                <th>Nature of Business</th>
                <th>Certificate of Registration Incorporation number</th>
                <th>Revenue Authority Taxpayer’s Identification Number</th>
                </tr>  

                <tr>
                    <td>{{$Types_of_business}}</td>
                    <td>{{$info->Nature_of_Business}}</td>
                    <td>{{$info->Certificate_of_Registration}}</td>
                    <td>{{$info->Revenue_Authority_Taxpayers_Identification_Number}}</td>
                </tr> 

                    <tr>
                    <th>Tax compliance certificate expiration date</th>
                    <th>Physical address</th>
                    <th>Company Email</th>
                    <th>National Pension Authority (NPSA) Registration No</th>
                    </tr>    

                    <tr>
                        <td>{{$info->Tax_compliance_certificate_expiration}}</td>
                        <td>{{$info->physical_address}}</td>
                        <td>{{$info->company_email}}</td>
                        <td>{{$info->National_Pension_Authority}}</td>
                    </tr> 

                        <tr>
                        <th>Personal contact :</th>
                        <th>Company Telephone number</th>
                        <th>Contact Telephone number</th>
                        <th></th>
                        </tr>  

                        <tr>
                            <td>{{$info->contact_person}}</td>
                            <td>{{$info->company_telephone}}</td>
                            <td>{{$info->contact_person_telephone}}</td>
                        </tr> 

                        <tr>
                            <td colspan="4"><h3>2.Financial Information</h3></td>
                        </tr>

                            <tr>
                            <th>Account name </th>
                            <th>Bank Account number</th>
                            <th>Bank name </th>
                            <th>Bank Branch </th>
                            </tr>  

                            <tr>
                                <td>{{$info->Account_Name}}</td>
                                <td>{{$info->Bank_Account}}</td>
                                <td>{{$info->Bank_name}}</td>
                                <td>{{$info->Bank_Branch}}</td>
                            </tr> 

                                <tr>
                                <th>Branch code  </th>
                                <th>Account currency </th>
                                <th>Company financial contact person</th>
                                <th>Contact person email</th>
                                </tr>  

                                <tr>
                                    <td>{{$info->Branch_code}}</td>
                                    <td>{{$info->Account_currency}}</td>
                                    <td>{{$info->company_financial_contact}}</td>
                                    <td>{{$info->contact_person_email}}</td>
                                </tr> 

                                    <tr>
                                    <th>Contact person phone number</th>
                                    </tr>

                                    <tr>
                                        <td>{{$info->contact_person_phone_number}}</td>
                                   </tr>

                                   <tr>
                                    <td colspan="4"><h3>3.Capacity Levels</h3></td>
                                   </tr>

                                    <tr>
                                    <th>Annual turnover excluding this contract </th>
                                    <th>Current assets </th>
                                    <th>Current liabilities </th>
                                    <th>Current ratio (current assets/current liabilities) </th>
                                    </tr>  

                                    <tr>
                                        <td>{{$info->Annual_turnover}}</td>
                                        <td>{{$info->Current_assets}}</td>
                                        <td>{{$info->Current_liabilities}}</td>
                                        <td>{{$info->Current_ratio}}</td>
                                    </tr>

                                        <tr>
                                        <th>No of years in business :</th>
                                        <th>Number of employees</th>
                                        <th>Other employees </th>
                                        <th>Relevant specialisation</th>
                                        </tr>

                                        <tr>
                                            <td>{{$info->No_of_years_in_business}}</td>
                                            <td>{{$info->Number_of_employees}}</td>
                                            <td>{{$info->Other_employees}}</td>
                                            <td>{{$info->Relevant_specialisation}}</td>
                                        </tr>


                                        <tr>
                                            <th>A maximum of 10 Projects|contracts  :</th>
                                        </tr>

                                            <tr>  
                                            <td>{{$info->maximum_of_10_Projects_contracts}}</td>
                                            </tr>


                                            <tr>
                                                <td colspan="4"><h3>4.Required Documents</h3></td>
                                            </tr>

                                            <tr>
                                              
                                                <td colspan="3" style="text-align: left">
                                                    @foreach ($saved_documents as $doc)
                                                    <span>Attachment:</span>
                                                    <a href="{{ url('download/'.$doc->Attachments) }}">{{$doc->Attachments}}</a><br/>
                                                    @endforeach
                                                </td>
                                           
                                            </tr>

											<tr>
                                                <td colspan="4"><h3>5.Reason for Accepting Application</h3></td>
                                            </tr>

											<tr>
                                                <td colspan="4" style="text-align: left;margin-top:2rem;">{{$info->reason_for_rejection}}</td>
                                            </tr>

            </table>

			<button class="btn btn-success pull-left"  id="approving_btn">Approve Supplier</button>

			<button class="btn btn-danger pull-right" id="disapproving_btn">Cancel Supplier</button>

		</div>
		</div>
	</div>

		<div style="padding-top: 1rem">
			<p style="text-align: left;font-weight:bold;">Reviewed by : {{$info->approved_by}}</p>
			<p style="text-align: left;font-weight:bold;">Procurement Officer Email : {{$info->approved_email}}</p>
			<p style="text-align: left;font-weight:bold;">Reviewed date : {{$info->updated_at}}</p>
		</div>
			
          
		
                 
    </div>
          
</div>

</div>

    <a href="/assets/javascript:void(0)" class="sidebar_switch on_switch bs_ttip" data-placement="auto right" data-viewport="body" title="Hide Sidebar">Sidebar switch</a>
   
    @include('includes.side-bar')

	<script src="/assets/js/jquery.min.js"></script>
	<script src="/assets/js/cust.js"></script>
    <script type="text/javascript">
	
	$(document).ready(function(){
		app_approvals();
	});


            $(document).ready(function(){
                $('#approving_btn').click(function(){
					$('#approving_btn').html('Approving...');
							$('#approving_btn').attr('disabled', true);

                    if (confirm('Are you sure you want to Approve this Supplier ?')) {
                        
						var id_hidden  = $('#id_hidden').val();

						var form_data = new FormData();

						form_data.append('id_hidden', id_hidden);


                            $.ajax({
								type: "POST",
								processData: false,
								contentType: false,
								cache: false,
								data		: form_data,								
								headers		:{	'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
								url			:'/fully-approve',
								success		:function(data){
									if(data.status){		
                                        Swal.fire({
                                        icon: 'success',
                                        title: 'Success!',
                                        text: data.message,
                                    });	
										location.replace('/approve-dashboard');						
									}								
								},
								error: function(data)
								{
									$('body').html(data.responseText);
								}
							});
                    }
                else{
                   
                    return false;
                }
                 
                });
            });

    </script>

    <script src="/assets/js/jquery.min.js"></script>
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
