<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Gebo Admin v3.1</title>

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
        <![endif]-->    </head>
    <body class="full_width">
        <div class="style_switcher">
			<div class="sepH_c">
				<p>Colors:</p>
				<div class="clearfix">
					<a href="/assets/javascript:void(0)" class="style_item jQclr blue_theme style_active" title="blue">blue</a>
					<a href="/assets/javascript:void(0)" class="style_item jQclr dark_theme" title="dark">dark</a>
					<a href="/assets/javascript:void(0)" class="style_item jQclr green_theme" title="green">green</a>
					<a href="/assets/javascript:void(0)" class="style_item jQclr brown_theme" title="brown">brown</a>
					<a href="/assets/javascript:void(0)" class="style_item jQclr eastern_blue_theme" title="eastern_blue">eastern blue</a>
					<a href="/assets/javascript:void(0)" class="style_item jQclr tamarillo_theme" title="tamarillo">tamarillo</a>
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
				<a href="/assets/#" id="showCss" class="btn btn-primary btn-sm">Show CSS</a>
				<a href="/assets/#" id="resetDefault" class="btn btn-default btn-sm">Reset</a>
			</div>
			<div class="hide">
				<ul id="ssw_styles">
					<li class="small ssw_mbColor sepH_a" style="display:none">body {<span class="ssw_mColor sepH_a" style="display:none"> color: #<span></span>;</span> <span class="ssw_bColor" style="display:none">background-color: #<span></span> </span>}</li>
					<li class="small ssw_lColor sepH_a" style="display:none">a { color: #<span></span> }</li>
				</ul>
			</div>
		</div>		<div id="maincontainer" class="clearfix">

            <header>

				@include('includes.main-menu');

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
											<td><a href="/assets/javascript:void(0)">Lorem ipsum dolor sit amet</a></td>
											<td>23/05/2015</td>
											<td>25KB</td>
										</tr>
										<tr>
											<td>Erin Church</td>
											<td><a href="/assets/javascript:void(0)">Lorem ipsum dolor sit amet</a></td>
											<td>24/05/2015</td>
											<td>15KB</td>
										</tr>
										<tr>
											<td>Koby Auld</td>
											<td><a href="/assets/javascript:void(0)">Lorem ipsum dolor sit amet</a></td>
											<td>25/05/2015</td>
											<td>28KB</td>
										</tr>
										<tr>
											<td>Anthony Pound</td>
											<td><a href="/assets/javascript:void(0)">Lorem ipsum dolor sit amet</a></td>
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
											<td><a href="/assets/javascript:void(0)">Admin should not break if URL…</a></td>
											<td>23/05/2015</td>
											<td><span class="label label-danger">High</span></td>
											<td>Open</td>
										</tr>
										<tr>
											<td>P-18</td>
											<td><a href="/assets/javascript:void(0)">Displaying submenus in custom…</a></td>
											<td>22/05/2015</td>
											<td><span class="label label-warning">Medium</span></td>
											<td>Reopen</td>
										</tr>
										<tr>
											<td>P-25</td>
											<td><a href="/assets/javascript:void(0)">Featured image on post types…</a></td>
											<td>22/05/2015</td>
											<td><span class="label label-success">Low</span></td>
											<td>Updated</td>
										</tr>
										<tr>
											<td>P-10</td>
											<td><a href="/assets/javascript:void(0)">Multiple feed fixes and…</a></td>
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
<div id="jCrumbs" class="breadCrumb module">
    <ul>
        <li>
            <a href="/assets/#"><i class="glyphicon glyphicon-home"></i></a>
        </li>
        <li>
            <a href="/assets/#">Sports & Toys</a>
        </li>
        <li>
            <a href="/assets/#">Toys & Hobbies</a>
        </li>
        <li>
            <a href="/assets/#">Learning & Educational</a>
        </li>
        <li>
            <a href="/assets/#">Astronomy & Telescopes</a>
        </li>
        <li>
            Telescope 3735SX 
        </li>
    </ul>
</div>	<div class="row">
		<div class="col-sm-12 tac">
			<ul class="ov_boxes">
				<li>
					<div class="p_bar_up p_canvas"><span>2,4,9,7,12,8,16</span></div>
					<div class="ov_text">
						<strong>$3 458,00</strong>
						Weekly Sale

						@foreach ($countrylist as $item)
							{{$item->name}}
						@endforeach
					</div>
				</li>
				<li>
					<div class="p_bar_down p_canvas"><span>20,15,18,14,10,13,9,7</span></div>
					<div class="ov_text">
						<strong>$43 567,43</strong>
						Monthly Sale
					</div>
				</li>
				<li>
					<div class="p_line_up p_canvas"><span>3,5,9,7,12,8,16</span></div>
					<div class="ov_text">
						<strong>2304</strong>
						Unique visitors (last 24h)
					</div>
				</li>
				<li>
					<div class="p_line_down p_canvas"><span>20,16,14,18,15,14,14,13,12,10,10,8</span></div>
					<div class="ov_text">
						<strong>30240</strong>
						Unique visitors (last week)
					</div>
				</li>
			</ul>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12">
			<ul class="dshb_icoNav clearfix">
				<li><a href="/assets/javascript:void(0)" style="background-image: url(/assets/img/gCons/multi-agents.png)"><span class="label label-info">+10</span> Users</a></li>
				<li><a href="/assets/javascript:void(0)" style="background-image: url(/assets/img/gCons/world.png)">Map</a></li>
				<li><a href="/assets/javascript:void(0)" style="background-image: url(/assets/img/gCons/configuration.png)">Settings</a></li>
				<li><a href="/assets/javascript:void(0)" style="background-image: url(/assets/img/gCons/lab.png)">Lab</a>
				</li><li><a href="/assets/javascript:void(0)" style="background-image: url(/assets/img/gCons/van.png)"><span class="label label-success">$2851</span> Delivery</a></li>
				<li><a href="/assets/javascript:void(0)" style="background-image: url(/assets/img/gCons/pie-chart.png)">Charts</a></li>
				<li><a href="/assets/javascript:void(0)" style="background-image: url(/assets/img/gCons/edit.png)">Add New Article</a></li>
				<li><a href="/assets/javascript:void(0)" style="background-image: url(/assets/img/gCons/add-item.png)"> Add New Page</a></li>
				<li><a href="/assets/javascript:void(0)" style="background-image: url(/assets/img/gCons/chat-.png)"><span class="label label-danger">26</span> Comments</a></li>
			</ul>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-5">
				<h3 class="heading">Visitors by Country <small>last week</small></h3>
			<div id="fl_2" style="height:200px;width:80%;margin:50px auto 0"></div>
		</div>
		<div class="col-sm-7">
				<div class="heading clearfix">
					<h3 class="pull-left">Another Chart</h3>
					<span class="pull-right label label-info bs_ttip" data-placement="left" data-container="body" title="Here is a sample info tooltip">Info</span>
				</div>
			<div id="fl_1" style="height:270px;width:100%;margin:15px auto 0"></div>
		</div>
	</div>

    <div class="row">
        <div class="col-sm-6 col-lg-6">
			<div class="heading clearfix">
				<h3 class="pull-left">Latest Orders</h3>
				<span class="pull-right label label-danger">5 Orders</span>
			</div>
			<table class="table table-striped table-bordered mediaTable">
				<thead>
					<tr>
						<th class="optional">id</th>
						<th class="essential persist">Customer</th>
						<th class="optional">Status</th>
						<th class="optional">Date Added</th>
						<th class="essential">Total</th>
						<th class="essential">Action</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>134</td>
						<td>Summer Throssell</td>
						<td>Pending</td>
						<td>24/04/2015</td>
						<td>$120.23</td>
						<td>
							<a href="/assets/#" title="Edit"><i class="splashy-document_letter_edit"></i></a>
							<a href="/assets/#" title="Accept"><i class="splashy-document_letter_okay"></i></a>
							<a href="/assets/#" title="Remove"><i class="splashy-document_letter_remove"></i></a>
						</td>
					</tr>
					<tr>
						<td>133</td>
						<td>Declan Pamphlett</td>
						<td>Pending</td>
						<td>23/04/2015</td>
						<td>$320.00</td>
						<td>
							<a href="/assets/#" title="Edit"><i class="splashy-document_letter_edit"></i></a>
							<a href="/assets/#" title="Accept"><i class="splashy-document_letter_okay"></i></a>
							<a href="/assets/#" title="Remove"><i class="splashy-document_letter_remove"></i></a>
						</td>
					</tr>
					<tr>
						<td>132</td>
						<td>Erin Church</td>
						<td>Pending</td>
						<td>23/04/2015</td>
						<td>$44.00</td>
						<td>
							<a href="/assets/#" title="Edit"><i class="splashy-document_letter_edit"></i></a>
							<a href="/assets/#" title="Accept"><i class="splashy-document_letter_okay"></i></a>
							<a href="/assets/#" title="Remove"><i class="splashy-document_letter_remove"></i></a>
						</td>
					</tr>
					<tr>
						<td>131</td>
						<td>Koby Auld</td>
						<td>Pending</td>
						<td>22/04/2015</td>
						<td>$180.20</td>
						<td>
							<a href="/assets/#" title="Edit"><i class="splashy-document_letter_edit"></i></a>
							<a href="/assets/#" title="Accept"><i class="splashy-document_letter_okay"></i></a>
							<a href="/assets/#" title="Remove"><i class="splashy-document_letter_remove"></i></a>
						</td>
					</tr>
					<tr>
						<td>130</td>
						<td>Anthony Pound</td>
						<td>Pending</td>
						<td>20/04/2015</td>
						<td>$610.42</td>
						<td>
							<a href="/assets/#" title="Edit"><i class="splashy-document_letter_edit"></i></a>
							<a href="/assets/#" title="Accept"><i class="splashy-document_letter_okay"></i></a>
							<a href="/assets/#" title="Remove"><i class="splashy-document_letter_remove"></i></a>
						</td>
					</tr>
				</tbody>
			</table>
        </div>
        <div class="col-sm-6 col-lg-6">
			<div class="heading clearfix">
				<h3 class="pull-left">Latest Images <small>(gallery grid)</small></h3>
				<span class="pull-right label label-success">12</span>
			</div>
			<div id="small_grid" class="wmk_grid">
				<ul>
										<li class="thumbnail">
						<a href="/assets/gallery/Image04.jpg" title="Image_4 Lorem ipsum dolor sit amet...">
							<img src="/assets/gallery/Image04_tn.jpg" alt="">
						</a>
						<p>
							<span>300KB<br>21/05/2015</span>
						</p>
					</li>
										<li class="thumbnail">
						<a href="/assets/gallery/Image05.jpg" title="Image_5 Lorem ipsum dolor sit amet...">
							<img src="/assets/gallery/Image05_tn.jpg" alt="">
						</a>
						<p>
							<span>200KB<br>10/05/2015</span>
						</p>
					</li>
										<li class="thumbnail">
						<a href="/assets/gallery/Image06.jpg" title="Image_6 Lorem ipsum dolor sit amet...">
							<img src="/assets/gallery/Image06_tn.jpg" alt="">
						</a>
						<p>
							<span>174KB<br>14/06/2015</span>
						</p>
					</li>
										<li class="thumbnail">
						<a href="/assets/gallery/Image07.jpg" title="Image_7 Lorem ipsum dolor sit amet...">
							<img src="/assets/gallery/Image07_tn.jpg" alt="">
						</a>
						<p>
							<span>289KB<br>27/05/2015</span>
						</p>
					</li>
										<li class="thumbnail">
						<a href="/assets/gallery/Image08.jpg" title="Image_8 Lorem ipsum dolor sit amet...">
							<img src="/assets/gallery/Image08_tn.jpg" alt="">
						</a>
						<p>
							<span>265KB<br>18/06/2015</span>
						</p>
					</li>
										<li class="thumbnail">
						<a href="/assets/gallery/Image09.jpg" title="Image_9 Lorem ipsum dolor sit amet...">
							<img src="/assets/gallery/Image09_tn.jpg" alt="">
						</a>
						<p>
							<span>230KB<br>12/05/2015</span>
						</p>
					</li>
										<li class="thumbnail">
						<a href="/assets/gallery/Image10.jpg" title="Image_10 Lorem ipsum dolor sit amet...">
							<img src="/assets/gallery/Image10_tn.jpg" alt="">
						</a>
						<p>
							<span>347KB<br>26/05/2015</span>
						</p>
					</li>
										<li class="thumbnail">
						<a href="/assets/gallery/Image11.jpg" title="Image_11 Lorem ipsum dolor sit amet...">
							<img src="/assets/gallery/Image11_tn.jpg" alt="">
						</a>
						<p>
							<span>309KB<br>28/05/2015</span>
						</p>
					</li>
										<li class="thumbnail">
						<a href="/assets/gallery/Image12.jpg" title="Image_12 Lorem ipsum dolor sit amet...">
							<img src="/assets/gallery/Image12_tn.jpg" alt="">
						</a>
						<p>
							<span>186KB<br>25/06/2015</span>
						</p>
					</li>
										<li class="thumbnail">
						<a href="/assets/gallery/Image13.jpg" title="Image_13 Lorem ipsum dolor sit amet...">
							<img src="/assets/gallery/Image13_tn.jpg" alt="">
						</a>
						<p>
							<span>317KB<br>15/06/2015</span>
						</p>
					</li>
										<li class="thumbnail">
						<a href="/assets/gallery/Image14.jpg" title="Image_14 Lorem ipsum dolor sit amet...">
							<img src="/assets/gallery/Image14_tn.jpg" alt="">
						</a>
						<p>
							<span>217KB<br>15/05/2015</span>
						</p>
					</li>
										<li class="thumbnail">
						<a href="/assets/gallery/Image15.jpg" title="Image_15 Lorem ipsum dolor sit amet...">
							<img src="/assets/gallery/Image15_tn.jpg" alt="">
						</a>
						<p>
							<span>222KB<br>20/05/2015</span>
						</p>
					</li>
									</ul>
			</div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-8 col-lg-8">
			<h3 class="heading">Calendar</h3>
			<div id="calendar"></div>
        </div>
        <div class="col-sm-4 col-lg-4" id="user-list">
			<h3 class="heading">Users <small>last 24 hours</small></h3>
			<div class="row">
				<div class="col-lg-12">
					<div class="input-group input-group-sm sepH_b">
						<span class="input-group-addon">
							<i class="glyphicon glyphicon-user"></i>
						</span>
						<input class="user-list-search search form-control input-sm" placeholder="Search user" type="text">
					</div>
					<ul class="nav nav-pills line_sep">
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="/assets/#">Sort by <b class="caret"></b></a>
							<ul class="dropdown-menu sort-by">
								<li><a href="/assets/javascript:void(0)" class="sort" data-sort="sl_name">by name</a></li>
								<li><a href="/assets/javascript:void(0)" class="sort" data-sort="sl_status">by status</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="/assets/#">Show <b class="caret"></b></a>
							<ul class="dropdown-menu filter">
								<li class="active"><a href="/assets/javascript:void(0)" id="filter-none">All</a></li>
								<li><a href="/assets/javascript:void(0)" id="filter-online">Online</a></li>
								<li><a href="/assets/javascript:void(0)" id="filter-offline">Offline</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
			<ul class="list user_list">

                <li>
					<span class="label label-success pull-right sl_status">online</span>
					<a href="/assets/#" class="sl_name">John Doe</a><br>
					<small class="s_color sl_email">johnd@example1.com</small>
				</li>
				<li>
					<span class="label label-success pull-right sl_status">online</span>
					<a href="/assets/#" class="sl_name">Kate Miller</a><br>
					<small class="s_color sl_email">kmiller@example1.com</small>
				</li>
				<li>
					<span class="label label-danger pull-right sl_status">offline</span>
					<a href="/assets/#" class="sl_name">James Vandenberg</a><br>
					<small class="s_color sl_email">jamesv@example2.com</small>
				</li>
				<li>
					<span class="label label-danger pull-right sl_status">offline</span>
					<a href="/assets/#" class="sl_name">Donna Doerr</a><br>
					<small class="s_color sl_email">donnad@example3.com</small>
				</li>
				<li>
					<span class="label label-danger pull-right sl_status">offline</span>
					<a href="/assets/#" class="sl_name">Perry Weitzel</a><br>
					<small class="s_color sl_email">perryw@example2.com</small>
				</li>
				<li>
					<span class="label label-success pull-right sl_status">online</span>
					<a href="/assets/#" class="sl_name">Charles Bledsoe</a><br>
					<small class="s_color sl_email">charlesb@example3.com</small>
				</li>
				<li>
					<span class="label label-danger pull-right sl_status">offline</span>
					<a href="/assets/#" class="sl_name">Wendy Proto</a><br>
					<small class="s_color sl_email">wnedyp@example1.com</small>
				</li>
				<li>
					<span class="label label-success pull-right sl_status">online</span>
					<a href="/assets/#" class="sl_name">Nancy Ibrahim</a><br>
					<small class="s_color sl_email">nancyi@example2.com</small>
				</li>
				<li>
					<span class="label label-danger pull-right sl_status">offline</span>
					<a href="/assets/#" class="sl_name">Eric Cantrell</a><br>
					<small class="s_color sl_email">ericc@example4.com</small>
				</li>
				<li>
					<span class="label label-success pull-right sl_status">online</span>
					<a href="/assets/#" class="sl_name">Andre Hill</a><br>
					<small class="s_color sl_email">andreh@example2.com</small>
				</li>
				<li>
					<span class="label label-success pull-right sl_status">online</span>
					<a href="/assets/#" class="sl_name">Laura Taggart</a><br>
					<small class="s_color sl_email">laurat@example3.com</small>
				</li>
				<li>
					<span class="label label-danger pull-right sl_status">offline</span>
					<a href="/assets/#" class="sl_name">Doug Singer</a><br>
					<small class="s_color sl_email">dougs@example2.com</small>
				</li>
				<li>
					<span class="label label-success pull-right sl_status">online</span>
					<a href="/assets/#" class="sl_name">Douglas Arnott</a><br>
					<small class="s_color sl_email">douglasa@example1.com</small>
				</li>
				<li>
					<span class="label label-danger pull-right sl_status">offline</span>
					<a href="/assets/#" class="sl_name">Lauren Henley</a><br>
					<small class="s_color sl_email">laurenh@example3.com</small>
				</li>
				<li>
					<span class="label label-danger pull-right sl_status">offline</span>
					<a href="/assets/#" class="sl_name">William Jardine</a><br>
					<small class="s_color sl_email">williamj@example4.com</small>
				</li>
				<li>
					<span class="label label-success pull-right sl_status">online</span>
					<a href="/assets/#" class="sl_name">Yves Ouellet</a><br>
					<small class="s_color sl_email">yveso@example2.com</small>
				</li>
			</ul>
			<ul class="pagination paging bottomPaging"></ul>
        </div>
    </div>                </div>
            </div>

        </div>

    <a href="/assets/javascript:void(0)" class="sidebar_switch on_switch bs_ttip" data-placement="auto right" data-viewport="body" title="Hide Sidebar">Sidebar switch</a>
   
    @include('includes.side-bar')

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
