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

									<option data-countryCode="GB" value={{$country->Name}} Selected>{{$country->Name}}</option>
									@endforeach
									
								</select>
								</div>
								

								<div class="col-md-3">
									<label for="" class="boldTitle padMarg">Category :</label>
									<input type="text" name="Category" id="Category" class="input-sm form-control">
								</div>

								<div class="col-md-3">
									<label for="" class="boldTitle padMarg">Sub-category :</label>
									<input type="text" name="SubCategory" id="SubCategory" class="input-sm form-control">
								</div>

								<div class="col-md-3">
									<label for="" class="boldTitle padMarg">Business Name :</label>
									<input type="text" name="BusinessName" id="BusinessName" class="input-sm form-control">
								</div>

								<div class="padMarg">

										<div class="col-md-3 mt-3 pt-4">
											<label for="" class="boldTitle padMarg" class="padMarg">Type of Business :</label>
											<select type="text" name="Type_of_Business" id="Type_of_Business" class="input-sm form-control">
												<option value="Zambia">Food and Drinks</option>
												<option value="saab">Agriculture</option>
												<option value="mercedes">Medicine</option>
												<option value="audi">Audi</option>
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
											<input type="text" name="Certificate_of_Registration" id="Certificate_of_Registration" class="input-sm form-control">
										</div>


										<div class="col-md-3">
											<label for="" class="boldTitle padMarg" class="padMarg">KRA PIN No. :</label>
											<input type="text" name="KRA_PIN_No" id="KRA_PIN_No" class="input-sm form-control">
										</div>
								</div>

								<div class="padMarg">
									<div class="col-md-3 mt-3 pt-4">
										<label for="" class="boldTitle padMarg" class="padMarg">Tax Compliance no :</label>
										<input type="text" name="Tax_Compliance_no" id="Tax_Compliance_no" class="input-sm form-control">
									</div>

									<div class="col-md-3 mt-3 pt-4">
										<label for="" class="boldTitle" style="text-align: left">Tax compliance certificate expiration date :</label>
										<input type="text" name="Tax_compliance_certificate_expiration" id="Tax_compliance_certificate_expiration" class="input-sm form-control">
									</div>

									<div class="col-md-3">
										<label for="" class="boldTitle padMarg"  class="padMarg">Physical address :</label>
										<input type="text" name="physical_address" id="physical_address" class="input-sm form-control">
									</div>


									<div class="col-md-3">
										<label for="" class="boldTitle padMarg" class="padMarg">Company Email :</label>
										<input type="text" name="company_email" id="company_email" class="input-sm form-control">
									</div>
								</div>

								<div class="padMarg">
									
									
									<div class="col-md-1 mt-3 pt-4">
										<label for="" class="boldTitle padMarg" >code : </label>
										<input type="text"type="text" name="code1" value="+260" id="code1" class="input-sm form-control" >
									</div>
									
									<div class="col-md-3 mt-5 pt-5 padMarg">
										<label for="" class="boldTitle ">personal contact :</label>
										<input type="text" name="contact_person" id="contact_person" class="input-sm form-control padMarg" >
									</div>

									<div class="col-md-1 mt-3 pt-4">
										<label for="" class="boldTitle padMarg" class="padMarg">code </label>
										<input type="text" name="code2" id="code2" class="input-sm form-control" value="+256">
									</div>

									<div class="col-md-3 mt-3 pt-4 ">
										<label for="" class="boldTitle hidde padMarg" >Company Telephone number :</label>
										<input type="text" name="company_telephone" id="company_telephone" class="input-sm form-control" >
									</div>

									<div class="col-md-1 mt-3 pt-4">
										<label for="" class="boldTitle padMarg" class="padMarg"> code </label>
										<input type="text" name="code3" id="code3" class="input-sm form-control" value="+256">
									</div>

									<div class="col-md-3">
										<label for="" class="boldTitle padMarg"  >Contact telephone number :</label>
										<input type="text" name="contact_person_telephone" id="contact_person_telephone" class="input-sm form-control">
									</div>

								</div>
                        </div>


							<legend class="hide">Lorem ipsum dolor…</legend>
							<h2 class="heading padMarg" style="font-weight: bold">2.Financial Information</h2>
                        
							<div class="formSep form-group">
								<div class="col-md-3">
									<label for="" class="boldTitle padMarg">Account name :</label>
									<input type="text" name="Account_name" id="Account_name" class="input-sm form-control">
								</div>

								<div class="col-md-3">
									<label for="" class="boldTitle padMarg">Bank name :</label>
									<input type="text" name="Bank_name" id="Bank_name" class="input-sm form-control">
								</div>

								<div class="col-md-3">
									<label for="" class="boldTitle padMarg">Bank Account number :</label>
									<input type="text" name="Bank_Account" id="Bank_Account" class="input-sm form-control">
								</div>

								<div class="col-md-3">
									<label for="" class="boldTitle padMarg">Bank Branch :</label>
									<input type="text" name="Bank_Branch" id="Bank_Branch" class="input-sm form-control">
								</div>

								<div class="RowCollection">
									<div class="col-md-3">
										<label for="" class="boldTitle padMarg" class="padMarg">Branch code :</label>
										<input type="text" name="Branch_code" id="Branch_code" class="input-sm form-control">
									</div>
		
									<div class="col-md-3">
										<label for="" class="boldTitle padMarg" class="padMarg">Account currency :</label>
										<input type="text" name="Account_currency" id="Account_currency" class="input-sm form-control">
									</div>
		
									<div class="col-md-3 padMarg">
										<label for="" class="boldTitle " >Company financial contact person :</label>
										<input type="text" name="company_financial_contact" id="company_financial_contact" class="input-sm form-control">
									</div>
		
									<div class="col-md-3">
										<label for="" class="boldTitle padMarg" class="padMarg">Contact person email :</label>
										<input type="text" name="contact_person_email" id="contact_person_email" class="input-sm form-control">
									</div>

								</div>

								<div class="RowCollection">

									<div class="col-md-4">								
										<label for="" class="boldTitle padMarg">Country Code:</label>  
							
										<input type="text" name="code4" id="code4" class="input-sm form-control" value="+256">

										</div>

										<br>

									<div class="col-md-3">
										<label for="" class="boldTitle padMarg" class="padMarg">Contact person phone number :</label>
										<input type="text" name="contact_person_phone_number" id="contact_person_phone_number" class="input-sm form-control">
									</div>								
								</div>
	                        </div>

							{{-- 3.Professional capacity--}}

						<legend class="hide">Lorem ipsum dolor…</legend>
						<h2 class="heading padMarg" style="font-weight: bold">3.Professional capacity</h2>

						<div class="formSep form-group">
							<div class="col-md-6">
								<label for="" class="boldTitle padMarg">No of years in business :</label>
								<input type="number" name="No_of_years_in_business" id="No_of_years_in_business" class="input-sm form-control">
							</div>

							<div class="col-md-6">
								<label for="" class="boldTitle padMarg">Number of employees</label>
								<input type="number" name="Number_of_employees" id="Number_of_employees" class="input-sm form-control">
							</div>
						</div>

							{{-- 4.	Required Documents --}}

							<legend class="hide">Lorem ipsum dolor…</legend>
						<h2 class="heading padMarg" style="font-weight: bold">4.Required Documents </h2>

						<div class="formSep form-group">

							<div class="col-md-6">
								<label for="" class="boldTitle padMarg" class="padMarg">Certificate of Registration/Incorporation :</label>
								<input type="text" name="certificate_of_Registration_Incorporation" id="certificate_of_Registration_Incorporation" class="input-sm form-control">
							</div>

							<div class="col-md-6">
								<label for="" class="boldTitle padMarg" class="padMarg">Attach :</label>
								<input type="file"  name="certificate_of_Registration_Incorporation_Attach" id="certificate_of_Registration_Incorporation_Attach" class="input-sm form-control ">
							</div>


							<div class="col-md-6">
								<label for="" class="boldTitle padMarg" class="padMarg">KRA PIN Certificate :</label>
								<input type="text" name="KRA_PIN_certificate" id="KRA_PIN_certificate" class="input-sm form-control">
							</div>	
							
							<div class="col-md-6">
								<label for="" class="boldTitle padMarg" class="padMarg">Attach :</label>
								<input type="file" name="KRA_PIN_certificate_Attach" id="KRA_PIN_certificate_Attach" class="input-sm form-control ">
							</div>

							
							<div class="col-md-6">
								<label for="" class="boldTitle padMarg" class="padMarg">Tax Compliance Certificate : </label>
								<input type="text" name="Tax_Compliance_certificate" id="Tax_Compliance_certificate" class="input-sm form-control">
							</div>

							<div class="col-md-6">
								<label for="" class="boldTitle padMarg" class="padMarg">Attach :</label>
								<input type="file" name="Tax_Compliance_certificate_Attach" id="Tax_Compliance_certificate_Attach" class="input-sm form-control ">
							</div>

							<div class="col-md-6">
								<label for="" class="boldTitle padMarg" class="padMarg">Article of Association / CR12 document :</label>
								<input type="text" name="Article_of_Association" id="Article_of_Association" class="input-sm form-control">
							</div>

							<div class="col-md-6">
								<label for="" class="boldTitle padMarg" class="padMarg">Attach :</label>
								<input type="file" name="Article_of_Association_Attach" id="Article_of_Association_Attach" class="input-sm form-control ">
							</div>


							<div class="col-md-6">
								<label for="" class="boldTitle padMarg" class="padMarg">Company profile :</label>
								<input type="text" name="Company_profile" id="Company_profile" class="input-sm form-control">
							</div>

							<div class="col-md-6">
								<label for="" class="boldTitle padMarg" class="padMarg">Attach :</label>
								<input type="file" name="Company_profile_Attach" id="Company_profile_Attach" class="input-sm form-control ">
							</div>
							
							<div class="col-md-6">
								<label for="" class="boldTitle padMarg" class="padMarg">Bank Reference Letter : </label>
								<input type="text" name="Bank_Refrence_letter" id="Bank_Refrence_letter" class="input-sm form-control">
							</div>

							<div class="col-md-6">
								<label for="" class="boldTitle padMarg" class="padMarg">Attach :</label>
								<input type="file" name="Bank_Refrence_letter_Attach" id="Bank_Refrence_letter_Attach" class="input-sm form-control ">
							</div>


							<div class="col-md-6">
								<label for="" class="boldTitle padMarg" class="padMarg">Audited financial reports :</label>
								<input type="text" name="Audited_financial_reports" id="Audited_financial_reports" class="input-sm form-control">
							</div>

							<div class="col-md-6">
								<label for="" class="boldTitle padMarg" class="padMarg">Attach :</label>
								<input type="file" name="Audited_financial_reports_Attach" id="Audited_financial_reports_Attach" class="input-sm form-control ">
							</div>


							<div class="col-md-6">
								<label for="" class="boldTitle padMarg" class="padMarg">Single Business permit (where applicable) :</label>
								<input type="text" name="Single_Business_Permit" id="Single_Business_Permit" class="input-sm form-control">
							</div>

							<div class="col-md-6">
								<label for="" class="boldTitle padMarg" class="padMarg">Attach :</label>
								<input type="file" name="Single_Business_Permit_Attach" id="Single_Business_Permit_Attach" class="input-sm form-control ">
							</div>

							<div class="col-md-6">
								<label for="" class="boldTitle padMarg" class="padMarg">Manufacturer’s authorization letter (where applicable) :</label>
								<input type="text" name="Manufacturers_authorization_letter" id="Manufacturers_authorization_letter" class="input-sm form-control">
							</div>

							<div class="col-md-6">
								<label for="" class="boldTitle padMarg" class="padMarg">Attach :</label>
								<input type="file" name="Manufacturers_authorization_letter_Attach" id="Manufacturers_authorization_letter_Attach" class="input-sm form-control ">
							</div>


							<div class="col-md-6">
								<label for="" class="boldTitle padMarg" class="padMarg">Practicing certificates (where applicable) :</label>
								<input type="text" name="Practicing_certification" id="Practicing_certification" class="input-sm form-control">
							</div>

							<div class="col-md-6">
								<label for="" class="boldTitle padMarg" class="padMarg">Attach :</label>
								<input type="file" name="Practicing_certification_Attach" id="Practicing_certification_Attach" class="input-sm form-control ">
							</div>

							<div class="col-md-6">
								<label for="" class="boldTitle padMarg" class="padMarg">Recommendation letters from current clients :</label>
								<input type="text" name="Recommendation_letters_from_current_clients" id="Recommendation_letters_from_current_clients" class="input-sm form-control">
							</div>

							<div class="col-md-6">
								<label for="" class="boldTitle padMarg" class="padMarg">Attach :</label>
								<input type="file" name="Recommendation_letters_from_current_clients_Attach" id="Recommendation_letters_from_current_clients_Attach" class="input-sm form-control ">
							</div>

							<div class="col-md-6">
								<label for="" class="boldTitle padMarg" class="padMarg">LPO’s or Contracts offering similar services :</label>
								<input type="text" name="LPOs_offering_similar_services" id="LPOs_offering_similar_services" class="input-sm form-control">
							</div>

							<div class="col-md-6">
								<label for="" class="boldTitle padMarg" class="padMarg">Attach :</label>
								<input type="file" name="LPOs_offering_similar_services_Attach" id="LPOs_offering_similar_services_Attach" class="input-sm form-control ">
							</div>		
						</div>
					

						<div id="backText" class="pull-left">
							<button type="button" class="btn btn-primary">
								<i class="glyphicon glyphicon-chevron-left"></i> Back 
							</button>
						</div>

						<div id="nextText" class="pull-right">
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
									// alert(data)
									//var values = JSON.parse(data);
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
									//window.location.href = "supplier-registration";
									
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

							$('#Supplier_Registration_Details').attr('disabled','false');
							$('#Supplier_Registration_Details').html('Loading...');

							var country = $('#country').val();
							var Category = $('#Category').val();
							var SubCategory = $('#SubCategory').val();
							var BusinessName = $('#BusinessName').val();

							var Type_of_Business = $('#Type_of_Business').val();
							var Nature_of_Business = $('#Nature_of_Business').val();
							var Certificate_of_Registration = $('#Certificate_of_Registration').val();
							var KRA_PIN_No = $('#KRA_PIN_No').val();

							var Tax_Compliance_no = $('#Tax_Compliance_no').val();
							var Tax_compliance_certificate_expiration = $('#Tax_compliance_certificate_expiration').val();
							var physical_address = $('#physical_address').val();
							var company_email = $('#company_email').val();
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
							
							var No_of_years_in_business = $('#No_of_years_in_business').val();
							var Number_of_employees = $('#Number_of_employees').val();


							var certificate_of_Registration_Incorporation = $('#certificate_of_Registration_Incorporation').val();
							var certificate_of_Registration_Incorporation_Attach = $('#certificate_of_Registration_Incorporation_Attach').prop('files')[0];	
							var KRA_PIN_certificate = $('#KRA_PIN_certificate').val();
							var KRA_PIN_certificate_Attach = $('#KRA_PIN_certificate_Attach').prop('files')[0];
							var Tax_Compliance_certificate = $('#Tax_Compliance_certificate').val();

							var Tax_Compliance_certificate_Attach = $('#Tax_Compliance_certificate_Attach').prop('files')[0];
							var Article_of_Association = $('#Article_of_Association').val();
							var Article_of_Association_Attach = $('#Article_of_Association_Attach').prop('files')[0];
							var Bank_Refrence_letter = $('#Bank_Refrence_letter').val();
							var Bank_Refrence_letter_Attach = $('#Bank_Refrence_letter_Attach').prop('files')[0];

							var Audited_financial_reports = $('#Audited_financial_reports').val();
							var Audited_financial_reports_Attach = $('#Audited_financial_reports_Attach').prop('files')[0];
							var Single_Business_Permit = $('#Single_Business_Permit').val();
							var Single_Business_Permit_Attach = $('#Single_Business_Permit_Attach').prop('files')[0];
							var Manufacturers_authorization_letter = $('#Manufacturers_authorization_letter').val();
							var Manufacturers_authorization_letter_Attach = $('#Manufacturers_authorization_letter_Attach').prop('files')[0];
							var Practicing_certification = $('#Practicing_certification').val();
							var Practicing_certification_Attach = $('#Practicing_certification_Attach').prop('files')[0];
							var Recommendation_letters_from_current_clients = $('#Recommendation_letters_from_current_clients').val();
							var Recommendation_letters_from_current_clients_Attach = $('#Recommendation_letters_from_current_clients_Attach').prop('files')[0];
							var LPOs_offering_similar_services = $('#LPOs_offering_similar_services').val();
							var LPOs_offering_similar_services_Attach = $('#LPOs_offering_similar_services_Attach').prop('files')[0];


							
							var form_data = new FormData();

							form_data.append('country', country);
							form_data.append('Category', Category);
							form_data.append('SubCategory', SubCategory);
							form_data.append('BusinessName', BusinessName);
							form_data.append('Type_of_Business', Type_of_Business);
							form_data.append('Nature_of_Business', Nature_of_Business);


							form_data.append('Certificate_of_Registration', Certificate_of_Registration);
							form_data.append('KRA_PIN_No', KRA_PIN_No);
							form_data.append('Tax_Compliance_no', Tax_Compliance_no);
							form_data.append('Tax_compliance_certificate_expiration', Tax_compliance_certificate_expiration);
							form_data.append('physical_address', physical_address);
							form_data.append('company_email', company_email);
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
							form_data.append('No_of_years_in_business', No_of_years_in_business);
							form_data.append('Number_of_employees', Number_of_employees);
							form_data.append('Single_Business_Permit', Single_Business_Permit);
							form_data.append('Single_Business_Permit_Attach', Single_Business_Permit_Attach);
							form_data.append('Practicing_certification', Practicing_certification);
							form_data.append('Practicing_certification_Attach', Practicing_certification_Attach);
							
							form_data.append('certificate_of_Registration_Incorporation', certificate_of_Registration_Incorporation);
							form_data.append('certificate_of_Registration_Incorporation_Attach', certificate_of_Registration_Incorporation_Attach);
							form_data.append('KRA_PIN_certificate', KRA_PIN_certificate);
							form_data.append('KRA_PIN_certificate_Attach', KRA_PIN_certificate_Attach);
							form_data.append('Tax_Compliance_certificate', Tax_Compliance_certificate);
							form_data.append('Tax_Compliance_certificate_Attach', Tax_Compliance_certificate_Attach);
							form_data.append('Article_of_Association', Article_of_Association);
							form_data.append('Bank_Refrence_letter', Bank_Refrence_letter);
							form_data.append('Bank_Refrence_letter_Attach', Bank_Refrence_letter_Attach);
							form_data.append('Audited_financial_reports', Audited_financial_reports);
							form_data.append('Audited_financial_reports_Attach', Audited_financial_reports_Attach);
							form_data.append('Manufacturers_authorization_letter', Manufacturers_authorization_letter);
							form_data.append('Manufacturers_authorization_letter_Attach', Manufacturers_authorization_letter_Attach);
							form_data.append('LPOs_offering_similar_services', LPOs_offering_similar_services);
							form_data.append('LPOs_offering_similar_services_Attach', LPOs_offering_similar_services_Attach);
							form_data.append('Recommendation_letters_from_current_clients', Recommendation_letters_from_current_clients);
							form_data.append('Recommendation_letters_from_current_clients_Attach', Recommendation_letters_from_current_clients_Attach);
							form_data.append('Article_of_Association_Attach', Article_of_Association_Attach);
							
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
									}else{										
										$('#firstForm').show();
										$('#otpForm').hide();
									}								
								},
								error: function($data)
								{
									alert('Missing Data in the form being submitted');
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

									}else{										
										$('#firstForm').show();
										$('#otpForm').hide();
									}
								}
					});
				});
				});


				$(document).ready(function(){
			
				$.ajax({
				url: "LoadCountries",
				method: "POST",
				data :'platforms=platforms',
				dataType: 'json',
				contentType: false,
				cache: false,
				processData: false,
				headers		:{	'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
				success: function(data) {

					// alert(data);
					// for(item of data){
					// 	$('#country').append(`<div>${item}</div>`)
					// }

					// for(var i = 0; response.length < i; i++) {
                    // $('.platformsList').html('
					// 	'+response.name+'
					// 	');

					
				}

        })
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
