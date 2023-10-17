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
                    <fieldset title="Contract info">
						<legend class="hide">Email Validation & OTP</legend>
						<section id="firstForm">
							<div>
								<label class="">Email Validation Step</label>
							</div>
							<div class="formSep form-group">
								<label for="v_username" class="col-md-2 control-label">Company Name / Personal Name:</label>
								<div class="col-md-10">
									<input type="text" name="v_username" id="v_username" class="input-sm form-control">
								</div>
							</div>
							<div class="formSep form-group">
								<label for="v_telephone" class="col-md-2 control-label">Telephone:</label>
								<div class="col-md-10">
									<input type="text" name="v_telephone" id="v_telephone" class="input-sm form-control">
								</div>
							</div>
							<div class="form-group">
								<label for="v_email" class="col-md-2 control-label">E-mail:</label>
								<div class="col-md-10">
									<input type="text" name="v_email" id="v_email" class="input-sm form-control">

									@error('v_email')
										<label class="text-danger">{{message}}</label>
									@enderror
								</div>
							</div>						
							<div>
								<button  id="validateEmail" type="button" class="btn btn-primary">
									Validate Email <i class="glyphicon glyphicon-check"></i>
								</button>
							</div>
						</section>
						<section id="otpForm">
							<div>
								

								<label class="">One Time Password</label> 
								<button class="btn btn-success" id="regenerate_otp">Regenerate new OTP</button>  

								<button   type="button" class="btn btn-warning" id="redirectBack">
									Change Email <i class="glyphicon glyphicon-chevron-right"></i>
									</button>
								<br> <br>
								<label class=""> <span style="font-weight: bold" id="otpMessage"></span></label>
							</div>
							<div class="form-group">
								<label for="otp_token" class="col-md-2 control-label">Enter OTP</label>
								<div class="col-md-10">
									<input type="text" name="otp_token" id="otp_token" class="input-sm form-control" required>
								</div>
							</div>	

							<h6 style="font: bold;color:red;" id="otpExpiry"></h6>

							<div>
								<button  id="nextText checkOTP" type="button" class="btn btn-primary" onclick="verifyOTPZ()">
									Submit <i class="glyphicon glyphicon-chevron-right"></i>
								</button>
								
							</div>

						</section>
                    </fieldset>

					
                    <fieldset title="Contact info">
                        <legend class="hide">Lorem ipsum dolor…</legend>
						<h2 class="heading padMarg" style="font-weight: bold">1.Business Details</h2>
                        <div class="formSep form-group">

								<div class="col-md-3">								
								<label for="" class="boldTitle padMarg">Country :</label>  
								<select name="country" id="country"  class="input-sm form-control">		
									
									@foreach ($countrylist as $country)

									<option data-countryCode="GB" value={{$country->PhoneCode}} Selected>{{$country->Name}}</option>
									@endforeach

									{{-- <option data-countryCode="GB" value="Zambia" Selected>Zambia</option> --}}

								</select>
								</div>
								

								<div class="col-md-3">
									<label for="" class="boldTitle padMarg">Category :</label>
									<select name="Category" id="Category"  class="input-sm form-control">
										<option value="">Select Category</option>
										@foreach ($categories as $item)
											<option value="{{$item->md_id}}">{{$item->md_name}}</option>
										@endforeach

									</select>	
								</div>

								<div class="col-md-3">
									<label for="" class="boldTitle padMarg">Sub-category :</label>
									<select name="SubCategory" id="SubCategory"  class="input-sm form-control">
										<option value="Cereals">Foods</option>
									</select>
										
								</div>

								<div class="col-md-3">
									<label for="" class="boldTitle padMarg">Business Name :</label>
									<input type="text" name="BusinessName" id="BusinessName" class="input-sm form-control" required>
								</div>

								<div class="padMarg">

										<div class="col-md-3 mt-3 pt-4">
											<label for="" class="boldTitle padMarg" class="padMarg">Type of Business :</label>
											<select type="text" name="Type_of_Business" id="Type_of_Business" class="input-sm form-control">
												@foreach ($Type_of_Business as $item)
											<option value="{{$item->md_id}}">{{$item->md_name}}</option>
											@endforeach


											</select>
										</div>

										<div class="col-md-3 mt-3 pt-4">
											<label for="" class="boldTitle padMarg" class="padMarg">Nature of Business :</label>
											<select type="text" name="Nature_of_Business" id="Nature_of_Business" class="input-sm form-control">
												<option value="Zambia">Cereals</option>
												<option value="saab">Cosmetics</option>
												<option value="mercedes">Mercedes</option>
												<option value="audi">Audi</option>
											</select>
										</div>

										<div class="col-md-3">
											<label for="" class="boldTitle " style="text-align: left">Certificate of Registration Incorporation number :</label>
											<input type="text" name="Certificate_of_Registration" id="Certificate_of_Registration" class="input-sm form-control" required>
										</div>


										<div class="col-md-3">
											<label for="" class="boldTitle padMarg" >Revenue Authority Taxpayer’s Identification Number</label>
											<input type="text" name="Revenue_Authority_Taxpayers_Identification_Number" id="Revenue_Authority_Taxpayers_Identification_Number" class="input-sm form-control" required>
										</div>
								</div>

								<div class="padMarg">

									<div class="col-md-3 mt-3 pt-4">
										<label for="" class="boldTitle " style="text-align: left" id="Tax_Compliance_certificate_expiration_label">Tax compliance certificate expiration date :</label>
										<input type="text" name="Tax_compliance_certificate_expiration" id="Tax_compliance_certificate_expiration" class="input-sm form-control" required>
									</div>

									<div class="col-md-3">
										<label for="" class="boldTitle padMarg"  class="padMarg">Physical address :</label>
										<input type="text" name="physical_address" id="physical_address" class="input-sm form-control">
									</div>


									<div class="col-md-3">
										<label for="" class="boldTitle padMarg" class="padMarg">Company Email :</label>
										<input type="email" name="company_email" id="company_email" class="input-sm form-control" required>
									</div>
								</div>

								<div class="padMarg">
									<div class="col-md-3 mt-3 pt-4">
										<label for="" class="boldTitle"  id="National_Pension_Authority_label">National Pension Authority (NPSA) Registration No : </label>
										<input type="text" name="National_Pension_Authority" id="National_Pension_Authority" class="input-sm form-control" required>
									</div>

									<div class="col-md-6 mt-3 pt-4">
										<label for="" class="boldTitle padMarg" style="text-align: left" id="NAPSA_Compliance_Status_certificate _label">NAPSA Compliance Status certificate  :</label>
										<input type="text" name="NAPSA_Compliance_Status_certificate" id="NAPSA_Compliance_Status_certificate" class="input-sm form-control" required>
									</div>


									<div class="col-md-6 mt-3 pt-4 padMarg">
										<label for="" class="boldTitle">Personal contact :</label>
										<div class="col-md-2 mt-0 pt-0 mr-0 pr-0" style="padding:0; margin:0;">
											<input type="text" name="code1" value="+260" id="code1" class="input-sm form-control" >
										</div>										
										<div class="col-md-10  mt-0 pt-0 ml-0 pl-0" style="padding:0; margin:0;">
											<input type="text" name="contact_person" id="contact_person" class="input-sm form-control"  required>
										</div>
									</div>
								</div>
									

									
									<div class="col-md-6 mt-3 pt-4 padMarg">
										<label for="" class="boldTitle">Company Telephone number : </label>
										<div class="col-md-2 mt-0 pt-0 mr-0 pr-0" style="padding:0; margin:0;">
											<input type="text" name="code2" id="code2" class="input-sm form-control" value="+256">
										</div>
										<div class="col-md-10 mt-3 pt-4 " style="padding:0; margin:0;">
											<input type="text" name="company_telephone" id="company_telephone" class="input-sm form-control"  required>
										</div>
									</div>

									<div class="col-md-6 mt-3 pt-4 padMarg">
										<label for="" class="boldTitle">Contact telephone number : </label>
										<div class="col-md-2 mt-0 pt-0 mr-0 pr-0" style="padding:0; margin:0;">
											<input type="text" name="code3" id="code3" class="input-sm form-control" value="+256">
										</div>
										<div class="col-md-10" style="padding:0; margin:0;">
											<input type="text" name="contact_person_telephone" id="contact_person_telephone" class="input-sm form-control" required>
										</div>
									</div>

				
                        </div>


							<legend class="hide">Lorem ipsum dolor…</legend>
							<h2 class="heading padMarg" style="font-weight: bold">2.Financial Information</h2>
                        
							<div class="formSep form-group">
								<div class="col-md-3">
									<label for="" class="boldTitle padMarg">Account name :</label>
									<input type="text" name="Account_name" id="Account_name" class="input-sm form-control" required>
								</div>

								<div class="col-md-3">
									<label for="" class="boldTitle padMarg">Bank name :</label>
									<input type="text" name="Bank_name" id="Bank_name" class="input-sm form-control" required>
								</div>

								<div class="col-md-3">
									<label for="" class="boldTitle padMarg">Bank Account number :</label>
									<input type="text" name="Bank_Account" id="Bank_Account" class="input-sm form-control" required>
								</div>

								<div class="col-md-3">
									<label for="" class="boldTitle padMarg">Bank Branch :</label>
									<input type="text" name="Bank_Branch" id="Bank_Branch" class="input-sm form-control" required>
								</div>

								<div class="RowCollection">
									<div class="col-md-3">
										<label for="" class="boldTitle padMarg" class="padMarg">Branch code :</label>
										<input type="text" name="Branch_code" id="Branch_code" class="input-sm form-control" required>
									</div>
		
									<div class="col-md-3">
										<label for="" class="boldTitle padMarg" class="padMarg">Account currency :</label>
										<input type="text" name="Account_currency" id="Account_currency" class="input-sm form-control" required>
									</div>
									
		
									<div class="col-md-3 padMarg">
										<label for="" class="boldTitle " >Company financial contact person :</label>
										<input type="text" name="company_financial_contact" id="company_financial_contact" class="input-sm form-control" required>
									</div>


		
									<div class="col-md-3">
										<label for="" class="boldTitle padMarg" class="padMarg">Contact person email :</label>
										<input type="eamail" name="contact_person_email" id="contact_person_email" class="input-sm form-control" required>
									</div>

								</div>

								<div class="RowCollection">

									<div class="col-md-4 mt-3 pt-4 padMarg">
										<label for="" class="boldTitle">Contact person phone number : </label>
										<div class="col-md-2 mt-0 pt-0 mr-0 pr-0" style="padding:0; margin:0;">
											<input type="text" name="code3" id="code4" class="input-sm form-control" value="+256">
										</div>
										<div class="col-md-10" style="padding:0; margin:0;">
											<input type="text" name="contact_person_phone_number" id="contact_person_phone_number" class="input-sm form-control">
										</div>
									</div>

																	
								</div>
	                        </div>

							{{-- 3.Professional capacity--}}

						<legend class="hide">Lorem ipsum dolor…</legend>
						<h2 class="heading padMarg" style="font-weight: bold">3.Economic & financial capacity</h2>

						<div class="formSep form-group">
							<div class="col-md-4">
								<label for="" class="boldTitle padMarg">Annual turnover excluding this contract :</label>
								<input type="number" name="Annual_turnover" id="Annual_turnover" class="input-sm form-control" required>
							</div>

							<div class="col-md-4">
								<label for="" class="boldTitle padMarg">Current assets :</label>
								<input type="number" name="Current_assets" id="Current_assets" class="input-sm form-control" required>
							</div>

							<div class="col-md-4">
								<label for="" class="boldTitle padMarg">Current liabilities :</label>
								<input type="number" name="Current_liabilities" id="Current_liabilities" class="input-sm form-control" required>
							</div>

							<div class="col-md-4">
								<label for="" class="boldTitle padMarg">Current ratio (current assets/current liabilities) :</label>
								<input type="number" name="Current_ratio" id="Current_ratio" class="input-sm form-control" required>
							</div>
						</div>


						{{-- 4.Technical capacity--}}

						<legend class="hide">Lorem ipsum dolor…</legend>
						<h2 class="heading padMarg" style="font-weight: bold">4.Technical capacity</h2>

						<div class="formSep form-group">
							<div class="mt-4 pt-4 padMarg"></div>
							<div class="col-md-6">
								<label for="" class="boldTitle padMarg" style="margin-top: 7rem !important">a)	Relevant specialisation (state a maximum of 3)  :</label>
								<textarea name="Relevant_specialisation " id="Relevant_specialisation " class="input-sm form-control" cols="30" rows="10" required></textarea>
							</div>

							<div class="col-md-6">
								<label for="" class="boldTitle padMarg">b)	A maximum of 10 Projects/contracts (For each, state: Country projects executed, Overall contract value (US$); Proportion carried out by legal entity; Number of personnel provided; Name of client; and Origin of funding)</label>
								{{-- <input type="number" > --}}
								<textarea name="maximum_of_10_Projects_contracts" id="maximum_of_10_Projects_contracts" class="input-sm form-control" cols="30" rows="10" required></textarea>
							</div>
						</div>


							{{-- 5.Professional capacity--}}

						<legend class="hide">Lorem ipsum dolor…</legend>
						<h2 class="heading padMarg" style="font-weight: bold">5.Professional capacity</h2>

						<div class="formSep form-group">
							<div class="col-md-4">
								<label for="" class="boldTitle padMarg">No of years in business :</label>
								<input type="number" name="No_of_years_in_business" id="No_of_years_in_business" class="input-sm form-control" required>
							</div>

							<div class="col-md-4">
								<label for="" class="boldTitle padMarg">Number of employees</label>
								<input type="number" name="Number_of_employees" id="Number_of_employees" class="input-sm form-control" required>
							</div>

							<div class="col-md-4">
								<label for="" class="boldTitle padMarg">Other employees</label>
								<input type="number" name="Other_employees" id="Other_employees" class="input-sm form-control" required>
							</div>
						</div>

							{{-- 6.	Required Documents --}}

						<legend class="hide">Lorem ipsum dolor…</legend>
						<h2 class="heading padMarg" style="font-weight: bold">6.Required Documents </h2>

						<div class="formSep form-group">
							<?php $counter = 1; ?>
							@foreach ($Documents as $document)
								<div class="col-md-6">
									<label for="" class="boldTitle padMarg" class="padMarg">{{$document->md_name}} :</label>
									<input data-name = "{{$document->md_name}}" type="file"  name="attachment<?php echo $counter; ?>" id="attachment<?php echo $counter; ?>" class="input-sm form-control " required>
								</div>
								<?php $counter++; ?>
							@endforeach

							<input type="hidden" value="<?php echo $counter-1; ?>" id="Total_Documents"/>

						</div>
					

						<div id="backText" class="pull-left">
							<button type="button" class="btn btn-primary">
								<i class="glyphicon glyphicon-chevron-left"></i> Back 
							</button>
						</div>

						<div id="nextText_000" class="pull-right">
							<button type="button" id="Supplier_Registration_Details" class="btn btn-primary">
								Save and Complete <i class="glyphicon glyphicon-chevron-right"></i>
							</button>
						</div>

                    </fieldset>

					


					<fieldset title="Additional info">
                        <legend class="hide">Lorem ipsum dolor…</legend>
						<div class="formSep form-group">
                            <label for="v_message" class="col-md-2 control-label">Your Message:</label>
                            <div class="col-md-10">
								<textarea name="v_message" id="v_message" rows="3" class="form-control"></textarea>
							</div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Newsletter:</label>
                            <div class="col-md-10">
								<label class="radio-inline" for="newsletter_yes">
									<input type="radio" value="yes" id="newsletter_yes" name="v_newsletter"> Yes
								</label>
								<label class="radio-inline" for="newsletter_no">
									<input type="radio" value="no" id="newsletter_no" name="v_newsletter"> No
								</label>
							</div>
                        </div>						
						<div id="backText">
							<button type="button" class="btn btn-primary">
								<i class="glyphicon glyphicon-chevron-left"></i> Back 
							</button>
						</div>
					</fieldset>
                    <button type="button" class="finish btn btn-primary"><i class="glyphicon glyphicon-ok"></i> Send registration</button>
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

							if(errors.length){
								alert(errors.join('\n'));
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


							// return false;
							
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
										alert(data.message);
										$('form').stepy('step',3);
									}else{										
										$('#firstForm').show();
										$('#otpForm').hide();
									}								
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
								url			:'subcategories',							
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
