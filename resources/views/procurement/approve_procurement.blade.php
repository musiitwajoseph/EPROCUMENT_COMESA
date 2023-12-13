<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Approve procurement plan </title>

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


                @if (Session::get('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif


                <form action="{{ route('add-user-role') }}" method="POST" id="approve_procurement_page">

                    @csrf
                    <div class="formSep">

                        <div class="row">

                            <input type="hidden" name="user_id" id="user_id" value="{{ $LoggedUserAdmin['id'] }}">

                            <div class="col-sm-3 col-md-3">
                                <br>
                            </div>

                            <div class="row">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">

                                        <div class="col-sm-8 col-md-8">

                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 5px">No</th>
                                                        <th style="width: 5px">Division/Unit/Projects</th>
                                                        <th colspan="4" style="text-align: center">Approvers</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td class="table_checkbox"
                                                            style="text-align: center;font-weight:bold;">Head of
                                                            Procurement</td>
                                                        <td class="table_checkbox"
                                                            style="text-align: center;font-weight:bold;">Director HR
                                                        </td>
                                                        <td class="table_checkbox"
                                                            style="text-align: center;font-weight:bold;">ASG Finance
                                                        </td>
                                                        <td class="table_checkbox"
                                                            style="text-align: center;font-weight:bold;">SG </td>
                                                    </tr>
                                                    @foreach ($values as $key => $value)
                                                        <tr>
                                                            <td>{{ $key + 1 }}</td>
                                                            <td>{{ $value->All_sections }}</td>
                                                            <td class="table_checkbox" style="text-align: center;">
                                                                {{ $value->HOP }}</td>
                                                            <td class="table_checkbox" style="text-align: center;">
                                                                {{ $value->director_hr }}</td>
                                                            <td class="table_checkbox" style="text-align: center;">
                                                                {{ $value->ASG_Finance }}</td>
                                                            <td class="table_checkbox" style="text-align: center;">
                                                                {{ $value->SG }}</td>
                                                    @endforeach
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>


                                        <input type="hidden" id="user_role"
                                            value="{{ $LoggedUserAdmin['user_role'] }}">
                                        <input type="hidden" id="user_id" value="{{ $LoggedUserAdmin['id'] }}">

                                        <div class="row sepH_c" id="action_section">
                                            <div class="col-sm-4 col-md-4">

                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th colspan="3" style="text-align: center">Action</th>
                                                        </tr>
                                                        <tr>
                                                            <th style="text-align: center;">Approve</th>
                                                            <th style="text-align: center;">Reject</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td style="text-align: center;"><a class="btn btn-success"
                                                                    id="approve_btn">Approve</a></td>
                                                            <td style="text-align: center;"><a class="btn btn-danger"
                                                                    id="reject_btn">Reject</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" style="text-align: center;"><a
                                                                    href="{{ route('procurement-records') }}"
                                                                    class="btn btn-info">View Procurement plan</a></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="col-sm-8 col-md-8" id="reason_section">
                                            <h3>Provide a reason for rejecting procurement plan</h3>
                                            <br>
                                            <textarea id="reason" class="form-control" id="" cols="30" rows="10"></textarea>
                                        </div>

                                        <div class="col-sm-8 col-md-8" style="padding-top: 1rem;">
                                            <h3>Recent Approvals : </h3>
                                            <br>
                                            @foreach ($approval_reasons as $approval_reason)
                                                <p> <span style="font-weight: bold;">Approver Name:
                                                    </span>{{ $approval_reason->name }}</p>
                                                <p> <span style="font-weight: bold;">Approver Role:
                                                    </span>{{ $approval_reason->role }}</p>
                                                <p> <span style="font-weight: bold;">Approver Reason:
                                                    </span>{{ $approval_reason->reason }}</p>
                                                <p> <span style="font-weight: bold;">Date :
                                                    </span>{{ $approval_reason->created_at }}</p>
                                                <hr>
                                            @endforeach
                                        </div>
                </form>

            </div>
        </div>


    </div>
    </div>
    </div>

    </div>

    @include('includes.side-bar')

    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/Approval_logic.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#approve_btn').click(function() {

                var user_role = $('#user_role').val();
                var user_id = $('#user_id').val();
                var reason = $('#reason').val();


                if (reason == "") {
                    alert("Reason for Approving procurement plan is a must to be provided");
                    return;
                } else {

                    var form_data = new FormData();

                    $('#approve_btn').html('Approving...');
                    $('#approve_btn').attr('disabled', true);

                    form_data.append('user_role', user_role);
                    form_data.append('user_id', user_id);
                    form_data.append('reason', reason);


                    $.ajax({
                        type: "post",
                        processData: false,
                        contentType: false,
                        cache: false,
                        data: form_data,
                        url: '/approve-procurement-record',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data) {
                            if (data.status) {
                                alert(data.message);
                                location.replace('/approve-procurement');
                            }
                        },
                        error: function(data) {
                            $('body').html(data.responseText);
                        }
                    });
                }
            });
        });


        $(document).ready(function() {
            $('#reject_btn').click(function() {

                var reason = $('#reason').val();
                var user_role = $('#user_role').val();
                var user_id = $('#user_id').val();

                if (reason == "") {
                    alert("Reason for rejecting procurement plan is a must to be provided");
                    return;
                } else {

                    $('#reject_btn').html('Rejecting...');
                    $('#reject_btn').attr('disabled', true);


                    var form_data = new FormData();

                    form_data.append('user_role', user_role);
                    form_data.append('user_id', user_id);
                    form_data.append('reason', reason);

                    $.ajax({
                        type: "post",
                        processData: false,
                        contentType: false,
                        cache: false,
                        data: form_data,
                        url: '/reject-procurement-record',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data) {
                            if (data.status) {
                                alert(data.message);
                                location.replace('/approve-procurement');
                            }
                        },
                        error: function(data) {
                            $('body').html(data.responseText);
                        }
                    });
                }

            });
        });


        $(document).ready(function() {

            var user_id = $('#user_id').val();
            var user_role = $('#user_role').val();

            var form_data = new FormData();

            form_data.append('user_role', user_role);
            form_data.append('user_id', user_id);

            $.ajax({
                type: "post",
                processData: false,
                contentType: false,
                cache: false,
                data: form_data,
                url: '/hide',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    if (data.status) {
                        if (data.status_approval == "Approved" || data.status_approval == 'Rejected') {
                            $('#action_section').hide();
                            $('#reason_section').hide();
                        }
                    }
                },
                error: function(data) {
                    $('body').html(data.responseText);
                }
            });
        });



        $(document).ready(function() {

            var user_id = $('#user_id').val();
            var user_role = $('#user_role').val();

            var form_data = new FormData();

            form_data.append('user_role', user_role);
            form_data.append('user_id', user_id);

            $.ajax({
                type: "post",
                processData: false,
                contentType: false,
                cache: false,
                data: form_data,
                url: '/search-status',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    if (data.status) {

                        if (data.approval_status != 'Approved') {
                            $('#procurement_approval_innner').hide();
                            $('#approve_procurement_page').hide();
                        }
                    }
                },
                error: function(data) {
                    $('body').html(data.responseText);
                }
            });
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
