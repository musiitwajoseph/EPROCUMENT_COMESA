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

    <!-- favicon -->
    <link rel="shortcut icon" href="/assets/favicon.ico" />

    <!--[if lte IE 8]>
            <link rel="stylesheet" href="/assets/css/ie.css" />
        <![endif]-->

    <!--[if lt IE 9]>
   <script src="/assets/js/ie/html5.js"></script>
   <script src="/assets/js/ie/respond.min.js"></script>
   <script src="/assets/lib/flot/excanvas.min.js"></script>
        <![endif]-->
</head>

<body class="full_width">
    <div class="style_switcher">
        <div class="sepH_c">
            <p>Colors:</p>
            <div class="clearfix">
                <a href="/assets/javascript:void(0)" class="style_item jQclr blue_theme style_active"
                    title="blue">blue</a>
                <a href="/assets/javascript:void(0)" class="style_item jQclr dark_theme" title="dark">dark</a>
                <a href="/assets/javascript:void(0)" class="style_item jQclr green_theme" title="green">green</a>
                <a href="/assets/javascript:void(0)" class="style_item jQclr brown_theme" title="brown">brown</a>
                <a href="/assets/javascript:void(0)" class="style_item jQclr eastern_blue_theme"
                    title="eastern_blue">eastern blue</a>
                <a href="/assets/javascript:void(0)" class="style_item jQclr tamarillo_theme"
                    title="tamarillo">tamarillo</a>
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
                <label class="radio-inline"><input name="ssw_layout" id="ssw_layout_fluid" value="" checked=""
                        type="radio"> Fluid</label>
                <label class="radio-inline"><input name="ssw_layout" id="ssw_layout_fixed" value="gebo-fixed"
                        type="radio"> Fixed</label>
            </div>
        </div>
        <div class="sepH_c">
            <p>Sidebar position:</p>
            <div class="clearfix">
                <label class="radio-inline"><input name="ssw_sidebar" id="ssw_sidebar_left" value=""
                        checked="" type="radio"> Left</label>
                <label class="radio-inline"><input name="ssw_sidebar" id="ssw_sidebar_right" value="sidebar_right"
                        type="radio"> Right</label>
            </div>
        </div>
        <div class="sepH_c">
            <p>Show top menu on:</p>
            <div class="clearfix">
                <label class="radio-inline"><input name="ssw_menu" id="ssw_menu_click" value=""
                        checked="" type="radio"> Click</label>
                <label class="radio-inline"><input name="ssw_menu" id="ssw_menu_hover" value="menu_hover"
                        type="radio"> Hover</label>
            </div>
        </div>

        <div class="gh_button-group">
            <a href="/assets/#" id="showCss" class="btn btn-primary btn-sm">Show CSS</a>
            <a href="/assets/#" id="resetDefault" class="btn btn-default btn-sm">Reset</a>
        </div>
        <div class="hide">
            <ul id="ssw_styles">
                <li class="small ssw_mbColor sepH_a" style="display:none">body {<span class="ssw_mColor sepH_a"
                        style="display:none"> color: #<span></span>;</span> <span class="ssw_bColor"
                        style="display:none">background-color: #<span></span> </span>}</li>
                <li class="small ssw_lColor sepH_a" style="display:none">a { color: #<span></span> }</li>
            </ul>
        </div>
    </div>
    <div id="maincontainer" class="clearfix">

        <header>

            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="navbar-inner">
                    <div class="container-fluid">
                        <a class="brand pull-left" href="{{ route('admin-dashboard') }}">COMESA :: EPROCUREMENT</a>

                        <ul class="nav navbar-nav user_menu pull-right">


                            <li class="divider-vertical hidden-sm hidden-xs"></li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img
                                        src="img/user_avatar.png" alt=""
                                        class="user_avatar">{{ $LoggedUserAdmin['username'] }}<b
                                        class="caret"></b></a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="javascript:void(0);">My Profile</a></li>
                                    <li class="divider"></li>
                                    <li><a href="{{ route('admin-logout') }}">Log Out</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            @include('includes.user_info')

        </header>
        <div id="contentwrapper">
            <div class="main_content">
                <div id="jCrumbs" class="breadCrumb module">
                    <h1 style="text-align: center;color:blue;">EDIT USER INFORMATION</h1>
                </div>

                <form action="{{ route('store-edit-system-user') }}" class="border p-4 bg-light shadow" method="POST">

                    @csrf

                    @if (Session::get('success'))
                       <div class="alert alert-success">
                        {{Session::get('success')}}
                       </div>
                    @endif

                    @if (Session::get('fail'))
                       <div class="alert alert-danger">
                        {{Session::get('fail')}}
                       </div>
                    @endif

                    <fieldset title="Contract info">

							<div class="formSep form-group">

                            <input type="hidden" name="hidden_id" class="input-sm form-control" value="{{$info->id}}" required>


                                <div class="mb-3 col-md-6">
                                    <label>Firstname<span class="text-danger">*</span></label>
                                    <input type="text" name="firstname" id="firstname" class="input-sm form-control" placeholder="Enter Firstname" value="{{$info->firstname}}" required>
                                    <span class="text-danger">@error('firstname'){{$message}}@enderror</span>
                                </div>
    
                                <div class="mb-3 col-md-6">
                                    <label>Lastname<span class="text-danger">*</span></label>
                                    <input type="text" name="lastname" id="lastname" class="input-sm form-control" placeholder="Enter Lastname" value="{{$info->lastname}}" required>
                                    <span class="text-danger">@error('lastname'){{$message}}@enderror</span>
                                </div>
							

                            <div class="mb-3  col-md-6" style="margin-top: 1rem;">
                                <label>Username<span class="text-danger">*</span></label>
                                <input type="text" name="username" id="username" class="input-sm form-control" placeholder="Enter username" value="{{$info->username}}" required>
                                <span class="text-danger">@error('username'){{$message}}@enderror</span>
                            </div>

                            <div class="mb-3 col-md-6" style="margin-top: 1rem;">
                                <label>Gender<span class="text-danger">*</span></label>
                                <select name="gender" id="gender" class="input-sm form-control">
                                    <option  value="{{$info->gender}}">{{$info->gender}}</option>    
                                    <option  value="Male">Male</option>    
                                    <option  value="Female">Female</option>    
                                </select>
                                <span class="text-danger">@error('gender'){{$message}}@enderror</span>
                            </div>


                            <div class="mb-3 col-md-6" style="margin-top: 1rem;">
                                <label>User Role<span class="text-danger">*</span></label>
                                <select name="user_role" id="user_role" class="input-sm form-control">
                                    <option  value="{{$info->user_role}}">{{$info->user_role}}</option>    
                                    @foreach ($user_roles as $user_role)
                                    <option  value="{{$user_role->user_name}}">{{$user_role->user_name}}</option>    
                                    @endforeach
                                </select>
                                <span class="text-danger">@error('username'){{$message}}@enderror</span>
                            </div>

                            <div class="mb-3 col-md-6" style="margin-top: 1rem;">
                                <label>Phonenumber<span class="text-danger">*</span></label>
                                <input type="text" name="phonenumber" id="phonenumber" class="input-sm form-control" placeholder="Enter phonenumber" value="{{$info->phonenumber}}" required>
                                <span class="text-danger">@error('phonenumber'){{$message}}@enderror</span>
                            </div>

                            <div class="mb-3 col-md-6" style="margin-top: 1rem;">
                                <label>Email<span class="text-danger">*</span></label>
                                <input type="email" name="email" id="email" class="input-sm form-control" placeholder="Enter Email" value="{{$info->email}}" required>
                                <span class="text-danger">@error('email'){{$message}}@enderror</span>
                            </div>

                            <div class="mb-3 col-md-6" style="margin-top: 1rem;">
                                <label>Password<span class="text-danger">*</span></label>
                                <input type="password" name="password" id="password" class="input-sm form-control" placeholder="Enter Password">
                                <span class="text-danger">@error('password'){{$message}}@enderror</span>
                            </div>
                           
                            <div class="col-md-12" style="margin-top: 2rem;">
                               <button class="btn btn-primary float-end" >Update User</button>
                            </div>
                        </div>
                    
						</section>
                    </fieldset>
				</form>
				
            </div>
        </div>

    </div>

    <a href="/assets/javascript:void(0)" class="sidebar_switch on_switch bs_ttip" data-placement="auto right"
        data-viewport="body" title="Hide Sidebar">Sidebar switch</a>

    @include('includes.side-bar')

    <script src="/assets/js/jquery.min.js"></script>

    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/cust.js"></script>
    <script type="text/javascript">
	
	$(document).ready(function(){
		app_approvals();
        $('#mini_dashboard').hide();

	});
	
	</script>

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
