<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Alta oferta</title>
</head>
<body>
	<form role="form" action="<?php echo __ROOT . "/offer/crearOferta"?>" method="post">
		<div class="panel panel-default col-md-9 col-md-offset-1">
  		  	<div class="panel-heading">
    			<h2 class="panel-title">Alta de Oferta</h2>
  			</div>
			<div class="panel-body">
				<div clas="row">
					<div class="col-md-4 col-md-offset-1">
						<div class="form-group">
							<label for="titulo-oferta">Título:</label>
							<input type="text" name="tituloOferta" class="form-control" id="titulo-oferta" required="required">
						</div>
						<div class="form-group">
						<label for="imagen-oferta">Imagen:</label>
							<input type="text" class="form-control" id="imagen-oferta" >
						</div>
						<div class="form-group">
							<label for="descripcion-oferta">Descripción:</label>
							<textarea class="form-control" name="descripcion" id="descripcion-oferta" required="required" rows="5"></textarea>
						</div>
						<div class="form-group">
							<label for="descripcion-corta-oferta">Descripción corta:</label>
							<textarea class="form-control" name="descripcionCorta" id="descripcion-corta-oferta" rows="2"></textarea>
						</div>
					</div>
					<div class="col-md-3 col-md-offset-1">
						<div class="form-group">
							<label for="precio-oferta">Precio:</label>
							<input type="number" name="precio" class="form-control" id="precio-oferta" min="0.1" step="any" required="required">
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
							<input type="text" name="fechaDesde" class="form-control" id="fecha-desde">
							<label for="fecha-hasta">Hasta:</label>
							<input type="text" name="fechaHasta" class="form-control" id="fecha-hasta">
						</div>				
					</div>
				</div>
			</div>
			<button type="submit" class="btn btn-default" style="width: 100%;">Crear Oferta</button>
		</div>
	</form>
</body>

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

</html>