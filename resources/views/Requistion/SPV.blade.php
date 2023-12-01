<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SPV</title>

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
                        <a class="brand pull-left" href="{{ route('supplier-dashboard') }}">SUPPLIER DASHBOARD</a>

                        <ul class="nav navbar-nav user_menu pull-right">


                            <li class="divider-vertical hidden-sm hidden-xs"></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img
                                        src="img/user_avatar.png" alt=""
                                        class="user_avatar">{{ $LoggedUserAdmin['username'] }} <b
                                        class="caret"></b></a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="javascript:void();">My Profile</a></li>
                                    <li class="divider"></li>
                                    <li><a href="{{ route('supplier-logout') }}">Log Out</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

        </header>

        <div id="contentwrapper">
            <div class="main_content">
                <nav>
                    <div id="jCrumbs" class="breadCrumb module">
                        <ul>
                            <li>
                                SPV
                            </li>
                        </ul>
                    </div>
                </nav>
                
                <div class="row-fluid">
                    <div class="span6">
                        <h3 class="heading">Supplier Performance evaluation</h3>
                        <div class="tabbable">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab1" data-toggle="tab">1.VENDOR</a></li>
                                <li><a href="#tab2" data-toggle="tab">2.PERFORMANCE RATING </a></li>
                                <li><a href="#tab3" data-toggle="tab">3.MANAGER</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab1">
                                    <div class="row">
                                        <div class="col-md-9 mt-3 pt-4 padMarg">
                                            <h2 class="heading" style="font-weight: bold">1. Vendor :</h2> 
                                            </div>
                                        
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>VENDOR</th>
                                                        <th>Name(s) of firm(s)</th>
                                                    </tr>
                                                    <tr>
                                                        <th>Leader*</th>
                                                        <td><input class="form-control" type="text" name="Leader" id="Leader" placeholder="....."></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Partner 2*</th>
                                                        <td><input class="form-control" type="text" name="Partner" id="Partner" placeholder="....."></td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                </tbody>
                                            </table>

                                        <div class="col-md-9 mt-3 pt-4 padMarg">
                                        <h2 class="heading" style="font-weight: bold">2. Performance period of contract:</h2> 
                                        </div>

                                        <div class="col-md-9 mt-3 pt-4 padMarg">
                                            <div class="col-md-2 mt-0 pt-0 mr-0 pr-0" style="padding:0; margin:0;">
                                                <input type="text" name="From" value="From" id="From" class="input-sm form-control" >
                                                <input type="text" name="To" value="To" id="To" class="input-sm form-control" >
                                            </div>		

                                            <div class="col-md-10  mt-0 pt-0 ml-0 pl-0" style="padding:0; margin:0;">
                                                <input type="date" name="contact_person" id="contact_person" class="input-sm form-control"  required>
                                                <input type="date" name="contact_person" id="contact_person" class="input-sm form-control"  required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="tab2">
                                <h2 class="heading " style="font-weight: bold">1.PERFORMANCE RATING OF VENDOR :</h2> 

                                <div class="col-sm-8 col-md-8">
                                    <h3 id=""></h3> 

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Factor</th>
                                                <th >Rating</th>
                                                <th>Comments (if rating is not 3)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Achievement of contract objectives (as specified in the terms of reference)</td>
                                                <td style="width: 80px;">
                                                    <select name="achievement_of_contract" id="achievement_of_contract" class="form-control">
                                                        <option value="">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </td>
                                                <td><input class="form-control" type="text" name="" id="" placeholder="Comment if required"></td>
                                            </tr>
                                            <tr>
                                                <td>Ability to meet deadlines</td>
                                                <td style="width: 80px;">
                                                    <select name="ability_to_meet_deadlines" id="ability_to_meet_deadlines" class="form-control">
                                                        <option value="">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </td>
                                                <td><input class="form-control" type="text" name="" id="" placeholder="Comment if required"></td>
                                            </tr>
                                            <tr>
                                                <td>Quality of service</td>
                                                <td style="width: 80px;">
                                                    <select name="quality_of_service" id="quality_of_service" class="form-control">
                                                        <option value="">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </td>
                                                <td><input class="form-control" type="text" name="" id="" placeholder="Comment if required"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                
                                <div class="row sepH_c">
                                    <div class="col-sm-4 col-md-4">
                                      
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th colspan="3" style="text-align: center">Rating Scheme</th>
                                                    </tr>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>MEANING</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Excellent</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>Good</td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>Average</td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>Below average</td>
                                                    </tr>
                                                    <tr>
                                                        <td>5</td>
                                                        <td>Unsatisfactory</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                     </div>
                                </div>

                                <h2 class="heading " style="font-weight: bold">2.PERFORMANCE RATING OF KEY EXPERTS :</h2> 

                                <div class="col-sm-12 col-md-12">
                                    <h3 id=""></h3> 

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>client relations</th>
                                                <th>written communication</th>
                                                <th>verbal communication</th>
                                                <th>Drive & determination</th>
                                                <th>Job management</th>
                                                <th>personal effectiveness</th>
                                                <th>Technical completence</th>
                                                <th>overall</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input class="form-control" type="text" name="name_key_experts" id="name_key_experts" placeholder="Name"></td>
                                                
                                                <td style="width: 80px;">
                                                    <select name="client_relations" id="client_relations" class="form-control">
                                                        <option value="">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </td>
                                                <td style="width: 80px;">
                                                    <select name="written_communications" id="written_communications" class="form-control">
                                                        <option value="">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </td>

                                                <td style="width: 80px;">
                                                    <select name="verbal_communication" id="verbal_communication" class="form-control">
                                                        <option value="">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </td>

                                                <td style="width: 80px;">
                                                    <select name="drive_and_determination" id="drive_and_determination" class="form-control">
                                                        <option value="">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </td>

                                                <td style="width: 80px;">
                                                    <select name="job_management" id="job_management" class="form-control">
                                                        <option value="">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </td>

                                                <td style="width: 80px;">
                                                    <select name="personal_effectiveness" id="personal_effectiveness" class="form-control">
                                                        <option value="">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="technical_completence" id="technical_completence" class="form-control">
                                                        <option value="">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </td>

                                                <td style="width: 80px;">
                                                    <select name="overall" id="overall" class="form-control">
                                                        <option value="">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </td>


                                            </tr>
                                          
                                        </tbody>
                                    </table>
                                </div>
                                
                            
                                {{-- <div class="mt-4"> --}}
                                    <div class="col-sm-4 col-md-4">
                                    {{-- <div class="col-sm-4 col-md-4"> --}}
                                      
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th colspan="3" style="text-align: center">Rating Scheme</th>
                                                    </tr>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>MEANING</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Excellent</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>Good</td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>Average</td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>Below average</td>
                                                    </tr>
                                                    <tr>
                                                        <td>5</td>
                                                        <td>Unsatisfactory</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                     </div>
                                {{-- </div> --}}
                                
                                </div>
                                <div class="tab-pane" id="tab3">
                                    <h2 class="heading " style="font-weight: bold">1.CONTRACT MANAGER :</h2> 

                                    <div class="col-sm-8 col-md-8">
                                        <h3 id=""></h3> 
    
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <td><input class="form-control" type="text" name="contract_manager_name" id="contract_manager_name" placeholder="Enter name"></td>
                                                </tr>
                                                <tr>
                                                    <th>Signature</th>
                                                    <td><input class="form-control" type="text" name="contract_manager_signature" id="contract_manager_signature" placeholder="Enter signature"></td>
                                                </tr>
                                                <tr>
                                                    <th>Date</th>
                                                    <td><input class="form-control" type="date" name="contract_manager_date" id="contract_manager_date" placeholder="Enter Date"></td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                            </tbody>
                                        </table>

                                        <br>
                                        <div >
                                            <label for="mask_ssn" ></label>
                                            <a class="btn btn-primary" id="final_submit_btn">Submit</a>
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

    <a href="/assets/javascript:void(0)" class="sidebar_switch on_switch bs_ttip" data-placement="auto right"
        data-viewport="body" title="Hide Sidebar">Sidebar switch</a>

    @include('includes.side-bar')

    <script src="/assets/js/jquery.min.js"></script>
    <script type="text/javascript">
    
    $(document).ready(function(){

        $('#final_submit_btn').click(function(){
            $('#final_submit_btn').html('Submiting...');
				$('#final_submit_btn').attr('disabled', true);


                var Leader = $('#Leader').val();
                var Partner = $('#Partner').val();
                var From = $('#From').val();
                var To = $('#To').val();
                var achievement_of_contract = $('#achievement_of_contract').val();
                var ability_to_meet_deadlines = $('#ability_to_meet_deadlines').val();
                var quality_of_service = $('#quality_of_service').val();
                var name_key_experts = $('#name_key_experts').val();
                var client_relations = $('#client_relations').val();
                var written_communications = $('#written_communications').val();
                var verbal_communication = $('#verbal_communication').val();
                var drive_and_determination = $('#drive_and_determination').val();
                var job_management = $('#job_management').val();
                var personal_effectiveness = $('#personal_effectiveness').val();
                var technical_completence = $('#technical_completence').val();
                var overall = $('#overall').val();
                var contract_manager_name = $('#contract_manager_name').val();
                var contract_manager_signature = $('#contract_manager_signature').val();
                var contract_manager_date = $('#contract_manager_date').val();

							
				var form_data = new FormData();

				form_data.append('Leader', Leader);
				form_data.append('Partner', Partner);
				form_data.append('From', From);
				form_data.append('To', To);
				form_data.append('achievement_of_contract', achievement_of_contract);
				form_data.append('ability_to_meet_deadlines', ability_to_meet_deadlines);
				form_data.append('quality_of_service', quality_of_service);
				form_data.append('name_key_experts', name_key_experts);
				form_data.append('client_relations', client_relations);
				form_data.append('written_communications', written_communications);
				form_data.append('verbal_communication', verbal_communication);
				form_data.append('drive_and_determination', drive_and_determination);
				form_data.append('job_management', job_management);
				form_data.append('personal_effectiveness', personal_effectiveness);
                form_data.append('technical_completence', technical_completence);
				form_data.append('overall', overall);
				form_data.append('contract_manager_name', contract_manager_name);
				form_data.append('contract_manager_signature', contract_manager_signature);
                form_data.append('contract_manager_date', contract_manager_date);


                         $.ajax({
								type: "post",
								processData: false,
								contentType: false,
								cache: false,
								data		: form_data,								
								headers		:{	'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},

								url			:'/SPV-save',
								success		:function(data){
									if(data.status){
										alert(data.message);
                                        location.replace('/SPV');
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



    <script src="/assets/js/jquery.min.js"></script>
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
