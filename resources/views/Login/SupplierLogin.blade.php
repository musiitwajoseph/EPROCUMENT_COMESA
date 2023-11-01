<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>COMESA E::Procurement</title>

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

			
			<script src="/assets/js/jquery.min.js"></script>
			<script src="/assets/js/swal.min.js"></script>

			<meta name="csrf-token" content="{{ csrf_token() }}"/>

   </head>
    <body class="full_width">
        <div id="maincontainer" class="clearfix">

            <header>
				@include('includes.main-menu')
			</header>


            <div id="contentwrapper">
                <div class="main_content">
            <div id="jCrumbs" class="breadCrumb module">
                <ul>
                    <li>
                        <a href="javascript:void(0);"><i class="glyphicon glyphicon-home"></i></a>
                    </li>
                    <li>
                        SUPPLIER LOGIN PORTAL
                    </li>
                </ul>
            </div>


            <div class="col-md-10">
                @if (Session::get('fail'))
                        <div class="alert alert-danger">
                        {{Session::get('fail')}}
                        </div>
                        @endif


                        @if (Session::get('success'))
                        <div class="alert alert-success">
                        {{Session::get('success')}}
                        </div>
                        @endif
            </div>


<div class="row">
    <div class="col-sm-12 col-md-12">
		<div class="row">
			<div class="col-sm-12 col-md-12">
                <form action="{{ route('auth.check') }}" method="POST" class="stepy-wizzard form-horizontal">

					@csrf
                    <fieldset title="Contract info">

							<div class="formSep form-group">
								<label for="v_company_name" id="v_company_name" class="col-md-2 control-label">Email :</label>
								<div class="col-md-10">
									<input type="email" name="email" id="email" class="input-sm form-control" placeholder="Enter you're supplier Email" value="{{old('email')}}" required>
                                    <span class="text-danger">@error('email'){{$message}}@enderror</span>
								</div>
							</div>

							<div class="formSep form-group">
								<label for="v_telephone_name" id="v_telephone_name" class="col-md-2 control-label">Password :</label>
								<div class="col-md-10">
									<input type="password" name="password" id="password" class="input-sm form-control" placeholder="Enter Password" required>
                                    <span class="text-danger">@error('password'){{$message}}@enderror</span>
                                </div>
							</div>

							
                            <div class="formSep form-group">
								<label for="v_telephone_name" id="v_telephone_name" class="col-md-2 control-label">Captcha :</label>
								<div class="col-md-10">
									<input type="text" name="captcha" id="captcha" class="input-sm form-control" placeholder="Enter captcha" required>
                                    <span class="text-danger">@error('captcha'){{$message}}@enderror</span>
                                </div>
							</div>
                            

                            <div class="formSep form-group">
								<label for="v_telephone_name" id="v_telephone_name" class="col-md-2 control-label">Enter this captcha :</label>
                                    <div class="col-md-10">
                                        <div class="captcha"> 
                                        <span>{!! captcha_img('flat') !!}</span>
                                        <button type="submit" class="btn btn-danger reload" id="reload">&#x21bb;</button>   
                                    </div>
                                </div>
							</div>


                            <div class="formSep form-group">
								<label for="v_telephone_name" id="v_telephone_name" class="col-md-2 control-label">Click button to Login :</label>
                                    <div class="col-md-10">
                                        <button class="btn btn-primary float-end" id="supplier_login_in">Login</button>

                                        <p class="pull-right">If you don't have account, Please <a href="{{route('supplier-registration')}}">Signup Now</a></p>

                                    </div>
                                </div>
							</div>

                    
						</section>
                    </fieldset>
				</form>
				

				
				<script type="text/javascript"></script>
                 <script src="/assets/js/jquery.min.js"></script>
      
           <script>

                $('#reload').click(function (){
                      $.ajax({
      
                          type:'GET',
                          url:'reload-captcha',
                          success:function(data){
                              $(".captcha span").html(data.captcha)
                          }
                      });
                  });
      
      
      
                  $('#supplier_login_in').click(function (){
      
                      var email = $('#email').val();
                      var password = $('#password').val();
                      var captcha = $('#captcha').val();
      
                      var form_data = new FormData();
      
                      form_data.append('email',email);
                      form_data.append('password',password);
                      form_data.append('captcha',captcha);
      
      
                      $ajax({
                           type: "POST",
      
                              processData: false,
                              contentType: false,
                              cache: false,
                              data		: form_data,								
                              headers		:{	'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
      
                              url			:'/auth.check',
                              success		:function(data){
                                  alert("Data has been stored");
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

    @include('includes.supplier-side-bar')

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


    <script src="/assets/lib/stepy/js/jquery.stepy.min.js"></script>
    <!-- wizard functions -->
    <script src="/assets/js/pages/gebo_wizard.js"></script>

    </body>
</html>
