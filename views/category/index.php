<!-- Formulario de Categorias -->
<div class="col-md-5">
	<div class="panel panel-default">
		<div class="panel-heading"><span class="glyphicon glyphicon-floppy-saved"></span>
									<b>Editar Categorias</b></div>
		<div class="panel-body">
			<form class="form-horizontal" action="<?php echo __ROOT . "/category/altaCategoria"?>" 
																			method="POST">
				<fieldset>

					<!-- id - readonly -->
					<div id="idCat" class="form-group" hidden='hidden'>
						<label class="col-md-3 control-label" for="nombre">ID:</label>
						<div class="col-md-3">
							<input id="id" name="id" type="text" readonly="readonly" 
							value="<?php echo $categoria["id"];?>" class="form-control">
						</div>
					</div>

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
					
					<!-- Form actions -->
					<div class="panel-footer divider">
						<div class="btn-group pull-right">
							<button id="submitCat" type="submit" class="btn btn-primary btn-md">Guardar</button>
							<button id="editCat" type="button" class="btn btn-primary btn-md" 
							disabled="disabled">Editar</button>
							<button id="resetCat" type="button" 
							class="btn btn-primary btn-md">Cancelar</button>
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
								<a style="cursor: pointer" onclick="findCategoryById
												(<?php echo $categoria["id"];?>)">
									<span class="glyphicon glyphicon-edit"></span>
								</a>
							</td>
							<td><?php echo $categoria["nombre"];?></td>
							<td><?php echo $categoria["descripcion"];?></td>
							<td>
								<a style="cursor: pointer" onclick="deleteCategoryById
												(<?php echo $categoria["id"];?>)">
									<span class="glyphicon glyphicon-trash"></span> 
								</a>
							</td>
							</tr>
							<?php
						}
					}else{ ?>

						<h3>No hay Categorias de Ofertas cargadas en el sistema</h3>

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