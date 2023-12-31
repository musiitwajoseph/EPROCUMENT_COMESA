<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Business Detials</title>

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



        <!--[if lte IE 8]>
            <link rel="stylesheet" href="/assets/css/ie.css" />
        <![endif]-->

        <!--[if lt IE 9]>
			<script src="/assets/js/ie/html5.js"></script>
			<script src="/assets/js/ie/respond.min.js"></script>
			<script src="/assets/lib/flot/excanvas.min.js"></script>
        <![endif]-->    </head>
    <body class="full_width">
        <div class="style_switcher">
			<div class="sepH_c">
				<p>Colors:</p>
				<div class="clearfix">
					<a href="javascript:void(0)" class="style_item jQclr blue_theme style_active" title="blue">blue</a>
					<a href="javascript:void(0)" class="style_item jQclr dark_theme" title="dark">dark</a>
					<a href="javascript:void(0)" class="style_item jQclr green_theme" title="green">green</a>
					<a href="javascript:void(0)" class="style_item jQclr brown_theme" title="brown">brown</a>
					<a href="javascript:void(0)" class="style_item jQclr eastern_blue_theme" title="eastern_blue">eastern blue</a>
					<a href="javascript:void(0)" class="style_item jQclr tamarillo_theme" title="tamarillo">tamarillo</a>
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
				<a href="#" id="showCss" class="btn btn-primary btn-sm">Show CSS</a>
				<a href="#" id="resetDefault" class="btn btn-default btn-sm">Reset</a>
			</div>
			<div class="hide">
				<ul id="ssw_styles">
					<li class="small ssw_mbColor sepH_a" style="display:none">body {<span class="ssw_mColor sepH_a" style="display:none"> color: #<span></span>;</span> <span class="ssw_bColor" style="display:none">background-color: #<span></span> </span>}</li>
					<li class="small ssw_lColor sepH_a" style="display:none">a { color: #<span></span> }</li>
				</ul>
			</div>
		</div>		<div id="maincontainer" class="clearfix">

            <header>

				<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
					<div class="navbar-inner">
						<div class="container-fluid">
							<a class="brand pull-left" href="{{route('supplier-registration')}}">Gebo Admin</a>
							<ul class="nav navbar-nav" id="mobile-nav">
								<li class="dropdown">
									<a data-toggle="dropdown" class="dropdown-toggle" href="#"><span class="glyphicon glyphicon-list-alt"></span> Forms <b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li><a href="form_elements.html">Form elements</a></li>
										<li><a href="form_extended.html">Extended form elements</a></li>
										<li><a href="form_validation.html">Form Validation</a></li>
									</ul>
								</li>
								<li class="dropdown">
									<a data-toggle="dropdown" class="dropdown-toggle" href="#"><span class="glyphicon glyphicon-th"></span> Components <b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li><a href="alerts_btns.html">Alerts &amp; Buttons</a></li>
										<li><a href="icons.html">Icons</a></li>
										<li><a href="notifications.html">Notifications</a></li>
										<li><a href="tables.html">Tables</a></li>
										<li><a href="tables_more.html">Tables (more examples)</a></li>
										<li><a href="tabs_accordion.html">Tabs &amp; Accordion</a></li>
										<li><a href="tooltips.html">Tooltips, Popovers</a></li>
										<li><a href="typography.html">Typography</a></li>
										<li><a href="widgets.html">Widget boxes</a></li>
										<li class="dropdown">
											<a href="#">Sub menu <b class="caret-right"></b></a>
											<ul class="dropdown-menu">
												<li><a href="#">Sub menu 1.1</a></li>
												<li><a href="#">Sub menu 1.2</a></li>
												<li><a href="#">Sub menu 1.3</a></li>
												<li>
													<a href="#">Sub menu 1.4 <b class="caret-right"></b></a>
													<ul class="dropdown-menu">
														<li><a href="#">Sub menu 1.4.1</a></li>
														<li><a href="#">Sub menu 1.4.2</a></li>
														<li><a href="#">Sub menu 1.4.3</a></li>
													</ul>
												</li>
											</ul>
										</li>
									</ul>
								</li>
								<li class="dropdown">
									<a data-toggle="dropdown" class="dropdown-toggle" href="#"><span class="glyphicon glyphicon-wrench"></span> Plugins <b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li><a href="charts.html">Charts</a></li>
										<li><a href="calendar.html">Calendar</a></li>
										<li><a href="datatable.html">Datatable</a></li>
										<li><a href="dynamic_tree.html">Dynamic tree</a></li>
										<li><a href="editable_elements.html">Editable elements</a></li>
										<li><a href="file_manager.html">File Manager</a></li>
										<li><a href="floating_header.html">Floating List Header</a></li>
										<li><a href="google_maps.html">Google Maps</a></li>
										<li><a href="gallery.html">Gallery Grid</a></li>
										<li><a href="wizard.html">Wizard</a></li>
									</ul>
								</li>
								<li class="dropdown">
									<a data-toggle="dropdown" class="dropdown-toggle" href="#"><span class="glyphicon glyphicon-file"></span> Pages <b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li><a href="blank.html"> Blank</a></li>
										<li><a href="blog_page.html"> Blog Page</a></li>
										<li><a href="chat.html"> Chat</a></li>
										<li><a href="error_404.html"> Error 404</a></li>
										<li><a href="invoice.html"> Invoice</a></li>
										<li><a href="mailbox.html">Mailbox</a></li>
										<li><a href="search_page.html">Search page</a></li>
										<li><a href="user_profile.html">User profile</a></li>
										<li><a href="user_static.html">User profile (static)</a></li>
									</ul>
								</li>
							</ul>
							<ul class="nav navbar-nav user_menu pull-right">
								<li class="hidden-phone hidden-tablet">
									<div class="nb_boxes clearfix">
										<a data-toggle="modal" data-backdrop="static" href="#myMail" data-placement="bottom" data-container="body" class="label bs_ttip" title="New messages">25 <i class="splashy-mail_light"></i></a>
										<a data-toggle="modal" data-backdrop="static" href="#myTasks" data-placement="bottom" data-container="body" class="label bs_ttip" title="New tasks">10 <i class="splashy-calendar_week"></i></a>
									</div>
								</li>
								<li class="divider-vertical hidden-sm hidden-xs"></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle nav_condensed" data-toggle="dropdown"><i class="flag-gb"></i> <b class="caret"></b></a>
									<ul class="dropdown-menu dropdown-menu-right">
										<li><a href="javascript:void(0)"><i class="flag-de"></i> Deutsch</a></li>
										<li><a href="javascript:void(0)"><i class="flag-fr"></i> Français</a></li>
										<li><a href="javascript:void(0)"><i class="flag-es"></i> Español</a></li>
										<li><a href="javascript:void(0)"><i class="flag-ru"></i> Pусский</a></li>
									</ul>
								</li>
								<li class="divider-vertical hidden-sm hidden-xs"></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="img/user_avatar.png" alt="" class="user_avatar">Johny Smith <b class="caret"></b></a>
									<ul class="dropdown-menu dropdown-menu-right">
										<li><a href="user_profile.html">My Profile</a></li>
										<li><a href="javascrip:void(0)">Another action</a></li>
										<li class="divider"></li>
										<li><a href="login.html">Log Out</a></li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</nav>

				<div class="modal fade" id="myMail">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h3 class="modal-title">New Messages</h3>
							</div>
							<div class="modal-body">
								<table class="table table-condensed table-striped" data-provides="rowlink">
									<thead>
										<tr>
											<th>Sender</th>
											<th>Subject</th>
											<th>Date</th>
											<th>Size</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Declan Pamphlett</td>
											<td><a href="javascript:void(0)">Lorem ipsum dolor sit amet</a></td>
											<td>23/05/2015</td>
											<td>25KB</td>
										</tr>
										<tr>
											<td>Erin Church</td>
											<td><a href="javascript:void(0)">Lorem ipsum dolor sit amet</a></td>
											<td>24/05/2015</td>
											<td>15KB</td>
										</tr>
										<tr>
											<td>Koby Auld</td>
											<td><a href="javascript:void(0)">Lorem ipsum dolor sit amet</a></td>
											<td>25/05/2015</td>
											<td>28KB</td>
										</tr>
										<tr>
											<td>Anthony Pound</td>
											<td><a href="javascript:void(0)">Lorem ipsum dolor sit amet</a></td>
											<td>25/05/2015</td>
											<td>33KB</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default">Go to mailbox</button>
							</div>
						</div>
					</div>
				</div>

				<div class="modal fade" id="myTasks">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h3 class="modal-title">New Tasks</h3>
							</div>
							<div class="modal-body">
								<table class="table table-condensed table-striped" data-provides="rowlink">
									<thead>
										<tr>
											<th>id</th>
											<th>Summary</th>
											<th>Updated</th>
											<th>Priority</th>
											<th>Status</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>P-23</td>
											<td><a href="javascript:void(0)">Admin should not break if URL…</a></td>
											<td>23/05/2015</td>
											<td><span class="label label-danger">High</span></td>
											<td>Open</td>
										</tr>
										<tr>
											<td>P-18</td>
											<td><a href="javascript:void(0)">Displaying submenus in custom…</a></td>
											<td>22/05/2015</td>
											<td><span class="label label-warning">Medium</span></td>
											<td>Reopen</td>
										</tr>
										<tr>
											<td>P-25</td>
											<td><a href="javascript:void(0)">Featured image on post types…</a></td>
											<td>22/05/2015</td>
											<td><span class="label label-success">Low</span></td>
											<td>Updated</td>
										</tr>
										<tr>
											<td>P-10</td>
											<td><a href="javascript:void(0)">Multiple feed fixes and…</a></td>
											<td>17/05/2015</td>
											<td><span class="label label-warning">Medium</span></td>
											<td>Open</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default">Go to task manager</button>
							</div>
						</div>
					</div>
				</div>

			</header>

            <div id="contentwrapper">
                <div class="main_content">


<div class="row">
    <div class="col-sm-12 col-md-12">
		
		<div class="row">
            <div class="col-sm-12 col-md-12">

				<div class="tabbable">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#tab1" data-toggle="tab">Business Details </a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane" id="tab6">
							<h2 class="heading padMarg" >style="font-weight: bold"4.Required Documents </h2>

						<div class="formSep form-group">
							<?php $counter = 1; ?>
							@foreach ($Documents as $document)
								<div class="col-md-6">
									<label for="" class="boldTitle padMarg" class="padMarg">{{$document->md_name}} :</label>
									<input data-name = "{{$document->md_name}}" type="file"  name="attachment<?php echo $counter; ?>" id="attachment<?php echo $counter; ?>" class="input-sm form-control " required>
								</div>
								<?php $counter++; ?>
							@endforeach

							<input type="hidden" value="<?php echo $counter-1; ?>" id="Total_Documents"/>

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
           

    <a href="javascript:void(0)" class="sidebar_switch on_switch bs_ttip" data-placement="auto right" data-viewport="body" title="Hide Sidebar">Sidebar switch</a>
    <div class="sidebar">
    
        <div class="sidebar_inner_scroll">
            <div class="sidebar_inner">
                <form action="search_page.html" class="input-group input-group-sm" method="post">
                    <input autocomplete="off" name="query" class="search_query form-control input-sm" size="16" placeholder="Search..." type="text">
                    <span class="input-group-btn"><button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button></span>
                </form>
                <div id="side_accordion" class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="#collapseOne" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                                <i class="glyphicon glyphicon-folder-close"></i> Content
                            </a>
                        </div>
                        <div class="accordion-body collapse" id="collapseOne">
                            <div class="panel-body">
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="javascript:void(0)">Articles</a></li>
                                    <li><a href="javascript:void(0)">News</a></li>
                                    <li><a href="javascript:void(0)">Newsletters</a></li>
                                    <li><a href="javascript:void(0)">Comments</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="#collapseTwo" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                                <i class="glyphicon glyphicon-th"></i> Modules
                            </a>
                        </div>
                        <div class="accordion-body collapse" id="collapseTwo">
                            <div class="panel-body">
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="javascript:void(0)">Content blocks</a></li>
                                    <li><a href="javascript:void(0)">Tags</a></li>
                                    <li><a href="javascript:void(0)">Blog</a></li>
                                    <li><a href="javascript:void(0)">FAQ</a></li>
                                    <li><a href="javascript:void(0)">Formbuilder</a></li>
                                    <li><a href="javascript:void(0)">Location</a></li>
                                    <li><a href="javascript:void(0)">Profiles</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="#collapseThree" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                                <i class="glyphicon glyphicon-user"></i> Account manager
                            </a>
                        </div>
                        <div class="accordion-body collapse" id="collapseThree">
                            <div class="panel-body">
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="javascript:void(0)">Members</a></li>
                                    <li><a href="javascript:void(0)">Members groups</a></li>
                                    <li><a href="javascript:void(0)">Users</a></li>
                                    <li><a href="javascript:void(0)">Users groups</a></li>
                                </ul>

                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="#collapseFour" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                                <i class="glyphicon glyphicon-cog"></i> Configuration
                            </a>
                        </div>
                        <div class="accordion-body collapse in" id="collapseFour">
                            <div class="panel-body">
                                <ul class="nav nav-pills nav-stacked">
                                    <li class="nav-header">People</li>
                                    <li class="active"><a href="javascript:void(0)">Account Settings</a></li>
                                    <li><a href="javascript:void(0)">IP Adress Blocking</a></li>
                                    <li class="nav-header">System</li>
                                    <li><a href="javascript:void(0)">Site information</a></li>
                                    <li><a href="javascript:void(0)">Actions</a></li>
                                    <li><a href="javascript:void(0)">Cron</a></li>
                                    <li class="divider"></li>
                                    <li><a href="javascript:void(0)">Help</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="#collapseLong" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                                <i class="glyphicon glyphicon-leaf"></i> Long content (scrollbar)
                            </a>
                        </div>
                        <div class="accordion-body collapse" id="collapseLong">
                            <div class="panel-body">
                                Some text to show sidebar scroll bar<br>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus rhoncus, orci ac fermentum imperdiet, purus sapien pharetra diam, at varius nibh tellus tristique sem. Nulla congue odio ut augue volutpat congue. Nullam id nisl ut augue posuere ullamcorper vitae eget nunc. Quisque justo turpis, tristique non fermentum ac, feugiat quis lorem. Ut pellentesque, turpis quis auctor laoreet, nibh erat volutpat est, id mattis mi elit non massa. Suspendisse diam dui, fringilla id pretium non, dapibus eget enim. Duis fermentum quam a leo luctus tincidunt euismod sit amet arcu. Duis bibendum ultricies libero sed feugiat. Duis ut sapien risus. Morbi non nulla sit amet eros fringilla blandit id vel augue. Nam placerat ligula lacinia tellus molestie molestie vestibulum leo tincidunt.
                                Duis auctor varius risus vitae commodo. Fusce nec odio massa, ut dapibus justo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur dapibus, mauris sit amet feugiat tempor, nulla diam gravida magna, in facilisis sapien tellus non ligula. Mauris sapien turpis, sodales ac lacinia sit amet, porttitor in lacus. Pellentesque tincidunt malesuada magna, in egestas augue sodales vel. Praesent iaculis sapien at ante sodales facilisis.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="#collapse7" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                               <i class="glyphicon glyphicon-th"></i> Calculator
                            </a>
                        </div>
                        <div class="accordion-body collapse" id="collapse7">
                            <div class="panel-body">
                                <form name="Calc" id="calc">
                                    <div class="formSep input-group input-group-sm">
                                        <input class="form-control" name="Input" type="text"/>
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default" name="clear" value="c" onclick="Calc.Input.value = ''">
                                                <i class="glyphicon glyphicon-remove"></i>
                                            </button>
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <input class="btn form-control btn-default input-sm" name="seven" value="7" onclick="Calc.Input.value += '7'" type="button">
                                        <input class="btn form-control btn-default input-sm" name="eight" value="8" onclick="Calc.Input.value += '8'" type="button">
                                        <input class="btn form-control btn-default input-sm" name="nine" value="9" onclick="Calc.Input.value += '9'" type="button">
                                        <input class="btn form-control btn-default input-sm" name="div" value="/" onclick="Calc.Input.value += ' / '" type="button">
                                    </div>
                                    <div class="form-group">
                                        <input class="btn form-control btn-default input-sm" name="four" value="4" onclick="Calc.Input.value += '4'" type="button">
                                        <input class="btn form-control btn-default input-sm" name="five" value="5" onclick="Calc.Input.value += '5'" type="button">
                                        <input class="btn form-control btn-default input-sm" name="six" value="6" onclick="Calc.Input.value += '6'" type="button">
                                        <input class="btn form-control btn-default input-sm" name="times" value="x" onclick="Calc.Input.value += ' * '" type="button">
                                    </div>
                                    <div class="form-group">
                                        <input class="btn form-control btn-default input-sm" name="one" value="1" onclick="Calc.Input.value += '1'" type="button">
                                        <input class="btn form-control btn-default input-sm" name="two" value="2" onclick="Calc.Input.value += '2'" type="button">
                                        <input class="btn form-control btn-default input-sm" name="three" value="3" onclick="Calc.Input.value += '3'" type="button">
                                        <input class="btn form-control btn-default input-sm" name="minus" value="-" onclick="Calc.Input.value += ' - '" type="button">
                                    </div>
                                    <div class="formSep form-group">
                                        <input class="btn form-control btn-default input-sm" name="dot" value="." onclick="Calc.Input.value += '.'" type="button">
                                        <input class="btn form-control btn-default input-sm" name="zero" value="0" onclick="Calc.Input.value += '0'" type="button">
                                        <input class="btn form-control btn-default input-sm" name="DoIt" value="=" onclick="Calc.Input.value = Math.round( eval(Calc.Input.value) * 1000)/1000" type="button">
                                        <input class="btn form-control btn-default input-sm" name="plus" value="+" onclick="Calc.Input.value += ' + '" type="button">
                                    </div>
                                    Contributed by <a href="http://themeforest.net/user/maumao">maumao</a>
                                </form>
                            </div>
                         </div>
                    </div>

                </div>

                <div class="push"></div>
            </div>

            <div class="sidebar_info">
                <ul class="list-unstyled">
                    <li>
                        <span class="act act-warning">65</span>
                        <strong>New comments</strong>
                    </li>
                    <li>
                        <span class="act act-success">10</span>
                        <strong>New articles</strong>
                    </li>
                    <li>
                        <span class="act act-danger">85</span>
                        <strong>New registrations</strong>
                    </li>
                </ul>
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
