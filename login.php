<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bienvenido Admin!!</title>

	<link href="<?php echo __ROOT_CSS . 'bootstrap.min.css'?>" rel="stylesheet">
	<link href="<?php echo __ROOT_CSS . 'datepicker3.css'?>" rel="stylesheet">
	<link href="<?php echo __ROOT_CSS . 'styles.css'?>" rel="stylesheet">

	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->

</head>

<body>
	
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading"><img id="logo" src="<?php echo __ROOT_IMG . 'logotipoMin.png'?>"
														 alt="Bienvenido!!"></div>
				<div class="panel-body">
					<form role="form">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="email" type="email" 
								autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" 
								value="">
							</div>

							<div class="chkLogin">
								<a href="<?php echo __ROOT . "/home"?>" id="btnLogin" class="btn btn-primary">
								<span class="glyphicon glyphicon-user"></span> Ingresar</a>
							</div>
							
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	
	<script src="<?php echo __ROOT_JS . 'jquery-1.11.1.min.js'?>"></script>
	<script src="<?php echo __ROOT_JS . 'bootstrap.min.js'?>"></script>
	<script src="<?php echo __ROOT_JS . 'chart.min.js'?>"></script>
	<script src="<?php echo __ROOT_JS . 'chart-data.js'?>"></script>
	<script src="<?php echo __ROOT_JS . 'easypiechart.js'?>"></script>
	<script src="<?php echo __ROOT_JS . 'easypiechart-data.js'?>"></script>
	<script src="<?php echo __ROOT_JS . 'bootstrap-datepicker.js'?>"></script>
	<script>
		!function ($) {
			$(document).on("click","ul.nav li.parent > a > span.icon", function(){		  
				$(this).find('em:first').toggleClass("glyphicon-minus");	  
			}); 
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>
