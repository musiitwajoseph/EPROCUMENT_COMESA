<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Business Detials</title>

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
					<a href="javascript:void(0)" class="style_item jQclr blue_theme style_active" title="blue">blue</a>
					<a href="javascript:void(0)" class="style_item jQclr dark_theme" title="dark">dark</a>
					<a href="javascript:void(0)" class="style_item jQclr green_theme" title="green">green</a>
					<a href="javascript:void(0)" class="style_item jQclr brown_theme" title="brown">brown</a>
					<a href="javascript:void(0)" class="style_item jQclr eastern_blue_theme" title="eastern_blue">eastern blue</a>
					<a href="javascript:void(0)" class="style_item jQclr tamarillo_theme" title="tamarillo">tamarillo</a>
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
				<a href="#" id="showCss" class="btn btn-primary btn-sm">Show CSS</a>
				<a href="#" id="resetDefault" class="btn btn-default btn-sm">Reset</a>
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
							<a class="brand pull-left" href="{{route('supplier-registration')}}">COMESA :: EPROCUREMENT</a>
							
						</div>
					</div>
				</nav>

				

			</header>

            <div id="contentwrapper">
                <div class="main_content">


<div class="row">
    <div class="col-sm-12 col-md-12">
		
		<div class="row">
            <div class="col-sm-12 col-md-12">

				<div class="tabbable">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#tab1" data-toggle="tab">Business Details </a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab1">

                            @foreach ($Accessed_user as $item)
                            <input type="hidden" name="user_id" id="user_id" value={{$item->id}}>
                            @endforeach

                            <div class="formSep form-group">
                                <h2 class="heading padMarg" style="font-weight: bold">Business Details</h2>
                                <div class="col-md-3">								
                                <label for="" class="boldTitle padMarg">Country :</label>  
                                <select name="country" id="country"  class="input-sm form-control">		
                                    <option data-countryCode="GB" value={{$User_country}}>{{$user_country_name}}</option>
                                    
                                    @foreach ($countrylist as $country)
                                    
                                    <option data-countryCode="GB" value={{$country->PhoneCode}}>{{$country->Name}}</option>
                                    @endforeach

                                </select>
                                </div>
                                

                                <div class="col-md-3">
                                    <label for="" class="boldTitle padMarg">Category :</label>
                                    <select name="Category" id="Category"  class="input-sm form-control">
                                        <option value={{$db_category}}>{{$user_selected_category}}</option>
                                        @foreach ($categories as $item)
                                            <option value={{$item->md_id}}>{{$item->md_name}}</option>
                                        @endforeach

                                    </select>	
                                </div>

                                <div class="col-md-3">
                                    <label for="" class="boldTitle padMarg">Sub-category :</label>
                                    <select name="SubCategory" id="SubCategory"  class="input-sm form-control">
                                        <option value={{$db_sub_category}}>{{$user_selected_sub_category}}</option>
                                    </select>
                                        
                                </div>

                                @foreach ($Accessed_user as $item)
                                <div class="col-md-3">
                                    <label for="" class="boldTitle padMarg">Business Name :</label>
                                    <input type="text" name="BusinessName" id="BusinessName"  class="input-sm form-control" value="{{$item->BusinessName}}" required>
                                </div>
                                @endforeach

                                <div class="padMarg">

                                        <div class="col-md-3 mt-3 pt-4">
                                            <label for="" class="boldTitle padMarg" class="padMarg">Type of Business :</label>
                                            <select type="text" name="Type_of_Business" id="Type_of_Business" class="input-sm form-control">
                                                <option value={{$db_type_of_business}}>{{$user_selected_type_of_business}}</option>
                                                @foreach ($Type_of_Business as $item)
                                                 <option value="{{$item->md_id}}">{{$item->md_name}}</option>
                                            @endforeach


                                            </select>
                                        </div>

                                        <div class="col-md-3 mt-3 pt-4">
                                            <label for="" class="boldTitle padMarg" class="padMarg">Nature of Business :</label>
                                            <select type="text" name="Nature_of_Business" id="Nature_of_Business" class="input-sm form-control">
                                                <option value="Cereals">Cereals</option>
                                                <option value="saab">Cosmetics</option>
                                                <option value="mercedes">Mercedes</option>
                                                <option value="audi">Audi</option>
                                            </select>
                                        </div>

                                        @foreach ($Accessed_user as $item)
                                        <div class="col-md-3">
                                            <label for="" class="boldTitle " style="text-align: left">Certificate of Registration Incorporation number :</label>
                                            <input type="text" name="Certificate_of_Registration" id="Certificate_of_Registration" class="input-sm form-control" value="{{$item->Certificate_of_Registration}}" required>
                                        </div>
                                        @endforeach


                                         @foreach ($Accessed_user as $item)
                                        <div class="col-md-3">
                                            <label for="" class="boldTitle padMarg" >Revenue Authority Taxpayer’s Identification Number</label>
                                            <input type="text" name="Revenue_Authority_Taxpayers_Identification_Number" value="{{$item->Revenue_Authority_Taxpayers_Identification_Number}}" id="Revenue_Authority_Taxpayers_Identification_Number" class="input-sm form-control" required>
                                        </div>
                                        @endforeach
                                </div>

                                <div class="padMarg">
                                    @foreach ($Accessed_user as $item)
                                    <div class="col-md-3 mt-3 pt-4">
                                        <label for="" class="boldTitle " style="text-align: left" id="Tax_Compliance_certificate_expiration_label">Tax compliance certificate expiration date :</label>
                                        <input type="text" name="Tax_compliance_certificate_expiration" value="{{$item->Tax_compliance_certificate_expiration}}" id="Tax_compliance_certificate_expiration" class="input-sm form-control" required>
                                    </div>
                                    @endforeach

                                    @foreach ($Accessed_user as $item)
                                    <div class="col-md-3">
                                        <label for="" class="boldTitle padMarg"  class="padMarg">Physical address :</label>
                                        <input type="text" name="physical_address" value="{{$item->physical_address}}" id="physical_address" class="input-sm form-control">
                                    </div>
                                    @endforeach

                                    @foreach ($Accessed_user as $item)
                                    <div class="col-md-3">
                                        <label for="" class="boldTitle padMarg" class="padMarg">Company Email :</label>
                                        <input type="email" name="company_email" value="{{$item->company_email}}" id="company_email" class="input-sm form-control" required>
                                    </div>
                                    </div>
                                    @endforeach

                                    @foreach ($Accessed_user as $item)
                                <div class="padMarg">
                                    <div class="col-md-3 mt-3 pt-4">
                                        <label for="" class="boldTitle"  id="National_Pension_Authority_label">National Pension Authority (NPSA) Registration No : </label>
                                        <input type="text" name="National_Pension_Authority" value="{{$item->National_Pension_Authority}}" id="National_Pension_Authority" class="input-sm form-control" required>
                                    </div>
                                    @endforeach

                                    @foreach ($Accessed_user as $item)
                                    <div class="col-md-6 mt-3 pt-4">
                                        <label for="" class="boldTitle padMarg" style="text-align: left" id="NAPSA_Compliance_Status_certificate _label">NAPSA Compliance Status certificate  :</label>
                                        <input type="text" name="NAPSA_Compliance_Status_certificate" value="{{$item->NAPSA_Compliance_Status_certificate}}" id="NAPSA_Compliance_Status_certificate" class="input-sm form-control" required>
                                    </div>
                                    @endforeach


                                    @foreach ($Accessed_user as $item)
                                    <div class="col-md-6 mt-3 pt-4 padMarg">
                                        <label for="" class="boldTitle">Personal contact :</label>   
                                        <div class="col-md-2 mt-0 pt-0 mr-0 pr-0" style="padding:0; margin:0;">
                                            <input type="text" name="code1" value="+260" id="code1" class="input-sm form-control" >
                                        </div>										
                                        <div class="col-md-10  mt-0 pt-0 ml-0 pl-0" style="padding:0; margin:0;">
                                            <input type="text" name="contact_person" value="{{$item->contact_person}}" id="contact_person" class="input-sm form-control"  required>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                                    
                                @foreach ($Accessed_user as $item)
                                    <div class="col-md-6 mt-3 pt-4 padMarg">
                                        <label for="" class="boldTitle">Company Telephone number : </label>
                                        <div class="col-md-2 mt-0 pt-0 mr-0 pr-0" style="padding:0; margin:0;">
                                            <input type="text" name="code2" id="code2" class="input-sm form-control" value="+256">
                                        </div>
                                        <div class="col-md-10 mt-3 pt-4 " style="padding:0; margin:0;">
                                            <input type="text" name="company_telephone" id="company_telephone" value="{{$item->company_telephone}}" class="input-sm form-control"  required>
                                        </div>
                                    </div>
                                    @endforeach



                                    @foreach ($Accessed_user as $item)
                                    <div class="col-md-6 mt-3 pt-4 padMarg">
                                        <label for="" class="boldTitle">Contact telephone number : </label>
                                        <div class="col-md-2 mt-0 pt-0 mr-0 pr-0" style="padding:0; margin:0;">
                                            <input type="text" name="code3" id="code3" class="input-sm form-control" value="+256">
                                        </div>
                                        <div class="col-md-10" style="padding:0; margin:0;">
                                            <input type="text" name="contact_person_telephone" id="contact_person_telephone" value="{{$item->contact_person_telephone}}" class="input-sm form-control" required>
                                        </div>
                                    </div>
                                    @endforeach


                                    <div class="col-md-6 mt-3 pt-4 padMarg">
                                       <button type="button" id="update_business_information" class="btn btn-primary">
                                        Update Business Details <i class="glyphicon glyphicon-chevron-right"></i>
                                    </button>

                                </div>
                        </div>
                        </div>
						</div>

					</div>
				</div>
			</div>
			
		</div>
		
    </div>
