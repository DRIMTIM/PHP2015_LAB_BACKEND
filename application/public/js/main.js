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

// Cargamos la Categoria luedo de success
function cargarCategoria(data){
	$('#nombre').val(data['nombre']);
	$('#desc').html(data['descripcion']);
	enableCatEdit();
	$('#idCat').show();
	$('#id').val(data['id']);
}


function deleteCategoryById(id){	

	bootbox.confirm("Estas seguro que quiere eliminar la Categoria?", function(result) {
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


