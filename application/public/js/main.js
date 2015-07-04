/***************************************

Archivo para realizar las llamadas ajax,
para mejorar la legibilidad dividimos el
archivo en secciones, respetarlas por 
favor.

@autor: pelupotter

***************************************/


// Url raiz para las llamadas AJAX
var ajaxURL = "ajax";


/**************************************/
/*          Categorias                */
/**************************************/

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
			renderCatTable(data);
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

function renderCatTable(data){

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


/**************************************/
/*          Administrador             */
/**************************************/

function updateAdminById(id, nombre, nick, apellido, password, email){	

	bootbox.confirm("<b>Estas seguro que quiere editar sus datos?</b>", function(result) {
		if(result){
			console.log('updateAdminById: ' + id);
			$.ajax({
				type: 'POST',		
				url: ajaxURL + '/' + 'editAdmin',
				data: {id:id, nombre:nombre, nick:nick, apellido:apellido, pass:password, 
						email:email},
				success: function(data){
					console.log("updateAdminById - Admin");
					console.log(data);
					/*loadAdminForm(data);
					enableEditAdmin();*/
				}				
			});
		}
	});	

}

function loadAdminForm(data){

	$('#nombre').val(data['nombre']);
	$('#apellido').val(data['apellido']);
	$('#email').val(data['email']);
	$('#nick').val(data['nick']);

}

$('#submitAdmin').click(function(){

	var id = $('#id').val();
	var nombre = $('#nombre').val();
	var apellido = $('#apellido').val();
	var nick = $('#nick').val();
	var password = "pelu";
	var email = $('#email').val();

	updateAdminById(id, nombre, nick, apellido, password, email);

});
