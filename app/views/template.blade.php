<!DOCTYPE html>
<html lang="pt-br">
	<head>
		
		<meta charset="utf-8">
		<title>@yield('title')</title>
		<meta name="description" content="">
		<meta name="author" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="{{url('favicon.ico')}}">
		

		<link href="{{url('css/style.less')}}" rel="stylesheet/less" type="text/css">
		<link href='http://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="{{url('plugins/datatables/css/dataTables.bootstrap.min.css')}}">
		<link href="{{url('css/alertas.css')}}" rel="stylesheet">

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<!--<script src="http://code.jquery.com/jquery.js"></script>-->
		<script src="{{url('plugins/jquery/jquery.min.js')}}"></script>
		<script src="{{url('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="{{url('plugins/bootstrap/bootstrap.min.js')}}"></script>
		<script src="{{url('plugins/justified-gallery/jquery.justifiedGallery.min.js')}}"></script>
		<!-- All functions for this theme + document.ready processing -->
		<script src="{{url('plugins/bootstrapvalidator/bootstrapValidator.min.js')}}" type="text/javascript" charset="utf-8"></script>
		<script src="{{url('plugins/datatables/js/jquery.dataTables.js')}}"></script>
		<script src="{{url('plugins/datatables/js/dataTables.bootstrap.min.js')}}"></script>
		<script src="{{url('js/utilidade.js')}}" type="text/javascript" charset="utf-8"></script>
		<script src="{{url('js/alertas.js')}}" type="text/javascript" charset="utf-8"></script>
		<script src="{{url('js/devoops.js')}}"></script>
		<script src="{{url('js/less.min.js')}}"></script>

		<script>
		    $(document).ready(function(){

		    	
		    	if(localStorage.getItem("baseUrl") !== null)
		    	{
		    		localStorage.setItem("baseUrl",document.URL.split("public/")[0]+"public/");
		    	}

			  $(document).tooltip({selector:'*[data-toggle="tooltip"]',delay:{'show':1000}});
			});
		</script> 
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
				<script src="http://getbootstrap.com/docs-assets/js/html5shiv.js"></script>
				<script src="http://getbootstrap.com/docs-assets/js/respond.min.js"></script>
		<![endif]-->
		<style type="text/css" media="screen">
	      .loadajax
	     {
	      top:0;
	      left: 0;
	      width: 100%;
	      height: 100%;
	      position: fixed;
	      z-index: 10000000;
	      background-color: rgba(255,255,255,0.6767);
	      display: none;
	     }
	     .loadajax img
	     {
	        margin: 23% auto;
	        
	     }
	     .loadajax h2
	     {
	      position: absolute;
	       top:0;
	       left: 0;
	       margin: 27% 45%;
	        
	     }
    </style>
	</head>
<body>
<div id="translate" 
t="{{trans(Config::get('app.locale').'.all')}}"
tipview = "{{trans(Config::get('app.locale').'.tooltip_view')}}" 
tipedit = "{{trans(Config::get('app.locale').'.tooltip_edit')}}" 
tipdel = "{{trans(Config::get('app.locale').'.tooltip_del')}}"
sZeroRecords="{{trans(Config::get('app.locale').'.sZeroRecords')}}"
sInfo="{{trans(Config::get('app.locale').'.sInfo')}}" 
sInfoEmpty = "{{trans(Config::get('app.locale').'.sInfoEmpty')}}"
sInfoFiltered = "{{trans(Config::get('app.locale').'.sInfoFiltered')}}" 
sProcessing = "{{trans(Config::get('app.locale').'.sProcessing')}}"
emptyFields = "{{trans(Config::get('app.locale').'.empty_fields')}}"
delMessage="{{trans(Config::get('app.locale').'.confirm_delete')}}"	
sucessMessage="{{trans(Config::get('app.locale').'.msg_sucess')}}"
warningMessage="{{trans(Config::get('app.locale').'.msg_error')}}"
errorMessage="{{trans(Config::get('app.locale').'.msg_warning')}}"
/>
<!-- <div class="loadajax" id="ajaxLoading">
  <img src="{{url('img/devoops_getdata.gif')}}" class="devoops-getdata" alt="Aguarde..."/>
  <h2>{{trans('geral.aguarde')}}</h2>
