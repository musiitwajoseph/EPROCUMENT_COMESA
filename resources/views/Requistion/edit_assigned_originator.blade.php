<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>COMESA PROCUREMENT DASHBOARD </title>

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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">

    <!-- favicon -->
    <link rel="shortcut icon" href="/assets/favicon.ico" />

    <meta name="csrf-token" content="{{ csrf_token() }}" </head>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


<body class="full_width">


    <header>

        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="brand pull-left" href="{{ route('admin-dashboard') }}">COMESA ::
                        EPROCUREMENT</a>

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

            @include('sweetalert::alert')


            <div class="row">
                <div class="col-sm-12">
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <h3 class="heading">Assign requistioner : </h3>
                        <div class="row">
                            <div class="col-sm-12 col-md-12">

                                @if(Session::get('success'))
                                    <div class="alert alert-success">
                                        {{ Session::get('success') }}
                                    </div>
                                @endif


                                @if(Session::get('fail'))
                                    <div class="alert alert-danger">
                                        {{ Session::get('fail') }}
                                    </div>
                                @endif

                                @include('includes.user_info')

                                <form action="{{ route('store-edit-assigned-originator') }}" method="POST"

                                    class="stepy-wizzard form-horizontal" enctype="multipart/form-data">

                                    @csrf

                                    <input type="hidden" name="user_email" id="user_email"
                                        value="{{ $LoggedUserAdmin['email'] }}">
                                    <legend class="hide">Lorem ipsum dolor…</legend>
                                    <div class="formSep form-group">

                                        @include('sweetalert::alert')

                                        <div class="col-md-3">
                                            <label>Name: </label>

                                            @foreach($assigned_originator as $item)
                                            <input type="text" class="input-sm form-control" name="requistioner_name" value="{{$item->orignator_name}}" id="">
                                            
                                            <input type="hidden" name="hidden_id" value="{{$item->id}}">
                                            @endforeach
                                      
                                        </div>
                                                                             
                                        <div class="col-md-4">
                                            <label>Procurement division/Unit:</label>
                                            <select class="input-sm form-control">
                                                <option value="">--- Select Procurement Division ---</option>

                                                @foreach($distinctValues as $data)
                                                    @foreach($info as $item)

                                                        @if($data == $item->md_id)
                                                            <option name="procurement_division"
                                                                value="{{ $item->md_id}}"> {{ $item->md_name }}
                                                            </option>
                                                        @endif

                                                    @endforeach
                                                @endforeach
                                                
                                            </select>
                                        </div>


                                        <div class="col-md-2">
                                            <br> <br>
                                        </div>
                                    </div>

                                    <!-- <button id="edit_unit" class="btn btn-primary">Edit</button> -->

                                    <button type="submit"> Edit</button>
                            </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    </div>
    </div>

    </div>

    <a href="/assets/javascript:void(0)" class="sidebar_switch on_switch bs_ttip" data-placement="auto right"
        data-viewport="body" title="Hide Sidebar">Sidebar switch</a>

    @include('includes.side-bar')

    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/cust.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            app_approvals();
        });


        $(document).ready(function () {

            $('#edit_unit').click(function () {

                var hidden_id = $('#hidden_id').val();
                var requistioner_name = $('#requistioner_name').val();
                var procurement_division = $('#procurement_division').val();

                alert(hidden_id);


                var form_data = new FormData();

                $('#edit_unit').html('editing...');
                $('#edit_unit').attr('disabled', true);


                form_data.append('requistioner_name', requistioner_name);
                form_data.append('procurement_division', procurement_division);

                $.ajax({
                    type: "post",
                    processData: false,
                    contentType: false,
                    cache: false,
                    data: form_data,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },

                    url: '/assign-procurement-division',
                    success: function (data) {
                        if (data.status) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: 'Procurement Division has been assigned to Originator',
                            });
                            location.replace('/Assign-requistion-role');
                        }
                    },
                    error: function (data) {
                        $('body').html(data.responseText);
                    }
                });

            });
        });

    </script>



    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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


    <!-- calendar -->
    <script src="/assets/lib/fullcalendar/fullcalendar.min.js"></script>
    <!-- sortable/filterable list -->
    <script src="/assets/lib/list_js/list.min.js"></script>
    <script src="/assets/lib/list_js/plugins/paging/list.paging.min.js"></script>
    <!-- dashboard functions -->
    <script src="/assets/js/pages/gebo_dashboard.js"></script>



</body>

</html>
