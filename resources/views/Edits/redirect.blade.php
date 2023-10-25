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

		<div class="row">
			<div class="col-sm-12 col-md-12">
                <form id="validate_wizard" class="stepy-wizzard form-horizontal">
							
					<fieldset title="Confirm Details">
                        <legend class="hide">Confirm provided Supplier Details</legend>


						<div class="supplier-submitted-details">

						</div>

						<div class="formSep form-group">
                            <label for="v_message" class="col-md-2 control-label">Additional Infomation that may be added <br> (If applicable):</label>
                            <div class="col-md-10">
								<textarea name="v_message" id="v_message" rows="3" class="form-control"></textarea>
							</div>
                        </div>
		
						<div class="row">
							<div class="col-sm-12 col-md-12">
								<div class="row">
									<div class="col-sm-12 col-md-12">
										<h3 class="heading">SELF-DECLARATION </h3>
										<div id="accordion1" class="panel-group accordion">
											<div class="panel panel-default">
												<div class="panel-heading">
													<a href="#collapseOne" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle collapsed">
														Please Read & Confirm these Regulations : #1
													</a>
												</div>
												<div class="panel-collapse collapse" id="collapseOne">
													<div class="panel-body" style="font-size: 1em;">


														<ol type="a">
										
														<p><li>	I/We are nationals of  <span id="db_country"> </span>  therefore eligible and that I/We have legal capacity to enter into contract and have sufficient experience to undertake this assignment;</li></p>
														
														<p><li>	The information given above is true and further state that I/We also understand that payment of any required fees does not guarantee inclusion into the supplier database;</li></p>
														
														<p><li>	I/We are not insolvent/in receivership, bankrupt or wound up, business activities not suspended/not subject to legal proceedings. I/We/ have not been convicted of offences concerning professional conduct by a judgment which have the force of res judicata; (i.e. against which no appeal is possible);</li></p>
														
														<p><li>	I/We have not been the subject of a judgment which has the force of res judicata for fraud, corruption, involvement in a criminal organisation or any other illegal activity detrimental to the COMESA Secretariat's financial interests; or are not being currently subject to an administrative penalty;</li></p>
														
														<p><li>	if the legal, technical, financial position, or the contractual capacity of the firm changes, we commit ourselves to inform you and acknowledge your sole right to review the pre-qualification made;</li></p>
														
														<p><li>	I/We understand that I/We shall be disqualified should the information submitted here for purpose of seeking qualification be materially inaccurate or materially incomplete;</li></p>
														
														<p><li>	I/We give COMESA the authority to seek any other references concerning my/Our Company from whatever sources deemed relevant; </li></p>
														
														<p><li>	if pre-qualified, I/we undertake to participate in submission of a tender or quotation when called upon to do so;</li></p>
														
														<p><li>	I/We have fulfilled obligations related to the payments of social security contributions and the payment of taxes in accordance with the legal provisions of the country in which I am/we are established or with those countries where the contract is to be performed;</li></p>
														
														<p><li>	I/We are aware that, for the purposes of safeguarding the COMESA’s financial interests, our personal data may be transferred to internal audit services, of COMESA</li></p>
														
														<p><li>	I/We undertake, if required, to provide the proof usual under the law of the country in which we are effectively established that we do not fall into any of the exclusion situations. The date on the evidence or documents provided will be no earlier than 1 year before the date of submission of the tender and, in addition, we will provide a statement that our situation has not altered in the period which has elapsed since the evidence in question was drawn up.</li></p>
														
														<p><li>	I/We also undertake, if required, to provide evidence of our financial and economic standing and our technical and professional capacity according to the requirements of this call for Prequalification</li></p>
														<br>
				
															
														<input type="checkbox" id="Acceept_rules_and_regulations"  required> &nbsp; <label for="Acceept_rules_and_regulations" style="display: inline">Read and accept the above rules and regulations before you submit your Application</label> 
															
														<input type="hidden" value="hello" id="unique_id_db">
														</ol>
													</div>
												</div>
											</div>
											
										</div>
									</div>
									
								</div>
							</div>
						</div>  
						
							<input type="hidden" name="dynamic_id" id="dynamic_id" value={{$dynamic_id}}>
						<div id="backText">
							<button type="button" class="btn btn-primary">
								<i class="glyphicon glyphicon-chevron-left"></i> Back 
							</button>
						</div>
					</fieldset>

					
                    <button type="button" id="final_submission" class="finish btn btn-primary"><i class="glyphicon glyphicon-ok"></i> Send registration</button>
                </form>
				
				<script src="/assets/js/jquery.min.js"></script>

				
				<script type="text/javascript">


					$(document).ready(function(){
						$('#final_submission').click(function(){

							var check = false;
							if($('#Acceept_rules_and_regulations').prop('checked') == true ){
								check = $('#Acceept_rules_and_regulations').val();
							}

							if(check == 0){
								alert("You have to accept the rules and regulations before you submit");
								return ;
							}


							var user_id = $('#unique_id_db').val();


							var form_data = new FormData();

							form_data.append('user_id', user_id);


							$.ajax({
								type: "post",
								processData: false,
								contentType: false,
								cache: false,
								data		: form_data,								
								headers		:{	'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},

								url			:'/update-and-submit',
								success		:function(data){
									if(data.status){
										alert(data.message);
										location.replace('/userdata/'+data.user_id);
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
						

						var user_id = $('#dynamic_id').val();

						var form_data = new FormData();

                        form_data.append('user_id', user_id);

							$.ajax({
								type: "post",
								processData: false,
								contentType: false,
								cache: false,
								data		: form_data,								
								headers		:{	'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},

								url			:'/LoadUpdatedInformation',
								success		:function(data){
									
									if(data.status){
										$('.supplier-submitted-details').html(data.details);
										$('#db_country').html(data.submited_country);
										$("#unique_id_db").val(data.unique_id);
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
