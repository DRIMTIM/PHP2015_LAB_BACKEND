/***************************************

Archivo para realizar validaciones y 
funciones que generer algun efecto
visual o de algun otro tipo en la 
aplicacion cliente.

@autor: pelupotter

***************************************/

// Limpiar formulario de Categorias
$('#resetCat').click(function(){
	resetCatForm();
	$('#submitCat').removeAttr('disabled');		
	$('#editCat').attr('disabled', 'disabled');
	return false;
});

function resetCatForm(){
	$('#nombre').val('');
	$('#desc').val(null);
	$('#idCat').hide('slow');
}

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