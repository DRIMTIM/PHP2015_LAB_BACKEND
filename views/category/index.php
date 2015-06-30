<!-- Formulario de Categorias -->
<div class="col-md-6">
	<div class="panel panel-default">
		<div class="panel-heading"><span class="glyphicon glyphicon-floppy-saved"></span>
									<b>Editar Categorias</b></div>
		<div class="panel-body">
			<form class="form-horizontal" action="" method="post">
				<fieldsetn>
					<!-- Nombre -->
					<div class="form-group">
						<label class="col-md-3 control-label" for="name">Nombre:</label>
						<div class="col-md-9">
							<input id="name" name="name" type="text" placeholder="..." 
							class="form-control">
						</div>
					</div>

					<!-- Descripcion -->
					<div class="form-group">
						<label class="col-md-3 control-label" for="message">Descricpion:</label>
						<div class="col-md-9">
							<textarea class="form-control" id="desc" name="desc" 
							placeholder="..." rows="5"></textarea>
						</div>
					</div>

					<!-- Form actions -->
					<div class="form-group">
						<div class="col-md-12 widget-right">
							<button type="submit" class="btn btn-default btn-md pull-right">Guardar</button>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
</div>

<!-- Tabla de Categorias -->
<div class="col-md-6">
	<div class="panel panel-default">
		<div class="panel-heading"><span class="glyphicon glyphicon-th-list"></span>
									<b>Lista de Categorias</b></div>
		<div class="panel-body">
			<table data-toggle="table" id="table-style" data-row-style="rowStyle">
				<thead>
					<tr>
						<th data-align="right" ><b>ID</b></th>
						<th><b>Nombre</b></th>
						<th><b>Descripcion</b></th>
					</tr>
				</thead>

				<tbody>

					<?php 
					if(!empty($categorias)){	
						foreach ($categorias as $categoria){ 
							?>
							<tr>
								<td><?php echo $categoria["id"];?></td>
								<td><?php echo $categoria["nombre"];?></td>
								<td><?php echo $categoria["descripcion"];?></td>
							</tr>
							<?php
						}
					}else{ ?>

						<tr><td><h3>No hay Categorias de Ofertas cargadas en el sistema</h3></td></tr>

					<?php
				}?>

			</tbody>

		</table>
		<script>

			function rowStyle(row, index) {
				var classes = ['active', 'success', 'info', 'warning', 'danger'];

				if (index % 2 === 0) {
					return {
						classes: classes[2]
					};
				}
				return {};
			}
		</script>
	</div>
</div>
</div>
</div><!--/.row--> 