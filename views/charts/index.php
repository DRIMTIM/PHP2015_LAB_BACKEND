
<script src="<?php echo __ROOT_JS . 'chart-data.js'?>"></script>
<script>
	
	pieData = <?php echo $dataPieChart; ?>; 
	
</script>

<div class="col-md-6">
	<div class="panel panel-info">
		<div class="panel-heading dark-overlay"><span class="glyphicon glyphicon-stats"></span>
											Ofertas mas vendidas!</div>
		<div class="panel-body">
			<div class="canvas-wrapper">
				<canvas class="chart" id="pie-chart" ></canvas>
			</div>
		</div>
	</div>
</div>
<div class="col-md-6">
	<div class="panel panel-info">
		<div class="panel-heading dark-overlay"><span class="glyphicon glyphicon-stats">
										Categorias mas vendidas!</div>
		<div class="panel-body">
			<div class="canvas-wrapper">
				<canvas class="chart" id="doughnut-chart" ></canvas>
			</div>
		</div>
	</div>
</div>
<div class="col-lg-12">
	<div class="panel panel-info">
		<div class="panel-heading dark-overlay"><span class="glyphicon glyphicon-stats">
											Bar Chart</div>
		<div class="panel-body">
			<div class="canvas-wrapper">
				<canvas class="main-chart" id="bar-chart" height="200" width="600"></canvas>
			</div>
		</div>
	</div>
</div>
