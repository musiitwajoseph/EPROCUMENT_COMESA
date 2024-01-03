<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Review Requidtion</title>

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


                @if (Session::get('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                    </div>
                @endif
                <h3 class="heading" style="color: blue">All Assigned Requistions : </h3>
                <form action="{{ route('add-user-role') }}" method="POST" id="approve_procurement_page">

                    @csrf
                    <div class="formSep">

                        <div class="row">


                            <div class="col-sm-3 col-md-3">
                                <br>
                            </div>

                            <div class="row">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">

                                        <div class="col-sm-12 col-md-12">

                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Status</th>
                                                        <th style="width: 50%">Process and Review requistion</th>
                                                    </tr>
                                                </thead>
                                                <tbody>


                                                    @foreach ($records as $key => $value)
                                                        <tr>
                                                            <td>{{$key+1}}</td>
                                                            <td>{{$value->status}}</td>
                                                            <td> <a href="{{'load-specific-assigned-requsition/'.$value->add_requistion_item_id}}" class="btn btn-primary">Proceed</a></td>
                                                        </tr>
                                                    </td>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>

                                        <input type="hidden" id="user_role"
                                            value="{{ $LoggedUserAdmin['user_role'] }}">
                                        <input type="hidden" id="user_id" value="{{ $LoggedUserAdmin['id'] }}">

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
    <script src="/assets/js/cust.js"></script>

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


        // $(document).ready(function() {
        //     $('#approve_requistion').click(function() {
        //         $('#approve_requistion').html('Approving...');
        //             $('#approve_requistion').attr('disabled', true);

        //         var approve_hidden_id = $('#approve_hidden_id').val();


        //         alert(approve_hidden_id);


        //         var form_data = new FormData();

        //         form_data.append('approve_hidden_id', approve_hidden_id);

        //         $.ajax({
        //             type: "post",
        //             processData: false,
        //             contentType: false,
        //             cache: false,
        //             data: form_data,
        //             // url: '/approve-procurement-record',
        //             headers: {
        //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //             },
        //             success: function(data) {
        //                 if (data.status) {
        //                     alert(data.message);
        //                     // location.replace('/approve-procurement');
        //                 }
        //             },
        //             error: function(data) {
        //                 $('body').html(data.responseText);
        //             }
        //         });
        //     });
        // });


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
