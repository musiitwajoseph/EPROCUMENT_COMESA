<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Assign Officer </title>

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

</head>

<body class="full_width">

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
                                        class="user_avatar">{{ $LoggedUserAdmin['username'] }}<b class="caret"></b></a>
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
                <h3 class="heading" style="color: rgb(26, 239, 54)">Assign Officer</h3>

                @if (Session::get('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif

                @include('sweetalert::alert')

                <form action="{{ route('store-assign-officer') }}" method="POST">

                    @csrf
                    <div class="formSep">

                        <div class="row">

                            {{-- For each for the name and State  --}}

                            <input type="hidden" name="user_id" id="user_id" value="{{ $LoggedUserAdmin['id'] }}">

                            <div class="col-sm-3 col-md-3">
                                <label for="">Officer Name</label>
                                <select name="assigned" id="assigned" class="form-control">
                                    @foreach ($approval_officer as $item)
                                        <option value="{{ $item->id }}">{{ $item->username }}</option>
                                    @endforeach

                                </select>

                            </div>


                            <div class="col-sm-3 col-md-3">
                                <label for="">Role</label>
                                <input class="form-control" type="text" name="user_role" id="user_role"
                                    value="{{ $item->user_role }}" required>

                            </div>


                            <div class="clearfix"></div>
                            <br>
                            <div class="col-sm-3 col-md-3">
                                <button type="submit" onclick="disbale_btn()" id="myButton"
                                    class="btn btn-primary">Assign</button>
                            </div>
                </form>

                    
                    <div class="col-sm-12 col-md-12" id="Assigned_approvers">
                        <section id="Approved_suppliers">
                            <br>
                            <h3 class="heading" style="color: rgb(11, 12, 11)">Assigned Approvers</h3>

                            <div class="table-responsive">

                            <table class="table table-bordered table-striped" id="smpl_tbl">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Email</th>
                                        <th>Status Assignment</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach ($assigned_approval_officer as $item)
                                        <tr>
                                            <td>{{ $item->username}}</td>
                                            <td>{{ $item->firstname}}</td>
                                            <td>{{ $item->lastname}}</td>
                                            <td>{{ $item->email}}</td>
                                            <td>{{ $item->user_status}}</td>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

            </div>
        </div>

        <input type="hidden" id="hidden_role" value="{{ $LoggedUserAdmin['user_role'] }}">
        <input type="hidden" id="hidden_status" value="{{ $LoggedUserAdmin['user_status'] }}">


    </div>
    </div>
    </div>

    </div>

    @include('includes.side-bar')

    <script src="/assets/js/jquery.min.js"></script>
    <script type="text/javascript">
        function disbale_btn() {
            document.getElementById('myButton').innerHTML = 'Assigning...';
            // document.getElementById('myButton').disabled = true;
        }

        $(document).ready(function() {

            var hidden_role = $('#hidden_role').val();
            var hidden_status = $('#hidden_status').val();

            if (hidden_role == "Approval Officer" && hidden_status == "null") {
                $('#special_supplier').hide();
                $('#special_procurement_plan').hide();
                $('#special_master_data').hide();
                $('#special_user_data').hide();
                $('#special_user_rights').hide();
                $('#dashboard_menu').hide();
                $('#mini_dashboard').hide();
            } else if (hidden_role == "Approval Officer" && hidden_status == "Assigned") {
                $('#special_supplier').show();
                $('#special_procurement_plan').hide();
                $('#special_master_data').hide();
                $('#special_user_data').hide();
                $('#special_user_rights').hide();
                $('#dashboard_menu').hide();
                $('#mini_dashboard').hide();
            }

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


    <!-- calendar -->
    <script src="/assets/lib/fullcalendar/fullcalendar.min.js"></script>
    <!-- sortable/filterable list -->
    <script src="/assets/lib/list_js/list.min.js"></script>
    <script src="/assets/lib/list_js/plugins/paging/list.paging.min.js"></script>
    <!-- dashboard functions -->
    <script src="/assets/js/pages/gebo_dashboard.js"></script>



</body>

</html>
