<!-- Formulario de Categorias -->
<div class="col-md-5">
	<div class="panel panel-default">
		<div class="panel-heading"><span class="glyphicon glyphicon-floppy-saved"></span>
									<b>Editar Categorias</b></div>
		<div class="panel-body">
			<form class="form-horizontal" action="<?php echo __ROOT . "/category/altaCategoria"?>" 
																			method="POST">
				<fieldset>
					<!-- Nombre -->
					<div class="form-group">
						<label class="col-md-3 control-label" for="name">Nombre:</label>
						<div class="col-md-9">
							<input id="name" name="nombre" type="text" placeholder="..." 
							class="form-control">
						</div>
					</div>

					<!-- Descripcion -->
					<div class="form-group">
						<label class="col-md-3 control-label" for="message">Descricpion:</label>
						<div class="col-md-9">
							<textarea class="form-control" id="desc" name="descripcion" 
							placeholder="..." rows="5"></textarea>
						</div>
					</div>

					<!-- Form actions -->
					<div class="form-group">
						<div class="col-md-12 widget-right">
							<button type="submit" class="btn btn-primary btn-md pull-right">Guardar</button>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
</div>

<!-- Tabla de Categorias -->
<div class="col-md-7">
	<div class="panel panel-default">
		<div class="panel-heading"><span class="glyphicon glyphicon-th-list"></span>
									<b>Lista de Categorias</b></div>
		<div class="panel-body">
			<table data-toggle="table" id="table-style" data-row-style="rowStyle">
				<thead>
					<tr>
						<th data-align="right" ></th>
						<th><b>Nombre</b></th>
						<th><b>Descripcion</b></th>
						<th></th>
					</tr>
				</thead>

				<tbody>

					<?php 
					if(!empty($categorias)){	
						foreach ($categorias as $categoria){ 
							?>
							<tr>
								<td>
							        <a class="btn" href="#" id="<?php echo $categoria["id"];?>">
							          <span class="glyphicon glyphicon-edit"></span>
							        </a>
       							</td>
								<td><?php echo $categoria["nombre"];?></td>
								<td><?php echo $categoria["descripcion"];?></td>
								<td>
									<a name="<?php echo "cat" . $categoria["id"];?>" class="btn" 
										href="<?php echo __ROOT . "/category/borrarCategoria?idCat="
															. $categoria["id"]; ?>">
          								<span class="glyphicon glyphicon-trash"></span> 
       								</a>
       							</td>
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