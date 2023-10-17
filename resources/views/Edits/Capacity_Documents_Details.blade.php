<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Gebo Admin v3.1</title>

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

        <!-- wizard -->
            <link rel="stylesheet" href="/assets/lib/stepy/css/jquery.stepy.css" />

        <!-- main styles -->
            <link rel="stylesheet" href="/assets/css/style.css" />
		<!-- theme color-->
            <link rel="stylesheet" href="/assets/css/blue.css" id="link_theme" />

            <link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>

        <!-- favicon -->
            <link rel="shortcut icon" href="/assets/favicon.ico" />


			<meta name="csrf-token" content="{{ csrf_token() }}"/>

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

				@include('includes.main-menu')

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
            <a href="/assets/#"><i class="glyphicon glyphicon-home"></i></a>
        </li>
        <li>
            Supplier Registration Form 
        </li>
    </ul>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12">
		{{-- <h3 class="heading">Wizard with validation</h3> --}}
		<div class="row">
			<div class="col-sm-12 col-md-12">
                <form id="validate_wizard" class="stepy-wizzard form-horizontal">

					@csrf
                    <fieldset title="Contract info">
					
						

					<fieldset title="Supplier Details">
						<div class="tabbable tabs-left">
							
								
								<div class="tab-pane" id="tab2">
									
								<div class="tab-pane" id="tab3">
									
									<h2 class="heading padMarg" style="font-weight: bold">1.Economic & financial capacity</h2>

											<div class="formSep form-group">

													@foreach ($Accessed_user as $item)												
													<div class="col-md-4">
														<label for="" class="boldTitle padMarg">Annual turnover excluding this contract :</label>
														<input type="number" value={{$item->Annual_turnover}} name="Annual_turnover" id="Annual_turnover" class="input-sm form-control" required>
													</div>
													@endforeach

													@foreach ($Accessed_user as $item)
													<div class="col-md-4">
														<label for="" class="boldTitle padMarg">Current assets :</label>
														<input type="number" value={{$item->Current_assets}} name="Current_assets" id="Current_assets" class="input-sm form-control" required>
													</div>
													@endforeach

													@foreach ($Accessed_user as $item)
													<div class="col-md-4">
														<label for="" class="boldTitle padMarg">Current liabilities :</label>
														<input type="number" value={{$item->Current_liabilities}} name="Current_liabilities" id="Current_liabilities" class="input-sm form-control" required>
													</div>
													@endforeach

													@foreach ($Accessed_user as $item)
													<div class="col-md-4">
														<label for="" class="boldTitle padMarg">Current ratio (current assets/current liabilities) :</label>
														<input type="number" value={{$item->Current_ratio}} name="Current_ratio" id="Current_ratio" class="input-sm form-control" required>
													</div>
													@endforeach
											  </div>


											  <h2 class="heading padMarg" style="font-weight: bold">2.Professional capacity</h2>

											  @foreach ($Accessed_user as $item)
											<div class="formSep form-group">
													<div class="col-md-4">
											<label for="" class="boldTitle padMarg">No of years in business :</label>
											<input type="number" value={{$item->No_of_years_in_business}} name="No_of_years_in_business" id="No_of_years_in_business" class="input-sm form-control" required>
											</div>
											@endforeach

											@foreach ($Accessed_user as $item)
										<div class="col-md-4">
											<label for="" class="boldTitle padMarg">Number of employees</label>
											<input type="number" value={{$item->Number_of_employees}} name="Number_of_employees" id="Number_of_employees" class="input-sm form-control" required>
										</div>
										@endforeach

		
										@foreach ($Accessed_user as $item)
											<div class="col-md-4">
												<label for="" class="boldTitle padMarg">Other employees</label>
												<input type="number" value={{$item->Other_employees}} name="Other_employees" id="Other_employees" class="input-sm form-control" required>
											</div>
											  </div>
											@endforeach

											@foreach ($Accessed_user as $item)
											<input type="hidden" name="user_id" id="user_id" value={{$item->id}}>
											<div class="tab-pane" id="tab2">
											@endforeach	

									<h2 class="heading padMarg" style="font-weight: bold">3.Technical capacity</h2>

									<div class="formSep form-group">
										@foreach ($Accessed_user as $item)
										<div class="mt-4 pt-4 padMarg">
										<div class="col-md-6">
											<label for="" class="boldTitle padMarg" style="margin-top: 7rem !important">a)	Relevant specialisation (state a maximum of 3)  :</label>
											<textarea name="Relevant_specialisation" value={{$item->Relevant_specialisation}} id="Relevant_specialisation " class="input-sm form-control" cols="30" rows="10" required></textarea>
										</div>
										@endforeach

										<div class="col-md-6">
											<label for="" class="boldTitle padMarg">b)	A maximum of 10 Projects/contracts (For each, state: Country projects executed, Overall contract value (US$); Proportion carried out by legal entity; Number of personnel provided; Name of client; and Origin of funding)</label>
						
											<textarea name="maximum_of_10_Projects_contracts" value={{$item->maximum_of_10_Projects_contracts}} id="maximum_of_10_Projects_contracts" class="input-sm form-control" cols="30" rows="10" required></textarea>
										</div>
									</div>
								<div class="formSep form-group">	
							</div>
						</div>					
						</div>

		
						<button type="button" id="update_capacity_information" class="btn btn-primary">
							Update Capacity Details <i class="glyphicon glyphicon-chevron-right"></i>
						</button>

                    </fieldset>

                </form>
				
				<script src="/assets/js/jquery.min.js"></script>

