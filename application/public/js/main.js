/***************************************

Archivo para realizar las llamadas ajax,
para mejorar la legibilidad dividimos el
archivo en secciones, respetarlas por 
favor.

@autor: pelupotter

***************************************/


// Url raiz para las llamadas AJAX
var ajaxURL = "ajax";

// Buscar Categoria por id
function findCategoryById(id) {
	console.log('findCategoryById: ' + id);
	$.ajax({
		type: 'GET',		
		url: ajaxURL + '/' + 'getCategoria',
		data: 'idCat=' + id,
		dataType: 'json',
		success: function(data){
			console.log(data);
			console.log('findCategoryById success: ' + data['id'] + " - " + data['nombre']);
			cargarCategoria(data);
		}
	});

}

// Buscar todas las Categorias
function findAllCategories() {
	console.log('findAllCategories!');
	$.ajax({
		type: 'GET',		
		url: ajaxURL + '/' + 'getCategorias',
		dataType: 'json',
		success: function(data){
			var list = data == null ? [] : (data instanceof Array ? data : [data]);
			console.log("Lista de Categorias:" + list.length);
			console.log(list);
			renderTable(data);
		}
	});

}

// Cargamos la Categoria luego de success
function cargarCategoria(data){
	$('#nombre').val(data['nombre']);
	$('#desc').val(data['descripcion']);
	enableCatEdit();
	$('#idCat').show('slow');
	$('#id').val(data['id']);
}


function deleteCategoryById(id){	

	bootbox.confirm("<b>Estas seguro que quiere eliminar la Categoria?<b>", function(result){
		if(result){
			console.log('deleteCategoryById: ' + id);
			$.ajax({
				type: 'GET',		
				url: ajaxURL + '/' + 'borrarCategoria',
				data: 'idCat=' + id,
				success: function(data){
					findAllCategories();
				}				
			});
		}
	});	
}

function updateCategoryById(id, nom, desc){	

	bootbox.confirm("<b>Estas seguro que quiere editar la Categoria?</b>", function(result) {
		if(result){
			console.log('updateCategoryById: ' + id);
			$.ajax({
				type: 'POST',		
				url: ajaxURL + '/' + 'editarCategoria',
				data: {id:id, nombre:nom, descripcion:desc},
				success: function(data){
					findAllCategories();
					resetCatForm();
					enableCatSave();
				}				
			});
		}
	});	
}

function renderTable(data){

	var list = data == null ? [] : (data instanceof Array ? data : [data]);
	var theader = 
				"<thead>" +
					"<tr>" +
						"<th data-align='right' ></th>" +
						"<th><b>Nombre</b></th>" +
						"<th><b>Descripcion</b></th>" +
						"<th></th>" +
					"</tr>" +
				"</thead>";

	if(list != null){
		$('#table-style > tbody').html("");
		$.each(list, function(index, cat) {

			var clase = (index % 2 === 0) ? clase = 'info' : 'default';	

			$('#table-style > tbody')
				.append("<tr class='" + clase + "'>" +
							"<td>" +
								"<a href='#' onclick='findCategoryById" +
												"(" + cat['id'] + ")'>" +
									"<span class='glyphicon glyphicon-edit'></span>" +
								"</a>" +
							"</td>" +
							"<td>" + cat['nombre'] + "</td>" +
							"<td>" + cat['descripcion'] + "</td>" +
							"<td>" +
								"<a href='#' onclick='deleteCategoryById" +
												"(" + cat['id'] + ")'>" +
									"<span class='glyphicon glyphicon-trash'></span>" +
								"</a>" +
							"</td>" +
						"</tr>");
		});		

		$('#table-style').attr('data-row-style', "rowStyle");
		$('#table-style').attr('data-toggle', "table");				

	}else{


	}
}

$('#editCat').click(function(){

	var id = $('#id').val();
	var nom = $('#nombre').val();
	var desc = $('#desc').val();
	updateCategoryById(id, nom, desc);

});

$('#submitCat').click(function(){

	var id = $('#id').val();
	var nom = $('#nombre').val();
	var desc = $('#desc').val();

	if(nom == "" || nom == " " || desc == "" || desc == " "){

		bootbox.alert("<b>Hay campos vacios,por favor, revise el formulario.</b>");
		return false;
	}else{
		return true;
	}
});


