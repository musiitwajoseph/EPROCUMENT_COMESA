<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Financial Detials</title>

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

				@include('includes.main-menu')

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
						<li class="active"><a href="#tab1" data-toggle="tab">Financial Details </a></li>
					</ul>
					
					@foreach ($Accessed_user as $item)
					<input type="hidden" name="user_id" id="user_id" value={{$item->id}}>
					<div class="tab-pane" id="tab2">
					@endforeach			

                    <h2 class="heading padMarg" style="font-weight: bold">Financial Information</h2>          
                    
						
					@foreach ($Accessed_user as $item)
                    <div class="formSep form-group">
                        <div class="col-md-3">
                            <label for="" class="boldTitle padMarg">Account name :</label>
                            <input type="text" name="Account_name" id="Account_name" value={{$item->Account_Name}} class="input-sm form-control" required>
                        </div>
						@endforeach


                              @foreach ($Accessed_user as $item)
                                <div class="col-md-3">
                                    <label for="" class="boldTitle padMarg">Bank Account number :</label>
                                    <input type="text" name="Bank_Account" id="Bank_Account" value="{{$item->Bank_Account}}" class="input-sm form-control" required>
                                </div>
								@endforeach


								@foreach ($Accessed_user as $item)
                                <div class="col-md-3">
                                    <label for="" class="boldTitle padMarg">Bank name :</label>
                                    <input type="text" name="Bank_name" id="Bank_name" value="{{$item->Bank_name}}" class="input-sm form-control" required>
                                </div>
								@endforeach



								@foreach ($Accessed_user as $item)
                                <div class="col-md-3">
                                    <label for="" class="boldTitle padMarg">Bank Branch :</label>
                                    <input type="text" name="Bank_Branch" id="Bank_Branch" value="{{$item->Bank_Branch}}" class="input-sm form-control" required>
                                </div>
								@endforeach


                              <div class="RowCollection">
								@foreach ($Accessed_user as $item)
                                <div class="col-md-3">
                                    <label for="" class="boldTitle padMarg" class="padMarg">Branch code :</label>
                                    <input type="text" name="Branch_code" id="Branch_code" value={{$item->Branch_code}} class="input-sm form-control" required>
                                </div>
								@endforeach
    
								@foreach ($Accessed_user as $item)
                                <div class="col-md-3">
                                    <label for="" class="boldTitle padMarg" class="padMarg">Account currency :</label>
                                    <input type="text" name="Account_currency" id="Account_currency" value={{$item->Account_currency}} class="input-sm form-control" required>
                                </div>
                                @endforeach
    
								@foreach ($Accessed_user as $item)
                                <div class="col-md-3 padMarg">
                                    <label for="" class="boldTitle " >Company financial contact person </label>
                                    <input type="text" name="company_financial_contact" value={{$item->company_financial_contact}} id="company_financial_contact" class="input-sm form-control" required>
                                </div>
								@endforeach

								@foreach ($Accessed_user as $item)
                                <div class="col-md-3">
                                    <label for="" class="boldTitle padMarg" class="padMarg">Contact person email :</label>
                                    <input type="eamail" name="contact_person_email" value={{$item->contact_person_email}} id="contact_person_email" class="input-sm form-control" required>
                                </div>
								@endforeach

                            </div>

                            <div class="RowCollection">
								@foreach ($Accessed_user as $item)
                                <div class="col-md-4 mt-3 pt-4 padMarg">
                                    <label for="" class="boldTitle">Contact person phone number : </label>
                                    <div class="col-md-2 mt-0 pt-0 mr-0 pr-0" style="padding:0; margin:0;">
                                        <input type="text" name="code3" id="code4" class="input-sm form-control" value="+256">
                                    </div>
                                    <div class="col-md-10" style="padding:0; margin:0;">
                                        <input type="text" name="contact_person_phone_number" value={{$item->contact_person_phone_number}} id="contact_person_phone_number" class="input-sm form-control">
                                    </div>
                                </div>	
								@endforeach		
                                
                            </div>
                        </div>
                    </div>
					</div>
				</div>
				<div class="col-md-6 mt-3 pt-4 padMarg">
										
					<button type="button" id="update_financial_information" class="btn btn-primary">
					 Update Financial Details <i class="glyphicon glyphicon-chevron-right"></i>
				 </button>

				</div> 
			</div>
			
		</div>
		
    </div>
</div>
</div>
</div>
</div>

<script src="/assets/js/jquery.min.js"></script>

<script type="text/javascript">


			$(document).ready(function(){
					$('#update_financial_information').click(function(){

						$('#update_financial_information').attr('disabled','false');
						$('#update_financial_information').html('Updating...');

						var user_id = $('#user_id').val();
						var Account_name = $('#Account_name').val();
						var Bank_name = $('#Bank_name').val();
						var Bank_Account = $('#Bank_Account').val();
						var Bank_Branch = $('#Bank_Branch').val();
						var Branch_code = $('#Branch_code').val();
						var Account_currency = $('#Account_currency').val();
						var company_financial_contact = $('#company_financial_contact').val();
						var contact_person_email = $('#contact_person_email').val();
						var contact_person_phone_number = $('#contact_person_phone_number').val();
				
							   if(Account_name == ""){
									alert("Account Name Field is required");
								window.location.href = "/edit-financial-details/"+user_id;
								}

								else if(Bank_name == ""){
									alert("Bank Name Field is required");
								window.location.href = "/edit-financial-details/"+user_id;
								}

								else if(Bank_Account == ""){
									alert("Bank Account Field is required");
								window.location.href = "/edit-financial-details/"+user_id;
								}

								else if(Bank_Branch == ""){
									alert("Bank Branch Field is required");
								window.location.href = "/edit-financial-details/"+user_id;
								}
								else if(Branch_code == ""){
									alert("Branch Code Field is required");
								window.location.href = "/edit-financial-details/"+user_id;
								}
								else if(Account_currency == ""){
									alert("Account Currency Field is required");
								window.location.href = "/edit-financial-details/"+user_id;
								}
								else if(company_financial_contact == ""){
									alert("Company Financial Contact Field is required");
								window.location.href = "/edit-financial-details/"+user_id;
								}
								else if(contact_person_email == ""){
									alert("Contact person Email Field is required");
								window.location.href = "/edit-financial-details/"+user_id;
								}
								else if(contact_person_phone_number == ""){
									alert("contact person phone number Field is required");
								window.location.href = "/edit-financial-details/"+user_id;
								}

						var form_data = new FormData();

						form_data.append('user_id', user_id);
						form_data.append('Account_name', Account_name);
						form_data.append('Bank_name', Bank_name);
						form_data.append('Bank_Account', Bank_Account);
						form_data.append('Bank_Branch', Bank_Branch);
						form_data.append('Branch_code', Branch_code);
						form_data.append('Account_currency', Account_currency);
						form_data.append('company_financial_contact', company_financial_contact);
						form_data.append('contact_person_email', contact_person_email);
						form_data.append('contact_person_phone_number', contact_person_phone_number);
						

						$.ajax({
							type: "post",
							processData: false,
							contentType: false,
							cache: false,
							data		: form_data,								
							headers		:{	'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},

							url			:'/update-financial-supplier-data',
							success		:function(data){

								if(data.status){	
									alert(data.message);
									location.replace('/UpdatedFinancialBusiness/'+data.user_id)
								}else{										
									$('#firstForm').show();
									$('#otpForm').hide();
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
