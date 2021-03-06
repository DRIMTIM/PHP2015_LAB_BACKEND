<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin - Dashboard</title>

	<link href="<?php echo __ROOT_CSS . 'bootstrap.min.css'?>" rel="stylesheet">
	<link href="<?php echo __ROOT_CSS . 'bootstrap-table.css'?>" rel="stylesheet">
	<link href="<?php echo __ROOT_CSS . 'styles.css'?>" rel="stylesheet">
	<link href="<?php echo __ROOT_CSS . 'jquery-ui.css'?>" rel="stylesheet">
	<link href="<?php echo __ROOT_CSS . 'jquery-ui-timepicker-addon.css'?>" rel="stylesheet">
	
	<script src="<?php echo __ROOT_JS . 'jquery-2.1.3.js'?>"></script>
	<script src="<?php echo __ROOT_JS . 'bootstrap-filestyle.min.js'?>"></script>
	<script src="<?php echo __ROOT_JS . 'bootstrap.min.js'?>"></script>
    <script src="<?php echo __ROOT_JS . 'bootbox.js'?>"></script>
   	<script src="<?php echo __ROOT_JS . 'jquery-ui.js'?>"></script>
	<script src="<?php echo __ROOT_JS . 'jquery-ui-timepicker-addon.js'?>"></script>
	<script src="<?php echo __ROOT_JS . 'bootstrap-table.js'?>"></script>
</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">
					<a class="navbar-brand" href="#"><span>DRIM</span>TIM</a>
				</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user">
						</span> User <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="<?php echo __ROOT . "/admin"?>">
								<span class="glyphicon glyphicon-user"></span> Cuenta</a></li>
							<li><a href="#"><span class="glyphicon glyphicon-cog"></span> Configuracion</a></li>
							<li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>
						</ul>
					</li>
				</ul>
			</div>

		</div><!-- /.container-fluid -->
	</nav>

	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li class="active"><a href="<?php echo __ROOT ?>"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
			<li><a href="<?php echo __ROOT . "/category"?>"><span class="glyphicon glyphicon-tags"></span> Categorias</a></li>
			<li><a href="<?php echo __ROOT . "/offer/alta"?>"><span class="glyphicon glyphicon-shopping-cart"></span> Ofertas</a></li>
			<!--<li><a href="tables.html"><span class="glyphicon glyphicon-list-alt"></span> Productos</a></li>-->
			<li><a href="<?php echo __ROOT . "/chart"?>"><span class="glyphicon glyphicon-stats"></span> Estadisticas</a></li>
			<li><a href="panels.html"><span class="glyphicon glyphicon-cog"></span> Configuracion	</a></li>
			<li role="presentation" class="divider"></li>
		</ul>
	</div><!--/.sidebar-->

	<!-- MAIN -->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<br/>
		</div><!--/.row-->

		<div class="row">
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<em class="glyphicon glyphicon-shopping-cart glyphicon-l"></em>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">120</div>
							<div class="text-muted">Ofertas</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-orange panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<em class="glyphicon glyphicon-comment glyphicon-l"></em>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">52</div>
							<div class="text-muted">Compras</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<em class="glyphicon glyphicon-user glyphicon-l"></em>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">24</div>
							<div class="text-muted">Usuarios</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-red panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<em class="glyphicon glyphicon-stats glyphicon-l"></em>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">25</div>
							<div class="text-muted">Categorias</div>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
		<div class="row">
			<?php $registry->router->loader(); ?>
		</div>
	</div>
</body>
<script src="<?php echo __ROOT_JS . 'chart.min.js'?>"></script>
<script src="<?php echo __ROOT_JS . 'app.js'?>"></script>
<script src="<?php echo __ROOT_JS . 'main.js'?>"></script>
</html>