</div> -->
<!--Start Header-->
<header class="navbar">
	<div class="container-fluid expanded-panel">
		<div class="row">
			<div id="logo" class="col-xs-12 col-sm-2">
				<a href="index.html">{{Config::get('app.systemName')}}</a>
			</div>
			<div id="top-panel" class="col-xs-12 col-sm-10">
				<div class="row">
					<div class="col-xs-8 col-sm-4">
						<div id="search">
							<input type="text" placeholder="search"/>
							<i class="fa fa-search"></i>
						</div>
					</div>
					<div class="col-xs-4 col-sm-8 top-panel-right">
						<a href="#" class="about">about</a>
						
						<ul class="nav navbar-nav pull-right panel-menu">
							<li class="hidden-xs">
								<a href="index.html" class="modal-link">
									<i class="fa fa-bell"></i>
									<span class="badge">7</span>
								</a>
							</li>
							<li class="hidden-xs">
								<a href="ajax/calendar.html">
									<i class="fa fa-calendar"></i>
									<span class="badge">7</span>
								</a>
							</li>
							<li class="hidden-xs">
								<a href="ajax/page_messages.html">
									<i class="fa fa-envelope"></i>
									<span class="badge">7</span>
								</a>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle account" data-toggle="dropdown">
									<div class="avatar">
										<img src="{{((Session::get('foto_url') == null) ? url('img/avatar.jpg'):Session::get('foto_url'))}}" class="img-rounded" alt="avatar" />
									</div>
									<i class="fa fa-angle-down pull-right"></i>
									<div class="user-mini pull-right">
										<span class="welcome">Welcome,</span>
										<span>{{Session::get('nome_user')}}</span>
									</div>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="#">
											<i class="fa fa-user"></i>
											<span>Profile</span>
										</a>
									</li>
									<li>
										<a href="ajax/page_messages.html">
											<i class="fa fa-envelope"></i>
											<span>Messages</span>
										</a>
									</li>
									<li>
										<a href="ajax/gallery_simple.html">
											<i class="fa fa-picture-o"></i>
											<span>Albums</span>
										</a>
									</li>
									<li>
										<a href="ajax/calendar.html">
											<i class="fa fa-tasks"></i>
											<span>Tasks</span>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="fa fa-cog"></i>
											<span>Settings</span>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="fa fa-power-off"></i>
											<span>Logout</span>
										</a>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
