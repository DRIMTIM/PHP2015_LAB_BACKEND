/***************************************

Archivo para realizar validaciones y 
funciones que generer algun efecto
visual o de algun otro tipo en la 
aplicacion cliente.

@autor: pelupotter

***************************************/

/**************************************/
/*          Categorias                */
/**************************************/

// Limpiar formulario de Categorias
$('#resetCat').click(function(){
	resetCatForm();
	$('#submitCat').removeAttr('disabled');		
	$('#editCat').attr('disabled', 'disabled');
	return false;
});

function resetCatForm(){
	$('#nombre').val('');
	$('#desc').val('');
	$('#idCat').hide('slow');
}

// Validar Formulario de Categorias
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

// Editar o Guardar
function enableCatEdit(){
	if($('#editCat').prop('disabled')){

		$('#editCat').removeAttr('disabled');		
		$('#submitCat').attr('disabled', 'disabled');

	}
}

function enableCatSave(){
	if($('#submitCat').prop('disabled')){

		$('#submitCat').removeAttr('disabled');		
		$('#editCat').attr('disabled', 'disabled');

	}
}


/**************************************/
/*          Administrador             */
/**************************************/

// Limpiar Formulario de Admin
function enableEditAdmin(){
	if($('#nombre').prop('readonly')){

		$('#nombre').removeAttr('readonly');
		$('#apellido').removeAttr('readonly');
		$('#email').removeAttr('readonly');
		$('#nick').removeAttr('readonly');
		$('#password').removeAttr('readonly');
		$('#confirmPass').removeAttr('readonly');
		$('#submitAdmin').removeAttr('disabled');

	}else{

		$('#nombre').prop('readonly', 'readonly');
		$('#apellido').prop('readonly', 'readonly');
		$('#email').prop('readonly', 'readonly');
		$('#nick').prop('readonly', 'readonly');
		$('#password').prop('readonly', 'readonly');
		$('#confirmPass').prop('readonly', 'readonly');
		$('#submitAdmin').prop('disabled', 'disabled');

	}
}

$('#checkAdminEdit').click(function(){
	enableEditAdmin();
});

