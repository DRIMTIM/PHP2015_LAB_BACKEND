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
						<label class="col-md-3 control-label" for="nombre">Nombre:</label>
						<div class="col-md-9">
							<input id="nombre" name="nombre" type="text" placeholder="..." 
							value="<?php echo $categoria["nombre"];?>" class="form-control">
						</div>
					</div>

					<!-- Descripcion -->
					<div class="form-group">
						<label class="col-md-3 control-label" for="descripcion">Descricpion:</label>
						<div class="col-md-9">
							<textarea class="form-control" id="desc" name="descripcion" 
							placeholder="..." rows="5"><?php echo $categoria["descripcion"];?></textarea>
						</div>
					</div>
					
					<!-- Editar o Guardar -->
					<div class="checkbox">
						<label class="col-md-3 control-label">
						<input id="checkEdit" type="checkbox"><b>Editar / Guardar</b></label>
					</div>
					<!-- Form actions -->
					<div class="btn-group pull-right">
						<button id="submitCat" type="submit" class="btn btn-primary btn-md">Guardar</button>
						<button id="editCat" type="button" class="btn btn-primary btn-md" 
						disabled="disabled">Editar</button>
						<button id="resetCat" type="button" 
						class="btn btn-primary btn-md">Cancelar</button>
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
								<a class="cat" 
									href="<?php echo __ROOT . "/category/getCategoria?idCat="
									. $categoria["id"]; ?>" >
									<span class="glyphicon glyphicon-edit"></span>
								</a>
							</td>
							<td><?php echo $categoria["nombre"];?></td>
							<td><?php echo $categoria["descripcion"];?></td>
							<td>
								<a name="<?php echo "del" . $categoria["id"];?>" class="btn" 
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