</div>
</div>
</div>

</div>
           

    <script src="/assets/js/jquery.min.js"></script>

    <script type="text/javascript">

    $(document).ready(function(){
        $("#country").change(function(){

        var country = $(this).val();
                        
        var form_data = new FormData();

        form_data.append('country', country);
        
        $.ajax({
                    type: "POST",
                    processData: false,
                    contentType: false,
                    cache: false,
                    data		: form_data,	
                    url			:'/Countries',							
                    headers		:{	'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
                    success		:function(data){
                        if(data.status){
                            $('#code1').attr('value', data.changeCode)
                            $('#code2').attr('value', data.changeCode)
                            $('#code3').attr('value', data.changeCode)
                            $('#code4').attr('value', data.changeCode)

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
                    },
                    error: function(data)
                    {
                        $('body').html(data.responseText);
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


                $(document).ready(function(){
						$('#update_business_information').click(function(){

							$('#update_business_information').attr('disabled','false');
							$('#update_business_information').html('Updating...');

                            var user_id = $('#user_id').val();
							var country = $('#country').val();
							var Category = $('#Category').val();
							var SubCategory = $('#SubCategory').val();
                            var BusinessName = $('#BusinessName').val();
							var Type_of_Business = $('#Type_of_Business').val();
							var Nature_of_Business = $('#Nature_of_Business').val();
                            var Certificate_of_Registration = $('#Certificate_of_Registration').val();
							var Revenue_Authority_Taxpayers_Identification_Number = $('#Revenue_Authority_Taxpayers_Identification_Number').val();
							var Tax_compliance_certificate_expiration = $('#Tax_compliance_certificate_expiration').val();
                            var physical_address = $('#physical_address').val();
							var company_email = $('#company_email').val();
							var National_Pension_Authority = $('#National_Pension_Authority').val();
                            var NAPSA_Compliance_Status_certificate = $('#NAPSA_Compliance_Status_certificate').val();
							var contact_person = $('#contact_person').val();
							var company_telephone = $('#company_telephone').val();
                            var contact_person_telephone = $('#contact_person_telephone').val();

							if( Category  == "" ){
								alert("Category Field is required");
								window.location.href = "/edit-business-details/"+user_id;
							}
							else if(SubCategory == ""){
									alert("Sub category Field is required");
								window.location.href = "/edit-business-details/"+user_id;
								}

								else if(Type_of_Business == ""){
									alert("Type of Business Field is required");
								window.location.href = "/edit-business-details/"+user_id;
								}

								else if(Nature_of_Business == ""){
									alert("Nature of Field is required");
								window.location.href = "/edit-business-details/"+user_id;
								}

								else if(BusinessName == ""){
									alert("Business Field is required");
								window.location.href = "/edit-business-details/"+user_id;
								}

								else if(Certificate_of_Registration == ""){
									alert("Ceritificate of Registration Field is required");
								window.location.href = "/edit-business-details/"+user_id;
								}

								else if(Tax_compliance_certificate_expiration == ""){
									alert("Tax compliance Field is required");
								window.location.href = "/edit-business-details/"+user_id;
								}

								else if(Revenue_Authority_Taxpayers_Identification_Number == ""){
									alert("Revenue Authority Taxpayers Identification Number Field is required");
								window.location.href = "/edit-business-details/"+user_id;
								}

								else if(company_email == ""){
									alert("Company Email Field is required");
								window.location.href = "/edit-business-details/"+user_id;
								}

								else if(physical_address == ""){
									alert("Physical Address Field is required");
								window.location.href = "/edit-business-details/"+user_id;
								}


								else if(National_Pension_Authority == ""){
									alert("National Pension Authority Field is required");
								window.location.href = "/edit-business-details/"+user_id;
								}

								else if(NAPSA_Compliance_Status_certificate == ""){
									alert("NAPSA Field is required");
								window.location.href = "/edit-business-details/"+user_id;
								}

								else if(contact_person == ""){
									alert("Contact Person Field is required");
								window.location.href = "/edit-business-details/"+user_id;
								}


								else if(company_telephone == ""){
									alert("Company Telephone Field is required");
								window.location.href = "/edit-business-details/"+user_id;
								}

								else if(contact_person_telephone == ""){
									alert("Contact Person Telephone Field is required");
								window.location.href = "/edit-business-details/"+user_id;
								}

							var form_data = new FormData();


                            form_data.append('user_id', user_id);
							form_data.append('country', country);
							form_data.append('Category', Category);
							form_data.append('BusinessName', BusinessName);
							form_data.append('Type_of_Business', Type_of_Business);
							form_data.append('Nature_of_Business', Nature_of_Business);
							form_data.append('SubCategory', SubCategory);
							form_data.append('BusinessName', BusinessName);
							form_data.append('Type_of_Business', Type_of_Business);
							form_data.append('Certificate_of_Registration', Certificate_of_Registration);
							form_data.append('Revenue_Authority_Taxpayers_Identification_Number', Revenue_Authority_Taxpayers_Identification_Number);
							form_data.append('Tax_compliance_certificate_expiration', Tax_compliance_certificate_expiration);
							form_data.append('physical_address', physical_address);
							form_data.append('company_email', company_email);
							form_data.append('National_Pension_Authority', National_Pension_Authority);
							form_data.append('NAPSA_Compliance_Status_certificate', NAPSA_Compliance_Status_certificate);
							form_data.append('contact_person', contact_person);
							form_data.append('company_telephone', company_telephone);
							form_data.append('contact_person_telephone', contact_person_telephone);
													
							
							$.ajax({
								type: "post",
								processData: false,
								contentType: false,
								cache: false,
								data		: form_data,								
								headers		:{	'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},

								url			:'/update-business-supplier-data',
								success		:function(data){

									if(data.status){
                                        alert(data.message);
										location.replace('/UpdatedBusiness/'+data.user_id)
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
