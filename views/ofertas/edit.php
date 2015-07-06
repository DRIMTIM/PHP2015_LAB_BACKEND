<!-- Formulario de Ofertas -->

<div class="col-sm-offset-2 col-md-7">
	<div class="panel panel-info">
		<div class="panel-heading dark-overlay">
			<span class="glyphicon glyphicon-user"></span>
									<b>Datos de la Oferta</b>
		</div>
		<div class="panel-body">
			<form role="form" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="titulo-oferta">Título:</label>
					<input type="text" name="titulo" class="form-control" 
					id="titulo-oferta" required="required"
					value="<?php echo $oferta["titulo"];?>" class="form-control">
				</div>

				<div class="form-group">
					<label for="precio-oferta">Precio:</label>
					<input type="number" name="precio" class="form-control" 
					id="precio-oferta" min="0.1" step="any" required="required"
					value="<?php echo $oferta["precio"];?>" class="form-control">
				</div>		

				<div class="form-group">
					<label for="descripcion-oferta">Descripción:</label>
					<textarea class="form-control" name="descripcion" 
						id="descripcion-oferta" required="required" rows="5" 
						class="form-control"><?php echo $oferta["descripcion"];?> 
					</textarea>
			</div>
			<div class="form-group">
				<label for="descripcion-corta-oferta">Descripción corta:</label>
				<textarea class="form-control" name="descripcion_corta" 
					id="descripcion-corta-oferta" rows="2"><?php echo $oferta["descripcion_corta"];?>
				</textarea>
			</div>
			<div class="form-group">
				<label for="imagen-oferta">Imagen:</label>
				<input type="file" class="filestyle" name="imagen" 
				data-buttonName="btn-primary"
				data-iconName="glyphicon-inbox" data-buttonBefore="true"
				data-buttonText="Subir Imagen ..." accept=".jpg,.jpeg" >
			</div>

			<div class="form-group">
				<label for="">Moneda:</label>
				<select name="moneda" class="form-control">
					<?php
					echo'<option value="'.Moneda::DOLARES.'">'.Moneda::DOLARES.'</option>';
					echo'<option value="'.Moneda::PESOS.'">'.Moneda::PESOS.'</option>';
					?>
				</select>
			</div>
			<div class="form-group">
				<label for="categorias" >Categoria</label>
				<select id="categorias" name="id_categoria" class="form-control">
					<?php
					if(empty($categorias)) {
						echo '<option value="-1"> No hay categorias </option>';
					}
					else {
						foreach($categorias as $categoria) {
							echo'<option value="'.$categoria["id"].'">'.$categoria["nombre"].'</option>';
						}
					}
					?>
				</select>
			</div>
			<div class="form-group">
				<label for="precio-oferta">Tipo de oferta:</label>
				<select class="form-control" name="tipo" id="combo-tipo-oferta">
					<option value="normal" selected="selected">Normal</option>
					<option value="temporal">Temporal</option>
					<option value="stock">Hasta agotar Stock</option>
				</select>
			</div>
			<div class="form-group" id="container-ofertas-stock">
				<label for="precio-oferta">Cantidad de Stock:</label>
				<input type="number" id="stock" name="stock" class="form-control" min="1">
			</div>
			<div class="form-group" id="container-ofertas-temporales">
				<label for="fecha-desde">Desde:</label>
				<input type="text" name="fecha_inicio" class="form-control" id="fecha-desde">
				<label for="fecha-hasta">Hasta:</label>
				<input type="text" name="fecha_fin" class="form-control" id="fecha-hasta">
			</div>
			<div class="panel-footer divider">
				<div class="checkbox">
					<label>
						<input type="checkbox" name="activa"> Activa
					</label>
				</div>
				<button type="submit" class="btn btn-primary pull-right">
				<span class="glyphicon glyphicon-floppy-saved"></span>&nbsp; Guardar</button>
			</div>
		</form>
		</div>
	</div>
</div>

<script src="<?php echo __ROOT_JS . 'jquery-1.11.1.min.js'?>"></script>
<script src="<?php echo __ROOT_JS . 'bootstrap-filestyle.min.js'?>"></script>

<script>

	$(document).ready(function(){
		inicializarCalendars();
		cambiarForm();
		$(document).on("change", $("#combo-tipo-oferta"), cambiarForm);
	});

	function cambiarForm() {
		var selectedValue = $("#combo-tipo-oferta").val();
		switch(selectedValue) {
			case "normal":
			$("#container-ofertas-stock").hide();
			$("#container-ofertas-temporales").hide();
			break;
			case "temporal":
			$("#container-ofertas-temporales").show();
			$("#container-ofertas-stock").hide();
			break;
			case "stock":
			$("#container-ofertas-temporales").hide();
			$("#container-ofertas-stock").show();
			break;
			default:
			break;
		}
	}

	function inicializarCalendars() {
		inicializarCalendar($("#fecha-desde"));
		inicializarCalendar($("#fecha-hasta"));
	}

	function inicializarCalendar(input) {
		input.datepicker({
			changeYear: true,
			changeMonth: true,
			currentText: "Ahora",
			dateFormat: "<?php echo GlobalConstants::$jqueryDateFormat; ?>",
			autoSize: true,
			firstDay: 1,
			dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],
			dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],
			dayNamesShort: [ "Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab" ],
			monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Setiembre", "Octubre", "Noviembre", "Diciembre" ],
			monthNamesShort: [ "Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Set", "Oct", "Nov", "Dic" ]
		});
	}

</script>