<!--End Header-->
<!--Start Container-->
<div id="main" class="container-fluid">
	<div class="row">
		<div id="sidebar-left" class="col-xs-2 col-sm-2">
			<ul class="nav main-menu">
				<li>
					<a href="ajax/dashboard.html">
						<i class="fa fa-dashboard"></i>
						<span class="hidden-xs">Dashboard</span>
					</a>
				</li>
				<li>
					<a href="{{url('panel-control/paciente')}}">
						<i class="fa fa-users"></i>
						<span class="hidden-xs">Paciente</span>
					</a>
				</li>
				@if(Session::get("nivel") != 1)
					<li class="dropdown">
						<a href="#" class="dropdown-toggle">
							<i class="fa fa-bar-chart-o"></i>
							<span class="hidden-xs">Charts</span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="ajax/charts_xcharts.html">xCharts</a></li>
							<li><a href="ajax/charts_flot.html">Flot Charts</a></li>
							<li><a href="ajax/charts_google.html">Google Charts</a></li>
							<li><a href="ajax/charts_morris.html">Morris Charts</a></li>
							<li><a href="ajax/charts_amcharts.html">AmCharts</a></li>
							<li><a href="ajax/charts_chartist.html">Chartist</a></li>
							<li><a href="ajax/charts_coindesk.html">CoinDesk realtime</a></li>
						</ul>
					</li>
				@endif
				<li class="dropdown">
					<a href="#" class="dropdown-toggle">
						<i class="fa fa-table"></i>
						 <span class="hidden-xs">Tables</span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="ajax/tables_simple.html">Simple Tables</a></li>
						<li><a href="ajax/tables_datatables.html">Data Tables</a></li>
						<li><a href="ajax/tables_beauty.html">Beauty Tables</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle">
						<i class="fa fa-pencil-square-o"></i>
						 <span class="hidden-xs">Forms</span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="ajax/forms_elements.html">Elements</a></li>
						<li><a href="{{url('panel-control/layout')}}" class="{{((Session::get('flag') == 1) ? 'active':'')}}">Layout<i class="fa fa-angle-right pull-right"></i></a></li>
						<li><a href="ajax/forms_file_uploader.html">File Uploader</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle">
						<i class="fa fa-desktop"></i>
						 <span class="hidden-xs">UI Elements</span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="ajax/ui_grid.html">Grid</a></li>
						<li><a href="ajax/ui_buttons.html">Buttons</a></li>
						<li><a href="ajax/ui_progressbars.html">Progress Bars</a></li>
						<li><a href="ajax/ui_jquery-ui.html">Jquery UI</a></li>
						<li><a href="ajax/ui_icons.html">Icons</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle">
						<i class="fa fa-list"></i>
						 <span class="hidden-xs">Pages</span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="ajax/page_login.html">Login</a></li>
						<li><a href="ajax/page_register.html">Register</a></li>
						<li><a id="locked-screen" class="submenu" href="ajax/page_locked.html">Locked Screen</a></li>
						<li><a href="ajax/page_contacts.html">Contacts</a></li>
						<li><a href="ajax/page_feed.html">Feed</a></li>
						<li><a class="ajax-link add-full" href="ajax/page_messages.html">Messages</a></li>
						<li><a href="ajax/page_pricing.html">Pricing</a></li>
						<li><a href="ajax/page_product.html">Product</a></li>
						<li><a href="ajax/page_invoice.html">Invoice</a></li>
						<li><a href="ajax/page_search.html">Search Results</a></li>
						<li><a href="ajax/page_404.html">Error 404</a></li>
						<li><a href="ajax/page_500.html">Error 500</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle">
						<i class="fa fa-map-marker"></i>
						<span class="hidden-xs">Maps</span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="ajax/maps.html">OpenStreetMap</a></li>
						<li><a href="ajax/map_fullscreen.html">Fullscreen map</a></li>
						<li><a href="ajax/map_leaflet.html">Leaflet</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle">
						<i class="fa fa-picture-o"></i>
						 <span class="hidden-xs">Gallery</span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="ajax/gallery_simple.html">Simple Gallery</a></li>
						<li><a href="ajax/gallery_flickr.html">Flickr Gallery</a></li>
					</ul>
				</li>
				<li>
					 <a href="ajax/typography.html">
						 <i class="fa fa-font"></i>
						 <span class="hidden-xs">Typography</span>
					</a>
				</li>
				 <li>
					<a href="ajax/calendar.html">
						 <i class="fa fa-calendar"></i>
						 <span class="hidden-xs">Calendar</span>
					</a>
				 </li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle">
						<i class="fa fa-picture-o"></i>
						 <span class="hidden-xs">Multilevel menu</span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="#">First level menu</a></li>
						<li><a href="#">First level menu</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle">
								<i class="fa fa-plus-square"></i>
								<span class="hidden-xs">Second level menu group</span>
							</a>
							<ul class="dropdown-menu">
								<li><a href="#">Second level menu</a></li>
								<li><a href="#">Second level menu</a></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle">
										<i class="fa fa-plus-square"></i>
										<span class="hidden-xs">Three level menu group</span>
									</a>
									<ul class="dropdown-menu">
										<li><a href="#">Three level menu</a></li>
										<li><a href="#">Three level menu</a></li>
										<li class="dropdown">
											<a href="#" class="dropdown-toggle">
												<i class="fa fa-plus-square"></i>
												<span class="hidden-xs">Four level menu group</span>
											</a>
											<ul class="dropdown-menu">
												<li><a href="#">Four level menu</a></li>
												<li><a href="#">Four level menu</a></li>
												<li class="dropdown">
													<a href="#" class="dropdown-toggle">
														<i class="fa fa-plus-square"></i>
														<span class="hidden-xs">Five level menu group</span>
													</a>
													<ul class="dropdown-menu">
														<li><a href="#">Five level menu</a></li>
														<li><a href="#">Five level menu</a></li>
														<li class="dropdown">
															<a href="#" class="dropdown-toggle">
																<i class="fa fa-plus-square"></i>
																<span class="hidden-xs">Six level menu group</span>
															</a>
															<ul class="dropdown-menu">
																<li><a href="#">Six level menu</a></li>
																<li><a href="#">Six level menu</a></li>
															</ul>
														</li>
													</ul>
												</li>
											</ul>
										</li>
										<li><a href="#">Three level menu</a></li>
									</ul>
								</li>
							</ul>
						</li>
					</ul>
				</li>
			</ul>
		</div>
		<!--Start Content-->
		<div id="content" class="col-xs-12 col-sm-10">
			<div id="about">
				<div class="about-inner">
					<h4 class="page-header">Open-source admin theme for you</h4>
					<p>DevOOPS team</p>
					<p>Homepage - <a href="http://devoops.me" target="_blank">http://devoops.me</a></p>
					<p>Email - <a href="mailto:devoopsme@gmail.com">devoopsme@gmail.com</a></p>
					<p>Twitter - <a href="http://twitter.com/devoopsme" target="_blank">http://twitter.com/devoopsme</a></p>
					<p>Donate - BTC 123Ci1ZFK5V7gyLsyVU36yPNWSB5TDqKn3</p>
				</div>
			</div>
				<!-- ALERTA DE MENSAGEM -->
			    <!-- Alert favor seguir esse padrao e importar a folha de estilo -->
			    <!-- 
			      * Abaixo esta a caixa de alert que tras as mensagens de validação tanto
			      * do jquery quanto do php por tras do servidor, se a variavel $msg existir
			        * então a mensagem e passada ao atributo message pelo qual via jquery
			      * eu remonto dentro do paragrafo                                    -->
			    @if(Session::has('msg'))
			        <div class="panel-alert" id="msg" message="{{Session::get('msg')}}"></div>
			    @else
			    <div class="panel-alert" id="msg"></div>
			    @endif
			    <div id="ajax-content">
			      @yield('content')
			    </div>
		</div>
		<!--End Content-->
	</div>
</div>
<!--End Container-->

<!-- <script src="js/main.js"></script> -->
</body>
</html>
