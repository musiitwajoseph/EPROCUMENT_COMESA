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



        <!--[if lte IE 8]>
            <link rel="stylesheet" href="/assets/css/ie.css" />
        <![endif]-->

        <!--[if lt IE 9]>
			<script src="/assets/js/ie/html5.js"></script>
			<script src="/assets/js/ie/respond.min.js"></script>
			<script src="/assets/lib/flot/excanvas.min.js"></script>
        <![endif]-->    </head>
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
                    

					<fieldset title="Supplier Details">
						<div class="tabbable tabs-left">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#tab1" data-toggle="tab">1.Business Details</a></li>
								<li><a href="#tab2" data-toggle="tab"></a></li>
								<li><a href="#tab3" data-toggle="tab"></a></li>
								<li><a href="#tab6" data-toggle="tab"></a></li>
							</ul>
							<div class="tab-content">

						</div>					
						</div>

							<div class="tab-pane" id="tab6">
							<h2 class="heading padMarg" style="font-weight: bold">1.Required Documents </h2>

						<div class="formSep form-group">
							<?php $counter = 1; ?>
							@foreach ($Documents as $document)
								<div class="col-md-6">
									<label for="" class="boldTitle padMarg" class="padMarg">Colgate :</label>
									<input  type="file"  name="attachment<?php echo $counter; ?>" id="attachment<?php echo $counter; ?>" class="input-sm form-control " required>
								</div>
								<?php $counter++; ?>
							@endforeach

							<input type="hidden" value="<?php echo $counter-1; ?>" id="Total_Documents"/>

                    </fieldset>
				
					


					<fieldset title="Confirm Details">
                        <legend class="hide">Confirm provided Supplier Details</legend>

						<div class="supplier-submitted-details">

						</div>

						
						<div class="col-md-6 mt-3 pt-4 padMarg">
							<button type="button" id="update_business_information" class="btn btn-primary">
							 Update Required Documents <i class="glyphicon glyphicon-chevron-right"></i>
						 </button>

					</fieldset>

					
                 
                </form>
				
				<script src="/assets/js/jquery.min.js"></script>

				
				<script type="text/javascript">

					$(document).ready(function(){
						$('#validateEmail').click(function(){

							$('#validateEmail').attr('disabled','false');
							$('#validateEmail').html('Loading...');

							var username = $('#v_username').val();
							var telephone = $('#v_telephone').val();
							var email = $('#v_email').val();
							
							var form_data = new FormData();
							form_data.append('username', username);
							form_data.append('telephone', telephone);
							form_data.append('email', email);
							form_data.append('otp_token', "4523");
											
							
							$.ajax({
								type: "post",
								processData: false,
								contentType: false,
								cache: false,
								data		: form_data,								
								headers		:{	'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},

								url			:'generate-otp',
								success		:function(data){

									if(data.status){
										$('#firstForm').hide();
										$('#otpForm').show();
										$('#otpMessage').html(data.message);
										// redirectBack();
									}else{										
										$('#firstForm').show();
										$('#otpForm').hide();
									}
									
								},
								error: function($data)
								{
									alert(data);
	
								}
							});
						});
					});

					//Regenerate OTP token

					$(document).ready(function(){
						$('#regenerate_otp').click(function(){

							$('#regenerate_otp').html('Regenerating...');
							$('#regenerate_otp').attr('disabled', true);

							var email = $('#v_email').val();
							
							var form_data = new FormData();
							form_data.append('email', email);

							$.ajax({
								type: "post",
								processData: false,
								contentType: false,
								cache: false,
								data		: form_data,								
								headers		:{	'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},

								url			:'regenerate-otp',
								success		:function(data){
									if(data.status){
										$('#regenerate_otp').hide();
										$('#OTP_sent').show();
										alert(data['message']);
									}else{										
										$('#regenerate_otp').show();
									}
									
								},
								error: function(data)
								{
									alert(data);
									//window.location.href = "supplier-registration";
								}
							});
						});
					});

					//Verify OTP Token

					function verifyOTPZ()
					{
						var email = $('#v_email').val();
						var otp_token = $('#otp_token').val();

							$('#checkOTP').attr('disabled','false');
							$('#checkOTP').html('Loading...');
							
							var form_data = new FormData();
							form_data.append('email', email);
							form_data.append('otp_token', otp_token);
							
							$.ajax({
								type: "post",
								processData: false,
								contentType: false,
								cache: false,
								data		: form_data,								
								headers		:{	'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},

								url			:'fetch-email',
								success		:function(data){
									
									var values = data;//JSON.parse(data);
									if(values.status){
										alert(values.message);
										$('form').stepy('step',2);
									}else{
										alert(values.message);
									}
								},
							});
						}

							$(document).ready(function(){
						$('#redirectBack').click(function(){
							location.href = "{{url('supplier-registration')}}";
						});
					});


					// Collect Supplier Details:

					$(document).ready(function(){
						$('#Supplier_Registration_Details').click(function(){

							//$('#Supplier_Registration_Details').prop('disabled','true');
							$('#Supplier_Registration_Details').html('Loading...');

							var country = $('#country').val();
							var Category = $('#Category').val();
							var SubCategory = $('#SubCategory').val();
							var Type_of_Business = $('#Type_of_Business').val();
							var Nature_of_Business = $('#Nature_of_Business').val();
							var BusinessName = $('#BusinessName').val();
							var Certificate_of_Registration = $('#Certificate_of_Registration').val();
							var Tax_compliance_certificate_expiration = $('#Tax_compliance_certificate_expiration').val();
							var Revenue_Authority_Taxpayers_Identification_Number = $('#Revenue_Authority_Taxpayers_Identification_Number').val();
							var company_email = $('#company_email').val();
							var physical_address = $('#physical_address').val();
							var National_Pension_Authority = $('#National_Pension_Authority').val();
							var NAPSA_Compliance_Status_certificate = $('#NAPSA_Compliance_Status_certificate').val();
							var contact_person = $('#contact_person').val();
							var company_telephone = $('#company_telephone').val();
							var contact_person_telephone = $('#contact_person_telephone').val();
							var Account_name = $('#Account_name').val();
							var Bank_name = $('#Bank_name').val();
							var Bank_Account = $('#Bank_Account').val();
							var Bank_Branch = $('#Bank_Branch').val();
							var Branch_code = $('#Branch_code').val();
							var Account_currency = $('#Account_currency').val();
							var company_financial_contact = $('#company_financial_contact').val();
							var contact_person_email = $('#contact_person_email').val();
							var contact_person_phone_number = $('#contact_person_phone_number').val();
							var Annual_turnover = $('#Annual_turnover').val();
							var Current_assets = $('#Current_assets').val();
							var Current_liabilities = $('#Current_liabilities').val();
							var Current_ratio = $('#Current_ratio').val();
							var Relevant_specialisation  = $('#Relevant_specialisation ').val();
							var maximum_of_10_Projects_contracts  = $('#maximum_of_10_Projects_contracts').val();
							var No_of_years_in_business  = $('#No_of_years_in_business').val();
							var Number_of_employees  = $('#Number_of_employees ').val();
							var Other_employees  = $('#Other_employees').val();


							// Attachment Documents 
							var form_data = new FormData();
							var errors = new Array();

							var Total_Documents = $('#Total_Documents').val();


							for(var i=1; i<=Total_Documents; i++){
								if(!$('#attachment'+i).val()){
									errors.push('Attach '+$('#attachment'+i).attr('data-name'));
								}else{
									form_data.append('attachment'+i, $('#attachment'+i).prop('files')[0]);
								}
							}

							
							if( Category  == "" ){
								alert("Category Field is required");
								window.location.href = "supplier-registration";
							}
							else if(SubCategory == ""){
									alert("Sub category Field is required");
								window.location.href = "supplier-registration";
								}

								else if(Type_of_Business == ""){
									alert("Type of Business Field is required");
								window.location.href = "supplier-registration";
								}

								else if(Nature_of_Business == ""){
									alert("Nature of Field is required");
								window.location.href = "supplier-registration";
								}

								else if(BusinessName == ""){
									alert("Business Field is required");
								window.location.href = "supplier-registration";
								}

								else if(Certificate_of_Registration == ""){
									alert("Ceritificate of Registration Field is required");
								window.location.href = "supplier-registration";
								}

								else if(Tax_compliance_certificate_expiration == ""){
									alert("Tax compliance Field is required");
								window.location.href = "supplier-registration";
								}

								else if(Revenue_Authority_Taxpayers_Identification_Number == ""){
									alert("Revenue Authority Taxpayers Identification Number Field is required");
								window.location.href = "supplier-registration";
								}

								else if(company_email == ""){
									alert("Company Email Field is required");
								window.location.href = "supplier-registration";
								}

								else if(physical_address == ""){
									alert("Physical Address Field is required");
								window.location.href = "supplier-registration";
								}


								else if(National_Pension_Authority == ""){
									alert("National Pension Authority Field is required");
								window.location.href = "supplier-registration";
								}

								else if(NAPSA_Compliance_Status_certificate == ""){
									alert("NAPSA Field is required");
								window.location.href = "supplier-registration";
								}

								else if(contact_person == ""){
									alert("Contact Person Field is required");
								window.location.href = "supplier-registration";
								}


								else if(company_telephone == ""){
									alert("Company Telephone Field is required");
								window.location.href = "supplier-registration";
								}

								else if(contact_person_telephone == ""){
									alert("Contact Person Telephone Field is required");
								window.location.href = "supplier-registration";
								}

								else if(Account_name == ""){
									alert("Account Name Field is required");
								window.location.href = "supplier-registration";
								}

								else if(Bank_name == ""){
									alert("Bank Name Field is required");
								window.location.href = "supplier-registration";
								}

								else if(Bank_Account == ""){
									alert("Bank Account Field is required");
								window.location.href = "supplier-registration";
								}

								else if(Bank_Branch == ""){
									alert("Bank Branch Field is required");
								window.location.href = "supplier-registration";
								}
								else if(Branch_code == ""){
									alert("Branch Code Field is required");
								window.location.href = "supplier-registration";
								}
								else if(Account_currency == ""){
									alert("Account Currency Field is required");
								window.location.href = "supplier-registration";
								}
								else if(company_financial_contact == ""){
									alert("Company Financial Contact Field is required");
								window.location.href = "supplier-registration";
								}
								else if(contact_person_email == ""){
									alert("Contact person Email Field is required");
								window.location.href = "supplier-registration";
								}
								else if(contact_person_phone_number == ""){
									alert("contact person phone number Field is required");
								window.location.href = "supplier-registration";
								}
								else if(Annual_turnover == ""){
									alert("Annual Turnover Field is required");
								window.location.href = "supplier-registration";
								}
								else if(Current_assets == ""){
									alert("Current Assets Field is required");
								window.location.href = "supplier-registration";
								}
								else if(Current_liabilities == ""){
									alert("Current liabilities Field is required");
								window.location.href = "supplier-registration";
								}
								else if(Current_ratio == ""){
									alert("Current Ratio Field is required");
								window.location.href = "supplier-registration";
								}
								else if(Relevant_specialisation == ""){
									alert("Relevant Specialisation Field is required");
								window.location.href = "supplier-registration";
								}
								else if(maximum_of_10_Projects_contracts == ""){
									alert("Maximum of 10 projects Field is required");
								window.location.href = "supplier-registration";
								}
								else if(No_of_years_in_business == ""){
									alert("Number of years Field is required");
								window.location.href = "supplier-registration";
								}
								else if(Number_of_employees == ""){
									alert("Number of Employees Field is required");
								window.location.href = "supplier-registration";
								}
								else if(Other_employees == ""){
									alert("Other Employess Field is required");
								window.location.href = "supplier-registration";
								}
								
							
								if(errors.length){
								alert(errors.join('\n'));
								window.location.href = "supplier-registration";
								$('#Supplier_Registration_Details').prop('disabled','false');
								
								
							}


							form_data.append('Total_Documents', Total_Documents);

							form_data.append('country', country);
							form_data.append('Category', Category);
							form_data.append('SubCategory', SubCategory);
							form_data.append('Type_of_Business', Type_of_Business);
							form_data.append('Nature_of_Business', Nature_of_Business);
							
							form_data.append('BusinessName', BusinessName);
							form_data.append('Certificate_of_Registration', Certificate_of_Registration);
							form_data.append('Tax_compliance_certificate_expiration', Tax_compliance_certificate_expiration);
							form_data.append('Revenue_Authority_Taxpayers_Identification_Number', Revenue_Authority_Taxpayers_Identification_Number);
							form_data.append('company_email', company_email);
							form_data.append('physical_address', physical_address);
							form_data.append('National_Pension_Authority', National_Pension_Authority);
							form_data.append('NAPSA_Compliance_Status_certificate', NAPSA_Compliance_Status_certificate);
							form_data.append('contact_person', contact_person);
							form_data.append('company_telephone', company_telephone);
							form_data.append('contact_person_telephone', contact_person_telephone);
							form_data.append('Account_name', Account_name);
							form_data.append('Bank_name', Bank_name);
							form_data.append('Bank_Account', Bank_Account);
							form_data.append('Bank_Branch', Bank_Branch);
							form_data.append('Branch_code', Branch_code);
							form_data.append('Account_currency', Account_currency);
							form_data.append('company_financial_contact', company_financial_contact);
							form_data.append('contact_person_email', contact_person_email);
							form_data.append('contact_person_phone_number', contact_person_phone_number);
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
								url			:'SupplierRegistration-Details',
								success		:function(data){
									if(data.status){
										$('form').stepy('step',3);
										$('.supplier-submitted-details').html(data.details);
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


					$(document).ready(function(){
						$('#Supplier_Registration_Details').click(function(){
							
							var form_data = new FormData();
							form_data.append('x','x');
							$.ajax({
								type: "post",
								processData: false,
								contentType: false,
								cache: false,
								data		: form_data,								
								headers		:{	'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},

								url			:'/fetch-supplier-data',
								success		:function(data){
									//alert(data)
									
								},
								error: function(data)
								{
									$('body').html(JSON.stringify(data, null, 4));
								}
							});
						});
					});


					$(document).ready(function(){
					$("#country").change(function(){

					var country = $(this).val();
				
					var form_data = new FormData();

					form_data.append('country', country);
					
					$.ajax({
								type: "post",
								processData: false,
								contentType: false,
								cache: false,
								data		: form_data,	
								url			:'Countries',							
								headers		:{	'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
								success		:function(data){
									if(data.status){
										
										$('#code1').attr('value', data.changeCode)
										$('#code2').attr('value', data.changeCode)
										$('#code3').attr('value', data.changeCode)
										$('#code4').attr('value', data.changeCode)
										// $('#Tax_Compliance_no_label').attr('value', data.changeCode)

										var zambia_code = data.changeCode;
										if(zambia_code == 260){

											$("#Tax_Compliance_no_label").text("Zambia Revenue Authority (ZRA) Taxpayer’s Identification Number (TPIN)");

											$("#Tax_Compliance_certificate_expiration_label").text("ZRA Tax compliance certificate expiration date");

											
										}
										else{
											$("#Tax_Compliance_no_label").text("Revenue Authority Taxpayer’s Identification Number");
											$("#Tax_Compliance_certificate_expiration_label").text("Tax compliance certificate expiration date :");
										}

									}else{										
										$('#firstForm').show();
										$('#otpForm').hide();
									}
								}
					});
				});
				});


				$(document).ready(function(){
					$("#Category").change(function(){

					var Category = $(this).val();

					var form_data = new FormData();

					form_data.append('Category', Category);
					
					$.ajax({
								type: "post",
								processData: false,
								contentType: false,
								cache: false,
								data		: form_data,	
								url			:'/subcategories',							
								headers		:{	'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
								success		:function(data){
								
									$('#SubCategory').html(data);
								}
					});
				});
				});


			// </script>

				
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
