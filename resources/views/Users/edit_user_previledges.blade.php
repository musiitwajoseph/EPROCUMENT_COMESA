<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit User Rigths and Previledges</title>

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
    
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

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
            


                @if (Session::get('success'))
                <div class="alert alert-success">
                 {{Session::get('success')}}
                </div>
                 @endif


                <form action="{{ route('add-user-role') }}" method="POST"> 

                    @csrf
                     <div class="formSep">

                    <div class="row">

                        <input type="hidden" name="user_id" id="user_id" value="{{$LoggedUserAdmin['id']}}" >

                        <div class="col-sm-3 col-md-3">

                            <h2 style="font-weight:bold">Role name : </h2>
                            <br> 
                            <p class="mb-4" style="color: blue;">Check Privileges Per Page :</p>


                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                              
                                <div class="col-sm-8 col-md-8">
                                    <h3 id=""></h3> 

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th style="width: 5px">No</th>
                                                <th>Priveledge Name</th>
                                                <th colspan="7">Previledges</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td>A</td>
                                                <td>V</td>
                                                <td>E</td>
                                                <td>D</td>
                                                <td>P</td>
                                                <td>I</td>
                                                <td>X</td>
                                                <td> <div class="btn btn-primary" id="check_all_btn">Check All</div> </td>
                                                
                                            </tr>
                                            <tr>
                                                <td  style="width: 5px"></td>
                                                <td style="color: blue;">CHECK COLUMN</td>
                                                {{-- <td style="width: 4px;height:4px;"><div class="btn btn-sm btn-primary" id="toggleButton" id="btn_column_check">Toggle</div></td> --}}
                                                <td class="table_checkbox" style="background-color:yellow;"><input type="checkbox" id="checkbox2"></td>
                                                <td class="table_checkbox" style="background-color:yellow;"><input type="checkbox" id="checkbox2"></td>
                                                <td class="table_checkbox" style="background-color:yellow;"><input type="checkbox" id="checkbox3"></td>
                                                <td class="table_checkbox" style="background-color:yellow;"><input type="checkbox" id="checkbox4"></td>
                                                <td class="table_checkbox" style="background-color:yellow;"><input type="checkbox" id="checkbox5"></td>
                                                <td class="table_checkbox" style="background-color:yellow;"><input type="checkbox" id="checkbox6"></td>
                                                <td class="table_checkbox" style="background-color:yellow;"><input type="checkbox" id="checkbox7"></td>
                                                <td style="text-align: center;background-color:green;color:#fff;"> Line</td>
                                            </tr>
                                            <tr>
                                                <td>136</td>
                                                <td>Anthony Pound</td>
                                                <td class="table_checkbox"><input type="checkbox" id="checkbox8"  class="first" data-row="1" data-col="7"></td>
                                                <td class="table_checkbox"><input type="checkbox" id="checkbox9"  class="first" data-row="1" data-col="6"></td>
                                                <td class="table_checkbox"><input type="checkbox" id="checkbox10" class="first" data-row="1" data-col="6"></td>
                                                <td class="table_checkbox"><input type="checkbox" id="checkbox11" class="first" data-row="1" data-col="6"></td>
                                                <td class="table_checkbox"><input type="checkbox" id="checkbox12" class="first" data-row="1" data-col="6"></td>
                                                <td class="table_checkbox"><input type="checkbox" id="checkbox13" class="first" data-row="1" data-col="6"></td>
                                                <td class="table_checkbox"><input type="checkbox" id="checkbox14" class="first" data-row="1" data-col="6"></td>
                                            <td style="width: 4px;height:4px; background-color:yellow;text-align:center;"><div class="btn btn-sm btn-primary" id="check_row_btn">check</div></td>
                                            </tr>

                                            <tr>
                                                <td>136</td>
                                                <td>Anthony Pound</td>
                                                <td class="table_checkbox"><input type="checkbox" id="checkbox8"  class="secound" data-row="1" data-col="7"></td>
                                                <td class="table_checkbox"><input type="checkbox" id="checkbox9"  class="secound" data-row="1" data-col="6"></td>
                                                <td class="table_checkbox"><input type="checkbox" id="checkbox10" class="secound" data-row="1" data-col="6"></td>
                                                <td class="table_checkbox"><input type="checkbox" id="checkbox11" class="secound" data-row="1" data-col="6"></td>
                                                <td class="table_checkbox"><input type="checkbox" id="checkbox12" class="secound" data-row="1" data-col="6"></td>
                                                <td class="table_checkbox"><input type="checkbox" id="checkbox13" class="secound" data-row="1" data-col="6"></td>
                                                <td class="table_checkbox"><input type="checkbox" id="checkbox14" class="secound" data-row="1" data-col="6"></td>
                                            <td style="width: 4px;height:4px; background-color:yellow;text-align:center;"><div class="btn btn-sm btn-primary" id="check_row_btn">Toggle</div></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                           
                                
                                <div class="row sepH_c">
                                    <div class="col-sm-4 col-md-4">
                                      
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th colspan="3" style="text-align: center">KEY</th>
                                                    </tr>
                                                    <tr>
                                                        <th>SYSM</th>
                                                        <th>MEANING</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>A</td>
                                                        <td>ADD</td>
                                                    </tr>
                                                    <tr>
                                                        <td>V</td>
                                                        <td>View</td>
                                                    </tr>
                                                    <tr>
                                                        <td>E</td>
                                                        <td>Edit/Modify</td>
                                                    </tr>
                                                    <tr>
                                                        <td>D</td>
                                                        <td>Delete</td>
                                                    </tr>
                                                    <tr>
                                                        <td>P</td>
                                                        <td>Print</td>
                                                    </tr>
                                                    <tr>
                                                        <td>I</td>
                                                        <td>Import</td>
                                                    </tr>
                                                    <tr>
                                                        <td>X</td>
                                                        <td>Export</td>
                                                    </tr>
                                                    <tr>
                                                        <td>U</td>
                                                        <td>Uncheck</td>
                                                    </tr>
                                                    <tr>
                                                        <td>C</td>
                                                        <td>Check</td>
                                                    </tr>
                                                    
                                                
                                                </tbody>
                                            </table>
                                     </div>
                                </div>
                            
                          

                        <div class="clearfix"></div>
                        <br> 
                       
                        <div class="col-sm-3 col-md-3">
                           <button class="btn btn-primary" id="add_user_role" >Save</button>
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
    <script type="text/javascript">

            $(document).ready(function(){
					$('#check_all_btn').click(function(){
                        
                        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
				
                        checkboxes.forEach(function (checkbox) {
                            checkbox.checked = !checkbox.checked;
                    });
            });
         });


         $(document).ready(function(){
					$('#check_row_btn').click(function(){
                        
                        var checkboxes = document.querySelectorAll('.first');

                        checkboxes.forEach(function (checkbox) {
                            checkbox.checked = !checkbox.checked;
                        });
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