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

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Include SweetAlert CSS and JS from CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

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



            {{-- @include('includes.TopNavTest'); --}}


            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="navbar-inner">
                    <div class="container-fluid">
                        <a class="brand pull-left" href="{{ route('admin-dashboard') }}">COMESA :: EPROCUREMENT</a>

                        <ul class="nav navbar-nav user_menu pull-right">


                            <li class="divider-vertical hidden-sm hidden-xs"></li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img
                                        src="/assets/img/user_avatar.png" alt=""
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


                <div id="all_data">

                    <input type="hidden" name="admin_username_hidden" id="admin_username_hidden"
                        value={{ $LoggedUserAdmin['username'] }}>

                    <input type="hidden" name="admin_email_hidden" id="admin_email_hidden"
                        value={{ $LoggedUserAdmin['email'] }}>

                    <input type="hidden" name="user_id" id="user_id" value={{ $LoggedUserAdmin['id'] }}>

                    <section id="">
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <h3 class="heading" style="color: rgba(8, 94, 22, 0.637);font-weight:bold;">Your
                                    Approved Suppliers</h3>

                                <table class="table table-bordered table-striped" id="smpl_tbl">
                                    <thead>
                                        <tr>
                                            <th>Business Name</th>
                                            <th>Nature of Business</th>
                                            <th>Contact Person</th>
                                            <th>Physical Address</th>
                                            <th>National Pension Authority</th>
                                            <th>Bank Name</th>
                                            <th>Years in Business</th>
                                            <th style="text-align: center">Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($approved as $item)
                                              <tr>
                                                <td>{{ $item->BusinessName }}</td>
                                                <td>{{ $item->Nature_of_Business }}</td>
                                                <td>{{ $item->contact_person }}</td>
                                                <td>{{ $item->physical_address }}</td>
                                                <td>{{ $item->National_Pension_Authority }}</td>
                                                <td>{{ $item->Bank_name }}</td>
                                                <td>{{ $item->No_of_years_in_business }}</td>
                                                <td><button class="btn btn-warning">Pending</button></td>
                                                <td><a href="{{ url('fully-approved/' . $item->id )}}"
                                                        class="btn btn-success">View Details</a></td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </section>
                </div>

            </div>
        </div>

    </div>

    @include('includes.user_info')

    <a href="/assets/javascript:void(0)" class="sidebar_switch on_switch bs_ttip" data-placement="auto right"
        data-viewport="body" title="Hide Sidebar">Sidebar switch</a>

    @include('includes.side-bar')

    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/cust.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            app_approvals();
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