<script type="text/javascript">


			$(document).ready(function(){
					$('#update_capacity_information').click(function(){

						$('#update_capacity_information').attr('disabled','false');
						$('#update_capacity_information').html('Updating...');

							var user_id = $('#user_id').val();
							
							var Annual_turnover = $('#Annual_turnover').val();
							var Current_assets = $('#Current_assets').val();
							var Current_liabilities = $('#Current_liabilities').val();
							var Current_ratio = $('#Current_ratio').val();
							var Relevant_specialisation  = $('#Relevant_specialisation ').val();
							var maximum_of_10_Projects_contracts  = $('#maximum_of_10_Projects_contracts').val();
							var No_of_years_in_business  = $('#No_of_years_in_business').val();
							var Number_of_employees  = $('#Number_of_employees ').val();
							var Other_employees  = $('#Other_employees').val();
				
							   if(Annual_turnover == ""){
									alert("Account Name Field is required");
								window.location.href = "/Annual Turn Over/"+user_id;
								}

								else if(Current_assets == ""){
									alert("Current assets Field is required");
								window.location.href = "/edit-capacity-documents/"+user_id;
								}

								else if(Current_liabilities == ""){
									alert("Current Liabilities is required");
								window.location.href = "/edit-capacity-documents/"+user_id;
								}

								else if(Current_ratio == ""){
									alert("Current Ratio Field is required");
								window.location.href = "/edit-capacity-documents/"+user_id;
								}
								else if(Relevant_specialisation == ""){
									alert("Relevant Specialisation Field is required");
								window.location.href = "/edit-capacity-documents/"+user_id;
								}
								else if(maximum_of_10_Projects_contracts == ""){
									alert("Maximu of 10 proejcts Field is required");
								window.location.href = "/edit-capacity-documents/"+user_id;
								}
								else if(No_of_years_in_business == ""){
									alert("Number of years in Business Field is required");
								window.location.href = "/edit-capacity-documents/"+user_id;
								}
								else if(Number_of_employees == ""){
									alert("Number of employees Field is required");
								window.location.href = "/edit-capacity-documents/"+user_id;
								}
								else if(Other_employees == ""){
									alert("Other Field is required");
								window.location.href = "/edit-capacity-documents/"+user_id;
								}

							var form_data = new FormData();

							form_data.append('user_id', user_id);
							form_data.append('Annual_turnover', Annual_turnover);
							form_data.append('Current_assets', Current_assets);
							form_data.append('Current_liabilities', Current_liabilities);
							form_data.append('Current_ratio', Current_ratio);
							form_data.append('Relevant_specialisation', Relevant_specialisation);
							form_data.append('Number_of_employees', Number_of_employees);
							form_data.append('maximum_of_10_Projects_contracts', maximum_of_10_Projects_contracts);
							form_data.append('No_of_years_in_business', No_of_years_in_business);
							form_data.append('Other_employees', Other_employees);	
						

						$.ajax({
							type: "post",
							processData: false,
							contentType: false,
							cache: false,
							data		: form_data,								
							headers		:{	'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},

							url			:'/update-capacity-supplier-data',
							success		:function(data){

								if(data.status){	
									alert(data.message);
									location.replace('/UpdatedFinancialBusiness')
								}else{										
									$('#firstForm').show();
									$('#otpForm').hide();
								}
								
							},
							error: function(data)
							{
								$('body').html(data.responseText);
							}
						});
					});
				});
		
</script>
           

				
								</div>
							</div>
						</div>
					</div>  
              </div>
            </div>
        </div>

    <a href="/assets/javascript:void(0)" class="sidebar_switch on_switch bs_ttip" data-placement="auto right" data-viewport="body" title="Hide Sidebar">Sidebar switch</a>

    @include('includes.side-bar')

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

	<!-- validation -->
    <script src="/assets/lib/validation/jquery.validate.min.js"></script>
    <!-- wizard -->
    <script src="/assets/lib/stepy/js/jquery.stepy.min.js"></script>
    <!-- wizard functions -->
    <script src="/assets/js/pages/gebo_wizard.js"></script>

    </body>
</html>
